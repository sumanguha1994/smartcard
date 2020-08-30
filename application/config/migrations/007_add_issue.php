<?php
class Migration_Add_Issue extends CI_Migration
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
                'cardno' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '225',
                    'null' => true,
                ),
                'created_date datetime default current_timestamp',
                'updated_date datetime default current_timestamp on update current_timestamp',
           )
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('issue');
    }
    //down
    public function down()
    {
        $this->dbforge->drop_table('issue');
    }
}