<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$pluginName = 'Embed';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Saccas.' . $_EXTKEY,
    $pluginName,
    [
        'Iframe' => 'index',
    ],
    [
    ]
);
