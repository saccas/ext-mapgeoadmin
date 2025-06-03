<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function (): void {
    $pluginSignature = ExtensionUtility::registerPlugin(
        'Mapgeoadmin',
        'Embed',
        'Map geo admin / iframe',
        'ext-mapgeoadmin-plugin',
        'plugins',
        'This will integrate a map from https://map.geo.admin.ch as iframe'
    );

    $GLOBALS['TCA']['tt_content']['types'][$pluginSignature] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                header,
                pi_flexform,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        ',
        'columnsOverrides' => [
            'header' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.html_formlabel',
            ],
        ],
    ];

    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:mapgeoadmin/Configuration/FlexForms/MapgeoadminIframe.xml',
        $pluginSignature,
    );
})();
