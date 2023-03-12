<?php
declare(strict_types=1);

/*
 *	SpamBot Bundle
 *
 *	@copyright	(c) 2013 - 2023 Florian Daeumling, Germany. All right reserved
 * 	@license 	https://github.com/toteph42/spambot/blob/master/LICENSE
 */

namespace SpamBotBundle\Module;

use Contao\FormTextField;

class SpamBotTextField extends FormTextField {

    /**
     * Set a parameter
     */
    public function __set($strKey, $varValue) {
        if ('rgxp' === $strKey && 'email' === $varValue)
            $varValue = 'rgxSpamBots';
        parent::__set($strKey, $varValue);
    }

}

?>