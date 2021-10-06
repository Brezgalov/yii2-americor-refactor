<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\History
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $exportType string
 */

use app\models\History;
use app\widgets\Export\Export;
use app\widgets\HistoryList\helpers\HistoryListHelper;

$filename = 'history';
$filename .= '-' . time();

/**
 * Понятно что ini_set использован т.к. скрипт объемный и долгий
 * В таком случае лучше пересмотреть бизнес-процесс и вынести выполнение
 * этого скрипта отдельной задачей в queue, например.
 *
 * Для пользователя не понятно, долго страница грузится или зависла она или еще как
 * За это время у него может произойти сбой, он может закрыть вкладку и т.д.
 * Лучше выполнить операцию фоном и дать возможность пользователю забрать результат
 * когда сборка документа будет завершена
 */

ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');
?>

<?= Export::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'ins_ts',
            'label' => Yii::t('app', 'Date'),
            'format' => 'datetime'
        ],
        [
            'label' => Yii::t('app', 'User'),
            'value' => function (History $model) {
                return isset($model->user) ? $model->user->username : Yii::t('app', 'System');
            }
        ],
        [
            'label' => Yii::t('app', 'Type'),
            'value' => function (History $model) {
                return $model->object;
            }
        ],
        [
            'label' => Yii::t('app', 'Event'),
            'value' => function (History $model) {
                return $model->eventText;
            }
        ],
        [
            'label' => Yii::t('app', 'Message'),
            'value' => function (History $model) {
                return strip_tags(HistoryListHelper::getBodyByModel($model));
            }
        ]
    ],
    'exportType' => $exportType,
    'batchSize' => 2000,
    'filename' => $filename
]);