<?php
class Migration_Add_ShopKeeper extends CI_Migration
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
                'shname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'shphone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'shpincode' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'shlocation' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'category' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'shaddress' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'skphone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'skuserid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'skpass' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                )
           )
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('shopkeeper');
    }
    //down
    public function down()
    {
        $this->dbforge->drop_table('shopkeeper');
    }
}