<?php
defined('TYPO3_MODE') or die();

$extensionKey = 'mapgeoadmin';
$pluginName = 'Embed';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Saccas.' . $extensionKey,
    $pluginName,
    'Map geo admin / iframe',
    'EXT:mapgeoadmin/Resources/Public/Icons/Extension.png'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['mapgeoadmin_embed'] = 'recursive,select_key,pages';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['mapgeoadmin_embed'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('mapgeoadmin_embed', 'FILE:EXT:mapgeoadmin/Configuration/FlexForms/MapgeoadminIframe.xml');
