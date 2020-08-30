<?php
class Migration_Add_Card extends CI_Migration
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
                'cardno' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'status' => array(
                    'type' => 'ENUM("deactive","active", "issued")',
                    'default' => 'deactive',
                    'null' => FALSE,
                )
           )
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('card');
    }
    //down
    public function down()
    {
        $this->dbforge->drop_table('card');
    }
}