<?php

namespace app\widgets\HistoryList;

use app\models\search\HistorySearch;
use app\widgets\Export\Export;
use app\widgets\HistoryList\helpers\HistoryItemRenderer;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class HistoryList extends Widget
{
    /**
     * @var HistoryItemRenderer
     */
    public $itemRenderer;

    /**
     * HistoryList constructor.
     *
     * @param HistoryItemRenderer $itemRenderer
     * @param array $config
     */
    public function __construct(HistoryItemRenderer $itemRenderer, $config = [])
    {
        parent::__construct($config);

        $this->itemRenderer = $itemRenderer;
    }

    /**
     * @return string
     */
    public function run()
    {
        if (empty($this->itemRenderer)) {
            throw new InvalidConfigException('$itemRenderer should be set');
        }

        $model = new HistorySearch();

        return $this->render('main', [
            'model' => $model,
            'itemRenderer' => $this->itemRenderer,
            'linkExport' => $this->getLinkExport(),
            'dataProvider' => $model->search(Yii::$app->request->queryParams)
        ]);
    }

    /**
     * @return string
     */
    private function getLinkExport()
    {
        $params = Yii::$app->getRequest()->getQueryParams();
        $params = ArrayHelper::merge([
            'exportType' => Export::FORMAT_CSV
        ], $params);
        $params[0] = 'site/export';

        return Url::to($params);
    }
}
