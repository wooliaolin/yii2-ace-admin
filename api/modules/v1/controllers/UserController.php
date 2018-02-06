<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\ContentNegotiator;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use api\models\LoginForm;
use common\models\User;


class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    /**
     * 分页
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];


    /**
     * Notes: 格式化响应
     * User: adrien
     * Date: 2018/1/29
     * Time: 17:14
     * @return mixed
     */
    public function behaviors()
    {
        return ArrayHelper::merge (parent::behaviors(), [
            'authenticator' => [
                'class' => QueryParamAuth::className(),
                'tokenParam' => 'token',
                'optional' => [
                    'login',
                    'signup'
                ],
            ]
        ] );
        /*$behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
            'optional' => [
                'login',
                'signup',
            ]
        ];
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['http://doc.yiiadmin.lin'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                    'MethodNotAllowedHttpException' => ['POST']
                ],
            ],
        ], $behaviors);*/
    }

    /***
     * Notes: 禁用某些内置动作或者定制化它们
     * User: adrien
     * Date: 2018/1/30
     * Time: 13:28
     * @return mixed
     */
    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        // unset($actions['delete'], $actions['create']);

        // customize the data provider preparation with the "prepareDataProvider()" method
        //$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    /**
     * Notes: 自定义数据返回
     * User: adrien
     * Date: 2018/1/30
     * Time: 13:34
     * @return Response
     */
    public function prepareDataProvider()
    {
        // prepare and return a data provider for the "index" action
        return ['ret'=>[],'status'=>'200'];
    }

    /**
     * 判断用户登录信息，并返回结果。
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            $data=array(
                'code'=>100,
                'message'=>'用户未登录',
                'data'=>'',
            );
        }else{
            $data=array(
                'code'=>200,
                'message'=>'用户已经登录',
                'data'=>array(
                    'user_id'=>Yii::$app->user->id,
                    'user_name'=>isset(\Yii::$app->user->identity->username) ? \Yii::$app->user->identity->username : '',
                ),
            );
        }
        echo json_encode($data);exit;
    }

    /**
     * Notes: Login
     * User: adrien
     * Date: 2018/1/30
     * Time: 14:51
     */
    public function  actionLogin()
    {
        $model = new LoginForm();//return Yii::$app->request->post();
        $model->setAttributes(Yii::$app->request->post());
        if ($user = $model->login()) {
            return $user->api_token;
        } else {
            return $model->errors;
        }
    }


    /**
     * 注册用户
     */
    public function actionSignup()
    {
        $user = new User();
        $user->generateAuthKey();
        $user->setPassword(Yii::$app->request->post()['password']);
        $user->username = Yii::$app->request->post()['username'];
        // $user->email = Yii::$app->request->post()['email'];
        $user->save(false);

        return [
            'code' => Yii::$app->request->post()
        ];
    }



}
