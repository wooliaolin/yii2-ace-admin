<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\ContentNegotiator;
use yii\filters\auth\QueryParamAuth;

class GoodController extends BaseActiveController
{
    public $modelClass = 'api\models\Goods';

    /*
    * 自定义action
    */
    public function actions()
    {
        $actions = parent::actions();
        // 禁用action
        unset($actions['delete'], $actions['create']);
        // 重写action
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /**
    * 重写actionIndex
    */
    public  function  prepareDataProvider()
    {
        return $this->user;
        return Yii::$app->request->get();
    }

}
