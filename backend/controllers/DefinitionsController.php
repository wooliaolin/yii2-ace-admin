<?php

namespace backend\controllers;

use Yii;
use backend\models\Definitions;
use yii\helpers\Json;

class DefinitionsController extends Controller
{
    public $modelClass = 'backend\models\Definitions';

    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {
        return [

        ];
    }

    public function actionIndex()
    {
        return $this->render('index',['versions' => Yii::$app->params['versions']]);
    }

    public function  actionNew()
    {
        return $this->render('new',['versions' => Yii::$app->params['versions']]);
    }

    public function actionCreate()
    {
        parent::actionCreate();
        return $this->redirect('/definitions/new');
    }

    public  function  actionCheck()
    {
        $count = Definitions::find()->where(['name'=>Yii::$app->request->get('name'),'version'=>Yii::$app->request->get('version')])->count();
        if($count>0){
            return Json::encode(['ret'=>'ok']);
        }
        return Json::encode(['ret'=>'no']);
    }

}
