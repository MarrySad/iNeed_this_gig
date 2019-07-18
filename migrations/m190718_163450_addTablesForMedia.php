<?php

use yii\db\Migration;

/**
 * Class m190718_163450_addTablesForMedia
 */
class m190718_163450_addTablesForMedia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('avatar', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'client_name' => $this->string(300)->notNull(),
            'active' => 'ENUM("Y", "N")',
            'date_added' => $this->dateTime()->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createTable('video', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'client_name' => $this->string(300)->notNull(),
            'date_added' => $this->dateTime()->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'client_name' => $this->string(300)->notNull(),
            'date_added' => $this->dateTime()->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createTable('audio', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'client_name' => $this->string(300)->notNull(),
            'date_added' => $this->dateTime()->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('avatar');
        $this->dropTable('video');
        $this->dropTable('photo');
        $this->dropTable('audio');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190718_163450_addTablesForMedia cannot be reverted.\n";

        return false;
    }
    */
}
