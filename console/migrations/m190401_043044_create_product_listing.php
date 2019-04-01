<?php

use yii\db\Migration;

/**
 * Class m190401_043044_create_product_listing
 */
class m190401_043044_create_product_listing extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            $this->createTable('{{%product_listing}}', [
                'id' => $this->primaryKey(),
                'title' => $this->string(100)->Null(),
                'product_id' => $this->string(255)->Null(),
                'status' => $this->smallInteger()->notNull()->defaultValue(1),
                'CB' => $this->integer()->Null(),
                'UB' => $this->integer()->Null(),
                'DOC' => $this->date(),
                'DOU' => $this->timestamp(),
                    ], $tableOptions);
            $this->alterColumn('{{%product_listing}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m190401_043044_create_product_listing cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190401_043044_create_product_listing cannot be reverted.\n";

      return false;
      }
     */
}
