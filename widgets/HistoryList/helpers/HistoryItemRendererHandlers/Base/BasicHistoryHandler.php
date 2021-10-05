<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base;

use app\models\services\HandlersListedService\BasicHistoryHandler as OriginalBasicHistoryHandler;
use yii\web\View;

abstract class BasicHistoryHandler extends OriginalBasicHistoryHandler implements IHandlerWithView
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