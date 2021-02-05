<?php
defined('TYPO3_MODE') or die();

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
