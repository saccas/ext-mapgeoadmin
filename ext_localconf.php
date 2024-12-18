<?php

defined('TYPO3') or die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Mapgeoadmin',
        'Embed',
        [
            \Saccas\Mapgeoadmin\Controller\IframeController::class => 'index',
        ],
        [
        ]
    );
})();
