<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m230918_162636_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
        ]);

        $this->createTable('{{%languages}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
        ]);

        $this->createTable('{{%genres}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
        ]);

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'author_id'=>$this->integer(),
            'book_page'=>$this->integer(),
            'language'=>$this->integer(),
            'genre'=>$this->integer()
        ]);

        $this->addForeignKey(
            'fk-books-author_id',
            '{{%books}}',
            'author_id',
            '{{%authors}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-books-language',
            '{{%books}}',
            'language',
            '{{%languages}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-books-genre',
            '{{%books}}',
            'genre',
            '{{%genres}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-books-author_id',
            '{{%books}}',
        );
        $this->dropForeignKey(
            'fk-books-language',
            '{{%books}}',

        );
        $this->dropForeignKey(
            'fk-books-genre',
            '{{%books}}',
        );

        $this->dropTable('{{%books}}');
        $this->dropTable('{{%authors}}');
        $this->dropTable('{{%languages}}');
        $this->dropTable('{{%genres}}');
    }
}
