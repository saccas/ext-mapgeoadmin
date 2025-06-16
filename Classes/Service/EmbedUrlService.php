<?php

declare(strict_types=1);

namespace Saccas\Mapgeoadmin\Service;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class EmbedUrlService
{
    protected string $iframeEmbedUrl = 'https://map.geo.admin.ch/embed.html';

    public function __construct(
        private readonly ContentObjectRenderer $contentObjectRenderer,
    ) {
    }

    public function getEmbededUrl(array $configuration): string
    {
        $iFrameUri = $this->getMapUriFromSettings($configuration);
        $urlParams = $this->getUrlParams($iFrameUri);

        return $this->getIframeEmbedUrl($urlParams);
    }

    private function getIframeEmbedUrl(string $urlParams): string
    {
        $iframeLinkConf = [
            'parameter' => $this->iframeEmbedUrl . '?' . $urlParams,
        ];

        return $this->contentObjectRenderer->typoLink_URL($iframeLinkConf);
    }

    private function getMapUriFromSettings(array $configuration): string
    {
        $iFrameUri = ArrayUtility::getValueByPath($configuration, 'mapgeoadmin/url');
        if (is_string($iFrameUri) && $iFrameUri !== '') {
            return $iFrameUri;
        }

        throw new \RuntimeException('No iframe url given.', 1749808194);
    }

    private function getUrlParams(string $uri): string
    {
        $urlFragment = parse_url($uri, PHP_URL_FRAGMENT);
        if ($urlFragment === false || $urlFragment === null) {
            $urlFragment = $uri;
        }

        $urlParams = parse_url($urlFragment, PHP_URL_QUERY);
        if (is_string($urlParams) && $urlParams !== '') {
            return $urlParams;
        }

        throw new \RuntimeException('Cannot determine query parameters.', 1749808194);
    }
}
