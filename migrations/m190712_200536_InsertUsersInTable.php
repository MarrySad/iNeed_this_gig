<?php

use yii\db\Migration;

/**
 * Class m190712_200536_InsertUsersInTable
 */
class m190712_200536_InsertUsersInTable extends Migration {
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp() {

        $password = \Yii::$app->security->generatePasswordHash('password');

        $this->batchInsert('Users', ['email', 'passwordHash', 'dateRegistry'], [
            ['as@alltel24.ru', $password, time()],
            ['russkazkin@gmail.com', $password, time()],
            ['kirilljazzsax@gmail.com', $password, time()],
            ['alexkliver81@gmail.com', $password, time()],
            ['senseytreyser@gmail.com', $password, time()],
            ['boroda4646@mail.ru', $password, time()],
            ['eugene-en@ya.ru', $password, time()],
            ['lyoulka@gmail.com', $password, time()],
            ['bichraptor@gmail.com', $password, time()],
            ['mvrsad@gmail.com', $password, time()],
            ['mcvetik@gmail.com', $password, time()],
            ['miss.lappo@gmail.com', $password, time()],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->truncateTable('Users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190712_200536_InsertUsersInTable cannot be reverted.\n";

        return false;
    }
    */
}
