<?php

use yii\db\Migration;

/**
 * Class m190717_141103_addDefaultTimeZone
 */
class m190717_141103_addDefaultTimeZone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->insert('time_zone', [
//            'default_time_zone' => 'Europe/Moscow',
//            'time_zone' => 'GMT+3',
//        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//       $this->truncateTable('time_zone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190717_141103_addDefaultTimeZone cannot be reverted.\n";

        return false;
    }
    */
}
