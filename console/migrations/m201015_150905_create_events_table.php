<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m201015_150905_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'street' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'country' => $this->text()->notNull(),
            'zip' => $this->integer(11)->notNull(),
            'date' => $this->date()->notNull(),
            'time' => $this->time()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
