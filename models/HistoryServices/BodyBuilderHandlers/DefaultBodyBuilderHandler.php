<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\services\HandlersListedService\BasicHistoryHandler;

/**
 * Class DefaultBodybuilderHandler
 * При любом типе возвращаем текст события
 *
 * @package app\models\HistoryServices\BodyBuilderHandlers
 */
class DefaultBodyBuilderHandler extends BasicHistoryHandler
{
    /**
     * @return string
     */
    public function handle()
    {
        return $this->history->eventText;
    }
}