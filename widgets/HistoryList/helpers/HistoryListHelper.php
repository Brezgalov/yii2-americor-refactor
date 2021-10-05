<?php

namespace app\widgets\HistoryList\helpers;

use app\models\Call;
use app\models\Customer;
use app\models\History;
use app\models\HistoryServices\TextBodyBuilderService;
use yii\base\InvalidConfigException;

class HistoryListHelper
{
    /**
     * @param History $model
     * @return mixed
     * @throws InvalidConfigException
     */
    public static function getBodyByModel(History $model)
    {
        if (!\Yii::$app->has(historyTBBuilder)) {
            throw new InvalidConfigException('Missing ' . historyTBBuilder . ' component');
        }

        /**
         * @var $builder TextBodyBuilderService
         */
        $builder = \Yii::$app->get(historyTBBuilder);

        return $builder->resolveTextBody($model);
    }
}