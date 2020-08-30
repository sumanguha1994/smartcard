<?php
class Migration_Add_Customer extends CI_Migration
{
  //create
    public function up(){
        $this->dbforge->add_field(
           array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'customer_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'customer_phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'customer_cards' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'activate_date' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'deactivate_date' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                )
           )
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('customer');
    }
    //down
    public function down()
    {
        $this->dbforge->drop_table('customer');
    }
}