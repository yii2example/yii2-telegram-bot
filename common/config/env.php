<?php


use yii2rails\app\domain\commands\ApiVersion;
use yii2rails\app\domain\commands\RunBootstrap;
use yii2rails\app\domain\filters\config\LoadConfig;
use yii2rails\app\domain\filters\config\LoadModuleConfig;
use yii2rails\app\domain\filters\config\LoadRouteConfig;
use yii2rails\domain\filters\LoadDomainConfig;
use yii2rails\app\domain\enums\YiiEnvEnum;

$config = [
	'servers' => [
		'db' => [
			'main' => [
				'map' => [
                    'rest_collection' => 'bot.rest',
				],
			],
		],
	],
	'client' => [
		'defaultTimeZone' => 'Asia/Almaty',
	],
    'app' => [
        'commands' => [
            [
                'class' => RunBootstrap::class,
                'app' => COMMON,
            ],
            [
                'class' => RunBootstrap::class,
                'app' => APP,
            ],
            [
                'class' => ApiVersion::class,
                'isEnabled' => APP == API,
            ],
            [
                'class' => 'yii2rails\domain\filters\DefineDomainLocator',
                'filters' => [
                    [
                        'class' => LoadDomainConfig::class,
                        'app' => COMMON,
                        'name' => 'domains',
                        'withLocal' => true,
                    ],
                ],
            ],
            /*[
                'class' => 'yii2module\offline\domain\filters\IsOffline',
                'exclude' => [
                    CONSOLE,
                    BACKEND,
                ],
            ],*/
        ],
    ],
    'config' => [
        'filters' => [
            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'main',
                'withLocal' => true,
            ],
            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'main',
                'withLocal' => true,
            ],

            [
                'class' => LoadModuleConfig::class,
                'app' => COMMON,
                'name' => 'modules',
                'withLocal' => true,
            ],
            [
                'class' => LoadModuleConfig::class,
                'app' => APP,
                'name' => 'modules',
                'withLocal' => true,
            ],

            [
                'class' => LoadRouteConfig::class,
                'app' => APP,
                'name' => 'routes',
                'withLocal' => true,
            ],

            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'params',
                'withLocal' => true,
                'assignTo' => 'params',
            ],
            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'params',
                'withLocal' => true,
                'assignTo' => 'params',
            ],

            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'install',
            ],
            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'install',
            ],

            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'test',
                'withLocal' => true,
                'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
            ],
            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'test',
                'withLocal' => true,
                'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
            ],

            'migration' => [
                'class' => 'yii2lab\db\domain\filters\migration\SetPath',
                'path' => [
                    '@vendor/yii2bundle/yii2-telegram/src/domain/migrations',
                    '@vendor/yii2bundle/yii2-lang/src/domain/migrations',
                    '@vendor/yiisoft/yii2/log/migrations'
                ],
                'scan' => [
                    '@domain',
                ],
            ],

            'yii2rails\app\domain\filters\config\StandardConfigMutations',
            'yii2rails\app\domain\filters\config\DebugModule',
        ],
    ],
];

return $config;