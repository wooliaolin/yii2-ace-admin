<?php

namespace backend\controllers;

/**
 * Class GoodsController goods 执行操作控制器
 * @package backend\controllers
 */
class GoodsController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'api\models\Goods';

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
}
