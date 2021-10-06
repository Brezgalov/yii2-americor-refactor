<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\History;
use app\models\services\HandlersListedService\TypedHistoryHandler;

class SmsBasedBodyBuilderHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_INCOMING_SMS,
        History::EVENT_OUTGOING_SMS,
    ];

    /**
     * @return mixed|string
     */
    public function handle()
    {
        if (empty($this->history->sms)) {
            return '';
        }

        return $this->history->sms->message ?: '';
    }
}