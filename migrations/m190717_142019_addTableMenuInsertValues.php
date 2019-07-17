<?php

use yii\db\Migration;

/**
 * Class m190717_142019_addTableMenuInsertValues
 */
class m190717_142019_addTableMenuInsertValues extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'label' => $this->string(50),
            'url' => $this->string(50),
            'icon' => $this->string(50),
            'position' => $this->integer(11),
            'active' => 'ENUM("Y", "N")',
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->batchInsert('menu', ['label', 'url', 'icon', 'position', 'active'],[
            ['Главная', '/', 'fa fa-icon', 1, 'Y'],
            ['Встречи', 'meeting/index', '', 2, 'Y'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190717_142019_addTableMenuInsertValues cannot be reverted.\n";

        return false;
    }
    */
}
