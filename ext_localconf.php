<?php

use Saccas\Mapgeoadmin\Controller\IframeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function () {
    ExtensionUtility::configurePlugin(
        'Mapgeoadmin',
        'Embed',
        [
            IframeController::class => 'index',
        ]
    );
})();
