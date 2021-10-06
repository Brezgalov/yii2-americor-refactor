<?php

namespace app\commands;

use app\widgets\HistoryList\HistoryList;
use yii\console\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        var_dump(HistoryList::widget([]));
    }
}