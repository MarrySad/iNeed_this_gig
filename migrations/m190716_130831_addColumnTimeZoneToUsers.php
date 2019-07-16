<?php

use yii\db\Migration;

/**
 * Class m190716_130831_addColumnTimeZoneToUsers
 */
class m190716_130831_addColumnTimeZoneToUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Users', 'time_zone_id', $this->integer(11)->notNull()->defaultValue(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('Users', 'time_zone_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190716_130831_addColumnTimeZoneToUsers cannot be reverted.\n";

        return false;
    }
    */
}
