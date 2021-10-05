<?php

namespace app\models\services\HandlersListedService;

use app\models\History;

/**
 * Interface IHistoryHandler
 * Благодаря интерфейсу можно использовать в кач-ве Handler какую угодно модель
 *
 * @package app\models\services\HandlersListedService;
 */
interface IHistoryHandler extends IHandler
{
    /**
     * @param History $history
     * @return bool
     */
    public function setHistory(History $history): bool;
}