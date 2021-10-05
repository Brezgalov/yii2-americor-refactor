<?php

namespace app\models\HistoryServices\BodyBuilderHandlers\Base;

use app\models\services\HandlersListedService\BasicHistoryHandler;

abstract class TypedBodyBuilderHandler extends BasicHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [];

    /**
     * @return bool
     */
    public function resolveIsPossible(): bool
    {
        return parent::resolveIsPossible() && (
            empty($this->eventTypes) ||
            in_array($this->history->event, $this->eventTypes)
        );
    }
}