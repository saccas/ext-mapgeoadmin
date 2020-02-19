<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Map geo admin',
    'description' => 'Map geo admin iframe integration',
    'category' => 'misc',
    'shy' => 0,
    'version' => '1.0.3',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'author' => '',
    'author_email' => '',
    'author_company' => '',
    'autoload' =>
        [
            'psr-4' => ['Saccas\\Mapgeoadmin\\' => 'Classes']
        ],
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.13-9.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    '_md5_values_when_last_written' => 'a:0:{}',
    'suggests' => [
    ],
];
