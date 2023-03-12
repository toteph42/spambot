<?php
declare(strict_types=1);

/*
 * 	SpamBot Bundle
 *
 *	@copyright	(c) 2013 - 2023 Florian Daeumling, Germany. All right reserved
 * 	@license 	https://github.com/toteph42/spambot/blob/master/LICENSE
 */

namespace SpamBotBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use SpamBotBundle\SpamBotBundle;

class Plugin implements BundlePluginInterface {

    public function getBundles(ParserInterface $parser): array {
        return [
            BundleConfig::create(SpamBotBundle::class)
                ->setLoadAfter([ ContaoCoreBundle::class ]),
        ];
    }

}

?>