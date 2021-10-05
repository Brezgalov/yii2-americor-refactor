<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\Call;
use app\models\History;
use app\models\HistoryServices\BodyBuilderHandlers\Base\TypedBodyBuilderHandler;

class CallBasedBodyBuilderHandler extends TypedBodyBuilderHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_INCOMING_CALL,
        History::EVENT_OUTGOING_CALL,
    ];

    /**
     * @return string
     */
    public function handle()
    {
        /** @var Call $call */
        $call = $this->history->call;

        if (empty($call)) {
            return '<i>Deleted</i> ';
        }

        $totalDisposition = $call->getTotalDisposition(false);

        $totalDispositionHtml = $totalDisposition ? "<span class='text-grey'>{$totalDisposition}</span>" : "";

        return "{$call->totalStatusText} {$totalDispositionHtml}";
    }
}