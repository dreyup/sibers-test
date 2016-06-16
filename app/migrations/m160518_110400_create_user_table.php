<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 */
class m160518_110400_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id'=>\yii\db\Schema::TYPE_PK,
            'username'=>\yii\db\Schema::TYPE_STRING,
            'password'=>\yii\db\Schema::TYPE_STRING,
            'name'=>\yii\db\Schema::TYPE_STRING,
            'lname'=>\yii\db\Schema::TYPE_STRING,
            'role'=>\yii\db\Schema::TYPE_STRING,
            'male_female'=>\yii\db\Schema::TYPE_STRING,
            'auth_key'=>\yii\db\Schema::TYPE_STRING,
            'created'=>\yii\db\Schema::TYPE_TIMESTAMP.' DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
