<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_guest}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%event}}`
 * - `{{%guest}}`
 */
class m201015_153359_create_event_guest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_guest}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(11)->notNull(),
            'guest_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `event_id`
        $this->createIndex(
            '{{%idx-event_guest-event_id}}',
            '{{%event_guest}}',
            'event_id'
        );

        // add foreign key for table `{{%event}}`
        $this->addForeignKey(
            '{{%fk-event_guest-event_id}}',
            '{{%event_guest}}',
            'event_id',
            '{{%event}}',
            'id',
            'CASCADE'
        );

        // creates index for column `guest_id`
        $this->createIndex(
            '{{%idx-event_guest-guest_id}}',
            '{{%event_guest}}',
            'guest_id'
        );

        // add foreign key for table `{{%guest}}`
        $this->addForeignKey(
            '{{%fk-event_guest-guest_id}}',
            '{{%event_guest}}',
            'guest_id',
            '{{%guest}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%event}}`
        $this->dropForeignKey(
            '{{%fk-event_guest-event_id}}',
            '{{%event_guest}}'
        );

        // drops index for column `event_id`
        $this->dropIndex(
            '{{%idx-event_guest-event_id}}',
            '{{%event_guest}}'
        );

        // drops foreign key for table `{{%guest}}`
        $this->dropForeignKey(
            '{{%fk-event_guest-guest_id}}',
            '{{%event_guest}}'
        );

        // drops index for column `guest_id`
        $this->dropIndex(
            '{{%idx-event_guest-guest_id}}',
            '{{%event_guest}}'
        );

        $this->dropTable('{{%event_guest}}');
    }
}
