<?php

use yii\db\Migration;

/**
 * Class m190401_045344_insert_product_listing
 */
class m190401_045344_insert_product_listing extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->insert('product_listing', array(
            'title' => 'Special Offers',
        ));
        $this->insert('product_listing', array(
            'title' => 'New Arrivals',
        ));
        $this->insert('product_listing', array(
            'title' => 'Niche Perfumes',
        ));
        $this->insert('product_listing', array(
            'title' => 'Gift Set',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m190401_045344_insert_product_listing cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190401_045344_insert_product_listing cannot be reverted.\n";

      return false;
      }
     */
}
