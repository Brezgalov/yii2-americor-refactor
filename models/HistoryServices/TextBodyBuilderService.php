<?php

namespace app\models\HistoryServices;

use app\models\History;
use app\models\HistoryServices\BodyBuilderHandlers\Base\IBodyBuilderHandler;
use app\models\services\HandlersListedService;

/**
 * Class TextBodyBuilderService
 * @package app\models\HistoryServices
 */
class TextBodyBuilderService extends HandlersListedService
{
    /**
     * @var History
     */
    protected $historyTmp;

    /**
     * @param History $history
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function resolveTextBody(History $history)
    {
        $this->historyTmp = $history;

        return parent::resolve();
    }

    /**
     * @param $handler
     * @return IBodyBuilderHandler|HandlersListedService\IHandler|mixed
     * @throws \yii\base\InvalidConfigException
     */
    protected function prepareHandler($handler)
    {
        $handler = parent::prepareHandler($handler);

        if ($this->historyTmp && $handler instanceof IBodyBuilderHandler) {
            $handler->setHistory($this->historyTmp);
        }

        return $handler;
    }
}