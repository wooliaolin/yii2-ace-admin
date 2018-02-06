<?php

namespace backend\models;

use Yii;
use common\models\AdminModel;

/**
 * This is the model class for table "{{%definitions}}".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $properties
 * @property string $xml
 * @property string $version
 * @property int $created_at 创建时间
 * @property int $created_id 创建用户
 * @property int $updated_at 修改时间
 * @property int $updated_id 修改用户
 */
class Definitions extends AdminModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%definitions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'version'], 'required'],
            [['properties'], 'string'],
            [['created_at', 'created_id', 'updated_at', 'updated_id'], 'integer'],
            [['type', 'name', 'xml', 'version'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'properties' => 'Properties',
            'xml' => 'Xml',
            'version' => 'Version',
            'created_at' => 'Created At',
            'created_id' => 'Created ID',
            'updated_at' => 'Updated At',
            'updated_id' => 'Updated ID',
        ];
    }
}
