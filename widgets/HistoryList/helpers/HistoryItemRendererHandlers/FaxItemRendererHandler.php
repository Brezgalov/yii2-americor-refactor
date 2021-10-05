<?php

namespace app\widgets\HistoryList\helpers\HistoryItemRendererHandlers;

use app\models\History;
use app\widgets\HistoryList\helpers\HistoryItemRendererHandlers\Base\TypedHistoryHandler;
use app\widgets\HistoryList\helpers\HistoryListHelper;
use yii\helpers\Html;

class FaxItemRendererHandler extends TypedHistoryHandler
{
    /**
     * @var array
     */
    public $eventTypes = [
        History::EVENT_OUTGOING_FAX,
        History::EVENT_INCOMING_FAX,
    ];

    /**
     * @return mixed|string
     * @throws \yii\base\InvalidConfigException
     */
    public function handle()
    {
        $fax = $this->history->fax;

        return $this->view->render('_item_common', [
            'user' => $this->history->user,
            'body' => HistoryListHelper::getBodyByModel($this->history) .
                ' - ' .
                (isset($fax->document) ? Html::a(
                    \Yii::t('app', 'view document'),
                    $fax->document->getViewUrl(),
                    [
                        'target' => '_blank',
                        'data-pjax' => 0
                    ]
                ) : ''),
            'footer' => \Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $this->history->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ]);
    }
}