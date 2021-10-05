<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\BasicHistoryHandler;
use app\widgets\HistoryList\helpers\HistoryListHelper;

/**
 * Class DefaultItemRenderHandler
 * @package app\widgets\HistoryList\helpers\HistoryItemRendererHandlers
 */
class DefaultItemRenderHandler extends BasicHistoryHandler
{
    public function handle()
    {
        return $this->view->render('_item_common', [
            'user' => $this->history->user,
            'body' => HistoryListHelper::getBodyByModel($this->history),
            'bodyDatetime' => $this->history->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ]);
    }
}