<?php

namespace api\modules\v1\controllers;

use yii\web\Controller;
use common\models\Api;


/**
 * Default controller for the `v1` module
 */
class DocController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout= false;
        return $this->render('index',['api'=>'/v1/doc/data']);
    }

    /**
     * 查看接口文档
     * @return mixed|string
     */
    public function actionData()
    {
        $data =  Api::find()->where(['version'=>'v1'])->all();
        $json = '';
        foreach ($data as $key => $value) {
            $json .= '"'.$value['url'].'":{';
            $json .= '"'.$value['method'].'":{';
            $json .= '"tags":["'.$value['tags'].'"]';
            $json .= ',"summary":"'.$value['summary'].'"';
            $json .= ',"description":"'.$value['description'].'"';
            $json .= ',"produces":"['.$value['produces'].']"';
            $json .= ',"parameters":'.$value['parameters'];
            $json .= ',"responses":'.$value['responses'];
            $json .= '}';
            $json .= '},';
        }
        $json = rtrim($json,',');
        return '{
            "swagger": "2.0",
            "info": {
                "title": "ApiDoc",
                "version": "v1"
            },
            "paths": {'.
            $json
            .'}
        }';
    }
}
