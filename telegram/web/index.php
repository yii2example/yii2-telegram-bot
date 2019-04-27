<?php

use yii2rails\domain\base\BaseDomainLocator;
use yii2rails\domain\helpers\DomainHelper;

$name = 'console';
$path = '../..';

@include_once(__DIR__ . '/' . $path . '/vendor/yii2rails/yii2-app/src/App.php');

if(!class_exists(App::class)) {
    die('Run composer install');
}

App::initPhpApplication($name);
App::$domain = new BaseDomainLocator;

DomainHelper::forgeDomains([

]);

include(__DIR__ . '/' . $path . '/vendor/yii2bundle/yii2-telegram/src/domain/libs/bootstrap.php');
