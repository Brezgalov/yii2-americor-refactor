<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\Customer;
use app\models\History;
use app\models\HistoryServices\BodyBuilderHandlers\Base\TypedBodyBuilderHandler;

class CustomerTypeBasedBodyBuilderHandler extends TypedBodyBuilderHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_CUSTOMER_CHANGE_TYPE
    ];

    /**
     * @return string
     */
    public function handle()
    {
        /**
         * развернул конкатенацию, так больше текста, но читать проще
         */

        $detailOld = Customer::getTypeTextByType($this->history->getDetailOldValue('type')) ?? "not set";

        $detailNew = Customer::getTypeTextByType($this->history->getDetailNewValue('type')) ?? "not set";

        return "{$this->history->eventText} {$detailOld} to {$detailNew}";
    }
}