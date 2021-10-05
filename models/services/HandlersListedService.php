<?php

namespace app\models\services;

use app\models\services\HandlersListedService\IHandler;
use yii\base\InvalidConfigException;

/**
 * Class HandlersListedService
 * Сервис абстрактный потому что его инстанцирование не предполагается в данной реализации
 *
 * @package app\models\services
 */
abstract class HandlersListedService extends \yii\base\Model
{
    /**
     * @var array|string
     */
    public $defaultHandler;

    /**
     * @var IHandler[]
     */
    public $handlers = [];

    /**
     * Обрабатывает список хендлеров и возвращает значение
     * @return mixed
     * @throws InvalidConfigException
     */
    protected function resolve()
    {
        if (empty($this->defaultHandler)) {
            throw new InvalidConfigException('$defaultHandler is required');
        }

        if (!is_array($this->handlers)) {
            throw new InvalidConfigException('$handlers should be array of ' . IHandler::class);
        }

        foreach ($this->handlers as $handler) {
            $handler = $this->prepareHandler($handler);

            if($handler->resolveIsPossible()) {
                return $handler->handle();
            }
        }

        $defaultHandler = $this->prepareHandler($this->defaultHandler);

        return $defaultHandler->handle();
    }

    /**
     * @param $handler
     * @return IHandler
     * @throws InvalidConfigException
     */
    protected function prepareHandler($handler)
    {
        if (!($handler instanceof IHandler)) {
            $handler = \Yii::createObject($handler);
        }

        if (!($handler instanceof IHandler)) {
            throw new InvalidConfigException('$handler should be instance of ' . IHandler::class);
        }

        return $handler;
    }
}