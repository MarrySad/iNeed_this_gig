<?php

use yii\db\Migration;

/**
 * Class m190712_200536_InsertUsersInTable
 */
class m190712_200536_InsertUsersInTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('Users',
            ['email', 'passwordHash', 'dateRegistry'],
            [
                ['spets.aqvador@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['russkazkin@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['kirilljazzsax@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['alexkliver81@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['senseytreyser@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['boroda4646@mail.ru', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['eugene-en@ya.ru', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['lyoulka@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['bichraptor@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['mvrsad@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['mcvetik@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
                ['miss.lappo@gmail.com', \Yii::$app->security->generatePasswordHash('password'), time()],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
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
