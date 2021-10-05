<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\Customer;
use app\models\History;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;

class CustomerTypeItemRenderHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_CUSTOMER_CHANGE_TYPE,
    ];

    /**
     * @return mixed|string
     */
    public function handle()
    {
        return $this->view->render('_item_statuses_change', [
            'model' => $this->history,
            'oldValue' => Customer::getTypeTextByType($this->history->getDetailOldValue('type')),
            'newValue' => Customer::getTypeTextByType($this->history->getDetailNewValue('type'))
        ]);
    }
}