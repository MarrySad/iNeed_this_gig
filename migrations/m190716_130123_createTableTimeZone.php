<?php

use yii\db\Migration;

/**
 * Class m190716_130123_createTableTimeZone
 */
class m190716_130123_createTableTimeZone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('time_zone', [
            'id' => $this->primaryKey(),
            'default_time_zone' => $this->string(60)->notNull(),
            'time_zone' => $this->string(60),
        ]);

        $this->insert('time_zone', [
            'default_time_zone' => 'Europe/Moscow',
            'time_zone' => 'GMT+3',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('time_zone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190716_130123_createTableTimeZone cannot be reverted.\n";

        return false;
    }
    */
}
