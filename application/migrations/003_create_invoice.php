<?php
class Migration_create_invoice extends CI_Migration{
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			)
		, "`room_id` VARCHAR(255) NOT NULL"
		, "`timestamp_create` TIMESTAMP NULL"
		, "`timestamp_update` TIMESTAMP NULL"
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('invoice', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('invoice', TRUE);
	}
}
