<?php

use yii\db\Migration;

/**
 * Handles the creation of table `relations`.
 */
class m180712_122256_create_relations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('relations', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(11)->notNull(),
            'author_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            "FK_RELATION_AUTHOR_ID",
            "relations",
            "author_id",
            "authors",
            "id",
            "SET NULL", "CASCADE");

        $this->addForeignKey(
            "FK_RELATION_BOOK_ID",
            "relations",
            "book_id",
            "books",
            "id",
            "SET NULL", "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('relations');
    }
}
