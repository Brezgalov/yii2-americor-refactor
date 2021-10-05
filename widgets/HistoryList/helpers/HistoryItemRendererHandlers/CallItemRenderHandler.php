<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\Call;
use app\models\History;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;
use app\widgets\HistoryList\helpers\HistoryListHelper;

class CallItemRenderHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_INCOMING_CALL,
        History::EVENT_OUTGOING_CALL,
    ];

    /**
     * @return mixed|string
     * @throws \yii\base\InvalidConfigException
     */
    public function handle()
    {
        /** @var Call $call */
        $call = $this->history->call;
        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        return $this->view->render('_item_common', [
            'user' => $this->history->user,
            'content' => $call->comment ?? '',
            'body' => HistoryListHelper::getBodyByModel($this->history),
            'footerDatetime' => $this->history->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
        ]);
    }
}