<?php
namespace Saccas\Mapgeoadmin\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class IframeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function indexAction()
    {
        if($GLOBALS['TSFE']->sys_language_isocode) {
            $sys_language_isocode = $GLOBALS['TSFE']->sys_language_isocode;
        } else {
            $sys_language_isocode = $GLOBALS['TSFE']->sys_language_isocode_default;
        }

        $this->view->assign('sys_language_isocode', $GLOBALS['TSFE']->sys_language_isocode);
    }
}
