<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function ($extensionKey) {
    ExtensionUtility::registerPlugin(
        'Mapgeoadmin',
        'Embed',
        'Map geo admin / iframe',
        'EXT:mapgeoadmin/Resources/Public/Icons/Extension.png'
    );

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$extensionKey . '_embed'] = 'recursive,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$extensionKey . '_embed'] = 'pi_flexform';

    ExtensionManagementUtility::addPiFlexFormValue(
        $extensionKey . '_embed',
        'FILE:EXT:' . $extensionKey . '/Configuration/FlexForms/MapgeoadminIframe.xml'
    );
})('mapgeoadmin');
