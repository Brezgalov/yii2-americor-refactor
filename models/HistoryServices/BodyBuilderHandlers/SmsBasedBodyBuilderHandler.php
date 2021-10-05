<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\History;
use app\models\HistoryServices\BodyBuilderHandlers\Base\TypedBodyBuilderHandler;

class SmsBasedBodyBuilderHandler extends TypedBodyBuilderHandler
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