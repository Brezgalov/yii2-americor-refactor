<?php

namespace app\widgets\HistoryList\helpers;

use app\models\services\HandlersListedService;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\IHandlerWithView;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\CallItemRenderHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\CustomerQualityItemRenderHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\CustomerTypeItemRenderHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\DefaultItemRenderHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\FaxItemRendererHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\SmsItemRendererHandler;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\TaskItemRenderHandler;
use yii\web\View;

class HistoryItemRenderer extends HandlersListedService
{
    /**
     * @var View
     */
    public $view;

    /**
     * HistoryItemRenderer constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->defaultHandler = DefaultItemRenderHandler::class;

        $this->handlers = [
            TaskItemRenderHandler::class,
            SmsItemRendererHandler::class,
            FaxItemRendererHandler::class,
            CustomerTypeItemRenderHandler::class,
            CustomerQualityItemRenderHandler::class,
            CallItemRenderHandler::class,
        ];

        parent::__construct($config);
    }

    /**
     * @param View $view
     * @return bool
     */
    public function setView(View $view): bool
    {
        $this->view = $view;

        return true;
    }

    /**
     * @param $handler
     * @return HandlersListedService\IHandler
     * @throws \yii\base\InvalidConfigException
     */
    public function prepareHandler($handler)
    {
        $handler = parent::prepareHandler($handler);

        if ($handler instanceof IHandlerWithView) {
            $handler->setView($this->view);
        }

        return $handler;
    }
}