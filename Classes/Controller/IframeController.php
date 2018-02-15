<?php
namespace Saccas\Mapgeoadmin\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class IframeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected $iframeEmbedUrl = 'https://map.geo.admin.ch/embed.html';

    public function indexAction()
    {
        $tsfe = $this->getTsfe();

        $urlParams = (parse_url($this->settings['mapgeoadmin']['url'], PHP_URL_QUERY));

        $iframeLinkConf = [
            'parameter' => $this->iframeEmbedUrl . '?' . htmlspecialchars($urlParams),
        ];

        $iframeSrc = $tsfe->cObj->typoLink_URL($iframeLinkConf);
        $this->view->assign('iframeSrc', $iframeSrc);
    }

    private function getTsfe()
    {
        return $GLOBALS['TSFE'];
    }
}
