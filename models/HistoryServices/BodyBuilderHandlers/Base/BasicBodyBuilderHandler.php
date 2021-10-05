<?php

namespace app\models\HistoryServices\BodyBuilderHandlers\Base;

use app\models\History;
use app\models\services\HandlersListedService\IHistoryHandler;
use yii\base\Model;

/**
 * Class BasicBodyBuilderHandler
 * Избавляет от необходимости дублирования кода в однотипных Handler
 *
 * @package app\models\HistoryServices\BodyBuilderHandlers\Base
 */
abstract class BasicBodyBuilderHandler extends Model implements IHistoryHandler
{
    /**
     * @var History
     */
    protected $history;

    /**
     * @param History $history
     * @return bool
     */
    public function setHistory(History $history): bool
    {
        $this->history = $history;

        return true;
    }

    /**
     * @return bool
     */
    public function resolveIsPossible(): bool
    {
        return !empty($this->history);
    }
}