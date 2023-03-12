<?php
declare(strict_types=1);

/*
 * 	SpamBot Bundle
 *
 *	@copyright	(c) 2013 - 2023 Florian Daeumling, Germany. All right reserved
 * 	@license 	https://github.com/toteph42/spambot/blob/master/LICENSE
 */

namespace SpamBotBundle\Module;

use Contao\Module;

class SpamBotIP extends Module {

    /*
     * @var string
     */
    protected $strTemplate = 'mod_spambot';

    public function generate(): string {
        if (TL_MODE === 'BE') {
            $obj = new \Contao\BackendTemplate('be_wildcard');
            $obj->wildcard = '### SPAMBOT IP PROTECTION ###';
            $obj->title = $this->headline;
            $obj->id = $this->id;
            $obj->link = $this->name;

            return $obj->parse();
        }

        return parent::generate();
    }

    protected function compile(): void {

        // perform checking
        $obj = new SpamBotMod(intval($this->id));

        // get IP address
        $ip = $obj->getIP();

        // perform checking
        list($ptyp, $pstat) = $obj->checkIP($ip);
        if (!($ptyp & (SpamBot::SPAM | SpamBot::BLACKL)))
            return;

        // load/save information
        $v = [
            'clientIP' => $ip,
            'Typ'      => SpamBot::$Status[$ptyp],
            'Status'   => $pstat,
        ];
        $this->setCookie('SpamBot', base64_encode(serialize($v)), 0);

        if ($obj->spambot_page)
            $this->redirectToFrontendPage($obj->spambot_page);
        else {
            // set flag for SpamBot::clearTemplate()
            $GLOBALS['SpamBot']['Catch'] = !$obj->spambot_msg ? $ptyp : NULL;
            // make data available for template processing
            $this->Template->clientIP = $v['clientIP'];
            $this->Template->Typ = $v['Typ'];
            $this->Template->Status = $v['Status'];
        }
    }

}

?>