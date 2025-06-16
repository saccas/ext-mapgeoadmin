<?php

use Saccas\Mapgeoadmin\Controller\IframeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'Mapgeoadmin',
    'Embed',
    [
        IframeController::class => 'index',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
