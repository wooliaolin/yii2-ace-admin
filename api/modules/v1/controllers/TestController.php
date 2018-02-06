<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\ContentNegotiator;
use yii\filters\auth\QueryParamAuth;

class TestController extends ActiveController
{
    public $modelClass = 'api\models\Goods';

    /**
     * Notes: 格式化响应
     * User: adrien
     * Date: 2018/1/29
     * Time: 17:14
     * @return mixed
     */
    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
       /* $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
            'tokenParam' => 'token',
            'optional' => [
            ],
        ];*/
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['http://doc.yiiadmin.lin'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                ],

            ],
        ], $behaviors);
    }

    public  function  actionHelloword()
    {
        return Yii::$app->request->get();
    }

}
