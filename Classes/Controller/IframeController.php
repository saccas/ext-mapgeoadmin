<?php

namespace Saccas\Mapgeoadmin\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class IframeController extends ActionController
{
    protected $iframeEmbedUrl = 'https://map.geo.admin.ch/embed.html';

    public function indexAction(): ResponseInterface
    {
        $tsfe = $this->getTsfe();

        $urlParams = (parse_url((string)$this->settings['mapgeoadmin']['url'], PHP_URL_QUERY));

        $iframeLinkConf = [
            'parameter' => $this->iframeEmbedUrl . '?' . $urlParams,
        ];

        $iframeSrc = $tsfe->cObj->typoLink_URL($iframeLinkConf);
        $this->view->assign('iframeSrc', $iframeSrc);

        return $this->htmlResponse();
    }

    private function getTsfe()
    {
        return $GLOBALS['TSFE'];
    }
}
