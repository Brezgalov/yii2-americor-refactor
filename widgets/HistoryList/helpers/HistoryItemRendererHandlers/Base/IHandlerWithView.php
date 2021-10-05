<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base;

use yii\web\View;

/**
 * Interface IHandlerWithView
 * @package app\widgets\HistoryList\helpers\HistoryItemRendererHelpers
 */
interface IHandlerWithView
{
    /**
     * @param View $view
     * @return bool
     */
    public function setView(View $view): bool;
}