<?php

use yii\db\Migration;

/**
 * Class m190711_194452_CreateTableUsers
 */
class m190711_194452_CreateTableUsers extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->createTable('Users', [
            'id' => $this->primaryKey(),
            'family' => $this->string(60)
                             ->notNull()
                             ->comment('Фамилия'),

            'name' => $this->string(60)
                           ->notNull()
                           ->comment('Имя'),

            'patronymic' => $this->string(60)
                                 ->notNull()
                                 ->comment('Отчество'),

            'typeRegistry' => 'ENUM("musician", "employer")',

            'email' => $this->string(100)
                            ->notNull()
                            ->comment('Email  клиента оставившего заказ'),

            'phone' => $this->string(22)
                            ->notNull()
                            ->comment('Телефон клиента оставившего заказ'),

            'passwordHash' => $this->string(300)
                                   ->comment('Хеш пароля'),

            'authToken' => $this->string(300)
                                ->comment('На будущее создадим'),

            'authKey' => $this->string(100)
                              ->comment('тоже на будущее'),
            'dateRegistry' => $this->integer(11)
                                   ->comment('Дата регистрации юзера на сайте'),
            'dateVisit' => $this->integer(11)
                                ->comment('Дата последнего входа на сайт'),
            'birthday' => $this->dateTime()
                               ->comment('Дата рождения клиента')
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('Users');
        $this->truncateTable('migration');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190711_194452_CreateTableUsers cannot be reverted.\n";

        return false;
    }
    */
}
