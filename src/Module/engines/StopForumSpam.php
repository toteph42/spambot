<?php
declare(strict_types=1);

/*
 * 	SpamBot Bundle
 *
 *	@copyright	(c) 2013 - 2023 Florian Daeumling, Germany. All right reserved
 * 	@license 	https://github.com/toteph42/spambot/blob/master/LICENSE
 */

namespace SpamBotBundle\Module\engines;

use SpamBotBundle\Module\SpamBot;

class StopForumSpam extends SpamBot {
    /*
     * @var string
     */
    protected $Name = 'StopForumSpam';
    /*
     * @var array
     */
    protected $Fields = [ 'spambot_stopforumspam_score' => 0 ];

    /**
     * Check data
     *
     * @param type to check
     * @param IP address
     * @param mail address
     *
     * @return array (SpamBot::Status, status message)
     */
    public function check(int $typ, string $ip, string $mail): array  {

        $this->ExtInfo = '<fieldset style="padding:3px"><div style="color:blue;">'.
                         'Checking <strong>'.(SpamBot::TYP_IP === $typ ? $ip : $mail).'</strong> <br />'.
                         'Clipping level is <strong>'.$this->spambot_stopforumspam_score.'</strong><br />';

        $qry = '/api?'.(SpamBot::TYP_IP === $typ ? 'ip='.$ip : 'email='.urlencode($mail)).'&f=serial&confidence';

        if (!($fp = $this->openHTTP('www.stopforumspam.com', $qry))) {
            $this->ExtInfo .= '</div></fieldset>';

            return [SpamBot::NOTFOUND, sprintf($GLOBALS['TL_LANG']['SpamBot']['generic']['err'], $this->Name, $this->ErrMsg)];
        }

        $rc = deserialize($this->readHTTP($fp));
        fclose($fp);

        // in data base?
        $key = SpamBot::TYP_IP === $typ ? 'ip' : 'email';

        $this->ExtInfo .= 'Status received is <strong>'.
                          'success = '.$rc['success'].'<br />'.
                          'lastseen = '.$rc[$key]['lastseen'].'<br />'.
                          'frequency = '.$rc[$key]['frequency'].'<br />'.
                          'appears = '.$rc[$key]['appears'].'<br />'.
                          'confidence = '.$rc[$key]['confidence'].'<br /></strong></div></fieldset>';

        if (!$rc['success'])
            return [SpamBot::NOTFOUND, sprintf($GLOBALS['TL_LANG']['SpamBot']['generic']['err'], $this->Name, $rc['error'])];

        if (!$rc[$key]['appears'])
            return [SpamBot::NOTFOUND, sprintf($GLOBALS['TL_LANG']['SpamBot']['generic']['notfound'], $this->Name)];

        // check confidence level
        if ($rc[$key]['confidence'] < $this->spambot_stopforumspam_score)
            $typ = SpamBot::HAM;
        else
            $typ = SpamBot::SPAM;

        return [$typ, sprintf($GLOBALS['TL_LANG']['SpamBot']['StopForumSpam']['stat'], $this->Name,
                                                $rc[$key]['confidence'], $rc[$key]['frequency'])];
    }

}

?>