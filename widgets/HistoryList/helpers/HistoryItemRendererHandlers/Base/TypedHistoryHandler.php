<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base;

use app\models\services\HandlersListedService\TypedHistoryHandler as OriginalTypedHistoryHandler;
use yii\web\View;

/**
 * Class TypedHistoryHandler
 * @package app\widgets\HistoryList\helpers\HistoryItemRendererHelpers
 */
abstract class TypedHistoryHandler extends OriginalTypedHistoryHandler implements IHandlerWithView
{
    /**
     * @var View
     */
    public $view;

    /**
     * @param View $view
     * @return bool
     */
    public function setView(View $view): bool
    {
        $this->view = $view;

        return true;
    }
}