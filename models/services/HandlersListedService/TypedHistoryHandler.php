<?php

namespace app\models\services\HandlersListedService;

abstract class TypedHistoryHandler extends BasicHistoryHandler
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