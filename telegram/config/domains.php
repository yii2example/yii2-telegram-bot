<?php

return [
    'telegram' => [
        'class' => 'yii2bundle\telegram\domain\Domain',
        'repositories' => [
            //'response' => 'telegram',
            'response' => 'http',
        ],
    ],
];
