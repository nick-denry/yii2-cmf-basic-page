<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180217_103040_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Page title'),
            'body' => $this->text()->notNull()->comment('Page body'),
            'alias' => $this->string()->comment('Page url alias'),
            'is_published' => $this->boolean()->notNull()->defaultValue(true)->comment('Is page published'),
            'created_at' => $this->timestamp()->notNull()->comment('Page creation time'),
            'updated_at' => $this->timestamp()->notNull()->comment('Page update time'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%pages}}');
    }
}
