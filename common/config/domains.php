<?php

$config = [
	'storage' => null,
	'staff' => null,
];

$configFile = __DIR__ . '/../../vendor/yubundle/yii2-common/src/project/common/config/domains.php';
return \yii2rails\extension\common\helpers\Helper::includeConfig($configFile, $config);