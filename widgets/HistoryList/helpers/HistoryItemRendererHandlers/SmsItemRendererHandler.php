<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\History;
use app\models\Sms;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;
use app\widgets\HistoryList\helpers\HistoryListHelper;

class SmsItemRendererHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_INCOMING_SMS,
        History::EVENT_OUTGOING_SMS,
    ];

    public function handle()
    {
        $footer = $this->history->sms->direction == Sms::DIRECTION_INCOMING ?
            \Yii::t('app', 'Incoming message from {number}', [
                'number' => $model->sms->phone_from ?? ''
            ]) : \Yii::t('app', 'Sent message to {number}', [
                'number' => $model->sms->phone_to ?? ''
            ]);

        return $this->view->render('_item_common', [
            'user' => $this->history->user,
            'body' => HistoryListHelper::getBodyByModel($this->history),
            'footer' => $footer,
            'iconIncome' => $model->sms->direction == Sms::DIRECTION_INCOMING,
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ]);
    }
}