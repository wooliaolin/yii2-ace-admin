<?php
return [
    'adminRoleName' => 'administrator',                 // 超级管理员角色名
    'adminEmail' => 'admin@example.com',                // 管理员邮箱
    'cacheTime'  => 86400,                              // 用户登录的缓存时间
    'status'     => ['停用', '启用'],                   // 通用状态
    'projectName' => 'Yii2 后台管理系统',               // 项目名称
    'projectTitle' => 'Yii2 后台管理系统',
    'companyName' => '<span class="blue bolder"> Liujinxing </span> Yii2 Admin 项目 &copy; 2016-2018',
    'iframeNumberSize' => 8,                           // 允许页面打开几个iframe窗口

    'versions' => [
        'v1' => 'v1',
        'v2' => 'v2',
        'v3' => 'v3',
        'v4' => 'v4',
    ],
    'methods' => [
        'get'=>'get',
        'post'=>'post',
        'put'=>'put',
        'delete'=>'delete',
        'options'=>'options'
    ],
    'schemelist' => [
        'http'=>'http',
        'https'=>'https',
        'ws'=>'ws',
        'wss'=>'wss'
    ],
    'enctype' => [
        'application/json',
        'application/x-www-form-urlencoded',
        'multipart/form-data'
    ],
    'formType' => [
        'integer',
        'long',
        'float',
        'double',
        'string',
        'byte',
        'binary',
        'boolean',
        'date',
        'dateTime',
        'password',
        'file',
        'ref',
    ],
    'formPath' => [
        'formData',
        'path',
        'query',
        'body',
        'header',
        'cookie',
    ],
];
