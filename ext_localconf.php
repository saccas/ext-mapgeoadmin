<?php

use Saccas\Mapgeoadmin\Controller\IframeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'Mapgeoadmin',
    'Embed',
    [
        IframeController::class => 'index',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
