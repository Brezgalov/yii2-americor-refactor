<?php

namespace app\models\HistoryServices\BodyBuilderHandlers;

use app\models\HistoryServices\BodyBuilderHandlers\Base\BasicBodyBuilderHandler;

/**
 * Class DefaultBodybuilderHandler
 * При любом типе возвращаем текст события
 *
 * @package app\models\HistoryServices\BodyBuilderHandlers
 */
class DefaultBodyBuilderHandler extends BasicBodyBuilderHandler
{
    /**
     * @return string
     */
    public function handle()
    {
        return $this->history->eventText;
    }
}