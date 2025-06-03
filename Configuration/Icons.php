<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;

return [
    'ext-mapgeoadmin-plugin' => [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:mapgeoadmin/Resources/Public/Icons/Extension.png',
    ],
];
