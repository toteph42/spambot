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

class Spamhaus extends SpamBot {
    /*
     * @var string
     */
    protected $Name = 'Spamhaus';
    /*
     * @var array
     */
    protected $Fields = [ 'spambot_spamhaus_mods' => 1 ];
}

?>