<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\History;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;
use app\widgets\HistoryList\helpers\HistoryListHelper;

/**
 * Class TaskItemRenderHandler
 * @package app\widgets\HistoryList\helpers\HistoryItemRendererHandlers
 */
class TaskItemRenderHandler extends TypedHistoryHandler
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
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function handle()
    {
        $task = $this->history->task;

        return $this->view->render('_item_common', [
            'user' => $this->history->user,
            'body' => HistoryListHelper::getBodyByModel($this->history),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $this->history->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: {$task->customerCreditor->name}" : ''
        ]);
    }
}