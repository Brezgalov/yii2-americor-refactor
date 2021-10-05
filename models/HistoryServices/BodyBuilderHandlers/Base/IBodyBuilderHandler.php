<?php

namespace app\models\HistoryServices\BodyBuilderHandlers\Base;

use app\models\History;
use app\models\services\HandlersListedService\IHandler;

/**
 * Interface IBodyBuilderHandler
 * Благодаря интерфейсу можно использовать в кач-ве Handler какую угодно модель
 *
 * @package app\models\HistoryServices\BodyBuilderHandlers\Base
 */
interface IBodyBuilderHandler extends IHandler
{
    /**
     * @param History $history
     * @return bool
     */
    public function setHistory(History $history): bool;
}