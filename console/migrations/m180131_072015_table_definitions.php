<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180131_072015_table_definitions
 */
class m180131_072015_table_definitions extends Migration
{
    /**
     * @var string 定义表名
     */
    private $table = '{{%definitions}}';
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'properties' => Schema::TYPE_TEXT ,
            'xml' => Schema::TYPE_STRING,
            'version' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('创建时间'),
            'created_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('创建用户'),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
            'updated_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改用户'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180131_072015_table_definitions cannot be reverted.\n";
        $this->dropTable($this->table);
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_072015_table_definitions cannot be reverted.\n";

        return false;
    }
    */
}
