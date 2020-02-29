<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authors`.
 */
class m180712_122218_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(255)->notNull(),
            'lastName' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('authors');
    }
}
