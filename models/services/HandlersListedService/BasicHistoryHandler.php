<?php

namespace app\models\services\HandlersListedService;

use app\models\History;
use yii\base\Model;

/**
 * Class BasicHistoryHandler
 * Избавляет от необходимости дублирования кода в однотипных Handler
 *
 * @package app\models\services\HandlersListedService
 */
abstract class BasicHistoryHandler extends Model implements IHistoryHandler
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