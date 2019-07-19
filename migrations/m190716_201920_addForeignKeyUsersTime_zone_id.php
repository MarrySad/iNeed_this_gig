<?php

use yii\db\Migration;

/**
 * Class m190716_201920_addForeignKeyUsersTime_zone_id
 */
class m190716_201920_addForeignKeyUsersTime_zone_id extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addForeignKey('FK_Users_time_zone', 'Users', 'time_zone_id', 'time_zone', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
//        $this->dropForeignKey('FK_Users_time_zone', 'Users');
        $this->dropIndex('FK_Users_time_zone', 'Users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190716_201920_addForeignKeyUsersTime_zone_id cannot be reverted.\n";

        return false;
    }
    */
}
