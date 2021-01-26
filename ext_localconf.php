<?php
defined('TYPO3_MODE') or die();

(static function ($extkey) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Saccas.' . $extkey,
        'Embed',
        [
            'Iframe' => 'index',
        ],
        [
        ]
    );
})('mapgeoadmin');