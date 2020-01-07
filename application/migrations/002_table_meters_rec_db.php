<?php
class Migration_table_meters_rec_db extends CI_Migration {

	public  function up(){

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			)
			, "`date_rec` DATETIME(6) NOT NULL"
		 , "`room_id` INT NOT NULL"
		,  "`w_meter_bef` INT NOT NULL"
		 , "`w_meter_now` INT NOT NULL"
		 , "`e_meter_bef` INT NOT NULL"
		,  "`e_meter_now` INT NOT NULL"
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('meters_rec', TRUE);
	}

	public  function down(){
		$this->dbforge->drop_table('meters_rec', TRUE);
	}
}
