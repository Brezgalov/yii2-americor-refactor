<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\Customer;
use app\models\History;
use app\models\services\HandlersListedService\TypedHistoryHandler;

class CustomerQualityBasedBodyBuilderHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_CUSTOMER_CHANGE_QUALITY,
    ];

    public function handle()
    {
        /**
         * развернул конкатенацию, так больше текста, но читать проще
         * Здесь очень похоже на CustomerTypeBasedBodyBuilderHandler
         * Не хочу вводить ПОКА отдельный базовый хендлер ради двух типов,
         * потому что мы не знаем как они будут развиваться. Если при след.
         * правках поменяется формат отдачи в этих хендлерах - работа по
         * универсализации будет лишней
         */

        $detailOld = Customer::getTypeTextByType($this->history->getDetailOldValue('quality')) ?? "not set";

        $detailNew = Customer::getTypeTextByType($this->history->getDetailNewValue('quality')) ?? "not set";

        return "{$this->history->eventText} {$detailOld} to {$detailNew}";
    }
}