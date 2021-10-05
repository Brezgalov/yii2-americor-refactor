<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\History;
use app\models\HistoryServices\BodyBuilderHandlers\Base\TypedBodyBuilderHandler;

class TaskBasedBodyBuilderHandler extends TypedBodyBuilderHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_CREATED_TASK,
        History::EVENT_COMPLETED_TASK,
        History::EVENT_UPDATED_TASK,
    ];

    /**
     * Без тернарного оператора проще читать
     * @return string
     */
    public function handle()
    {
        if ($this->history->task) {
            return "{$this->history->eventText}: " . ($this->history->task->title ?? '');
        }

        return '';
    }
}