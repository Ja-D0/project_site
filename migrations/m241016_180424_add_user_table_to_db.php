<?php

use yii\db\Migration;

/**
 * Class m241016_180424_add_user_table_to_db
 */
class m241016_180424_add_user_table_to_db extends Migration
{

    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
            'password' => $this->string(),
            'authKey' => $this->string(32),
            'access_token' => $this->string(32),
            'role' => $this->string()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
