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

class SpamBotMail extends Module {

    public function generate(): string {
        if (TL_MODE === 'BE') {
            $obj            = new \Contao\BackendTemplate('be_wildcard');
            $obj->wildcard  = '### SPAMBOT MAIL PROTECTION ###';
            $obj->title     = $this->headline;
            $obj->id        = $this->id;
            $obj->link      = $this->name;
            return $obj->parse();
        }

        return parent::generate();
    }

    public function compile(): void {
    }

}

?>