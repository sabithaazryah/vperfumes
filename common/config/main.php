<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'SetValues' => [
            'class' => 'common\components\SetValues'
        ],
        'CartFunctionality' => [
            'class' => 'common\components\CartFunctionality'
        ],
        'UploadFile' => [
            'class' => 'common\components\UploadFile'
        ],
        'SetLanguage' => [
            'class' => 'common\components\SetLanguage'
        ],
        'EncryptDecrypt' => [
            'class' => 'common\components\EncryptDecrypt'
        ],
    ],
];
