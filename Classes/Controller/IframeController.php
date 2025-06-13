<?php

declare(strict_types=1);

namespace Saccas\Mapgeoadmin\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Saccas\Mapgeoadmin\Service\EmbedUrlService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class IframeController extends ActionController
{
    public function __construct(
        private readonly EmbedUrlService $embedUrlService,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function indexAction(): ResponseInterface
    {
        $iFrameUri = '';

        try {
            $iFrameUri = $this->embedUrlService->getEmbededUrl($this->settings);
        } catch (\RuntimeException $e) {
            $this->logger->log(LogLevel::ERROR, $e->getMessage());
        }

        $this->view->assign('iframeSrc', $iFrameUri);

        return $this->htmlResponse();
    }
}
