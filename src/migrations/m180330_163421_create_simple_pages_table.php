<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180330_163421_create_simple_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%simple_pages}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Page title'),
            'teaser' => $this->text()->comment('Page teaser'),
            'body' => $this->text()->notNull()->comment('Page body'),
            'alias' => $this->string()->comment('Page url alias'),
            'is_published' => $this->boolean()->notNull()->comment('Is page published'),
            'created_at' => $this->datetime()->notNull()->comment('Page creation time'),
            'updated_at' => $this->datetime()->notNull()->comment('Page update time'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%simple_pages}}');
    }
}
