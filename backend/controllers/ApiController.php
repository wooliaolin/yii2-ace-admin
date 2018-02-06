<?php

namespace backend\controllers;

use Yii;
use backend\models\Definitions;
use common\models\Api;

/**
 * Class ApiController api 执行操作控制器
 * @package backend\controllers
 */
class ApiController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'common\models\Api';
    public $definitions = [];

    public  function  init()
    {
        parent::init();
        $this->definitions = Definitions::find()->all();
    }
    /**
     * 查询用户数据
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'methods' => Yii::$app->params['methods'],
            'schemelist' => Yii::$app->params['schemelist'],
            'versions' => Yii::$app->params['versions'],
            'definitions' => $this->definitions,
        ]);
    }

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

    /**
     * Api Form
     */
    public function actionForm()
    {
        $formdata = Api::findOne(Yii::$app->request->get('id')) ;
        $parameters = $formdata['parameters'];
        // var_dump(json_decode($parameters,true));die;
        return $this->render('form',[
            'methods' => Yii::$app->params['methods'],
            'schemelist' => Yii::$app->params['schemelist'],
            'versions' => Yii::$app->params['versions'],
            'definitions' => $this->definitions,
            'enctype' => Yii::$app->params['enctype'],
            'formType' => Yii::$app->params['formType'],
            'formPath' => Yii::$app->params['formPath'],
            'formdata' => $formdata ? $formdata->toArray() : $formdata,
            'parameters' => $parameters ? json_decode($parameters,true) : '',
        ]);
    }

    public function actionCreate()
    {
        if(Yii::$app->request->post('id')){
            parent::actionUpdate();
            return $this->redirect('/api/index');
        }
        else{
            parent::actionCreate();
            return $this->redirect('/api/form');
        }
    }
}
