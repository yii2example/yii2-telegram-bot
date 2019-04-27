<?php

return [
	'url' => [
        'test-telegram' => 'http://bot.ex/?token=123456:QWERTYUIOPASDFGHJKL',
	],
	'servers' => [
		'db' => [
            'main' => [
                'driver' => 'sqlite',
                'dbname' => '@common/runtime/sqlite/main.db',
                'map' => null,
            ],
		],
	],
	'mode' => [
		'env' => 'dev',
		'debug' => true,
	],
	'jwt' => [
		'profiles' => [
			'auth' => [
				'key' => 'W4PpvVwI82Rfl9fl2R9XeRqBI0VFBHP3',
                'lifetime' => \yii2rails\extension\enum\enums\TimeEnum::SECOND_PER_YEAR,
			],
		],
	],
	'domain' => [
		'driver' => [
			'primary' => 'ar',
			'slave' => 'ar',
		],
	],
];
