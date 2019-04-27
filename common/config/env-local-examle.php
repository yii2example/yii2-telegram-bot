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
	'domain' => [
		'driver' => [
			'primary' => 'ar',
			'slave' => 'ar',
		],
	],
];
