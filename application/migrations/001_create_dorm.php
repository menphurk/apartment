<?php
class Migration_create_dorm extends CI_Migration {
    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            )
        , "`name` VARCHAR(255) NOT NULL"
        , "`address` VARCHAR(255) NOT NULL"
        , "`phone` VARCHAR(45) NOT NULL"
        , "`images` TEXT NOT NULL"
        , "`timestamp_create` TIMESTAMP NULL"
        , "`timestamp_update` TIMESTAMP NULL"
            ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('dorm', TRUE);
    }
    
    public function down() {
        $this->dbforge->drop_table('dorm', TRUE);
    }

}