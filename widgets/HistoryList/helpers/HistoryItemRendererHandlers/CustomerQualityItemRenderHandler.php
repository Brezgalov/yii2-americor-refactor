<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\Customer;
use app\models\History;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;

class CustomerQualityItemRenderHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_CUSTOMER_CHANGE_QUALITY
    ];

    public function handle()
    {
        return $this->view->render('_item_statuses_change', [
            'model' => $this->history,
            'oldValue' => Customer::getQualityTextByQuality($this->history->getDetailOldValue('quality')),
            'newValue' => Customer::getQualityTextByQuality($this->history->getDetailNewValue('quality')),
        ]);
    }
}