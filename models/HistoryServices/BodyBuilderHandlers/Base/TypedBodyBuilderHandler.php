<?php

namespace app\models\HistoryServices\BodyBuilderHandlers\Base;

abstract class TypedBodyBuilderHandler extends BasicBodyBuilderHandler
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