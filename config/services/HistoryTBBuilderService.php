<?php

use app\models\HistoryServices\BodyBuilderHandlers\CallBasedBodyBuilderHandler;
use app\models\HistoryServices\BodyBuilderHandlers\DefaultBodyBuilderHandler;
use app\models\HistoryServices\TextBodyBuilderService;
use app\models\HistoryServices\BodyBuilderHandlers\TaskBasedBodyBuilderHandler;
use app\models\HistoryServices\BodyBuilderHandlers\SmsBasedBodyBuilderHandler;
use app\models\HistoryServices\BodyBuilderHandlers\CustomerTypeBasedBodyBuilderHandler;
use app\models\HistoryServices\BodyBuilderHandlers\CustomerQualityBasedBodyBuilderHandler;

return [
    'class' => TextBodyBuilderService::class,
    'defaultHandler' => DefaultBodyBuilderHandler::class,
    'handlers' => [
        TaskBasedBodyBuilderHandler::class,
        SmsBasedBodyBuilderHandler::class,
        CustomerTypeBasedBodyBuilderHandler::class,
        CustomerQualityBasedBodyBuilderHandler::class,
        CallBasedBodyBuilderHandler::class,
    ],
];