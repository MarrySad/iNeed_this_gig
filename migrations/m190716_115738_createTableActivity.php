<?php

use yii\db\Migration;

/**
 * Class m190716_115738_createTableActivity
 */
class m190716_115738_createTableActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->comment('Название события')->notNull(),
            'description' => $this->string(300)->comment('Описание события'),
            'active' => 'ENUM("active", "done")',
            'date_time_activity' => $this->dateTime()->notNull(),
            'date_created' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'payment' => 'ENUM("cash", "card")',
            'employer_id' => $this->integer(),
            'user_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190716_115738_createTableActivity cannot be reverted.\n";

        return false;
    }
    */
}
