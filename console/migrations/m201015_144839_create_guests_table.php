<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guest}}`.
 */
class m201015_144839_create_guests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guest}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(512)->notNull(),
            'last_name' => $this->string(512)->notNull(),
            'email' => $this->string(512)->notNull()->unique(),
            'phone_number' => $this->string(20),
            'gender' => $this->string(20)->notNull(),
            'street' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'country' => $this->text()->notNull(),
            'zip' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guest}}');
    }
}
