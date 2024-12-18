<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Map geo admin',
    'description' => 'Map geo admin iframe integration',
    'category' => 'misc',
    'version' => '3.0.1',
    'state' => 'stable',
    'author' => '',
    'author_email' => '',
    'author_company' => '',
    'autoload' => [
        'psr-4' => [
            'Saccas\\Mapgeoadmin\\' => 'Classes',
        ],
    ],
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.16-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
