<?php

use yii\db\Migration;

/**
 * Class m180130_031308_add_access_token_to_user
 */
class m180130_031308_add_access_token_to_user extends Migration
{
    /**
     * @var string 定义表名
     */
    private $table = '{{%user}}';
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn($this->table, 'access_token', $this->string(255)->comment('token') );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180130_031308_add_access_token_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180130_031308_add_access_token_to_user cannot be reverted.\n";

        return false;
    }
    */
}
