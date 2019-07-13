<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%entry}}`.
 */
class m190709_105428_create_entry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       /* $this->createTable('{{%entry}}', [
            'id' => $this->primaryKey(),
        ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropTable('{{%entry}}');
    }
    
     public function up()
    {
        $this->createTable('entry', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'content'=>$this->text(),
            'viewed'=>$this->integer(),
            'category_id'=>$this->integer(),
        ]); 
    }

    public function down()
    {
        $this->dropTable('entry');
    }
}
