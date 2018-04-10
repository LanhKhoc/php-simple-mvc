<?php

class vendor_model {
	protected $table;
	protected $conn;

	public function __construct() {
		global $DB_CONFIG;
		$this->conn = new mysqli($DB_CONFIG["host"], $DB_CONFIG["username"], $DB_CONFIG["password"], $DB_CONFIG["database"]);
		if(mysqli_connect_error()) {
			echo 'Failed to connect to MySQL' . mysqli_connect_error();
			exit();
		}
	}

	public function get($fields = "*", $options) {
		$conditions = isset($options["conditions"]) ? 'where ' . $options['conditions'] : '';
		$sql = "SELECT $fields FROM `$this->table` $conditions";
		return $this->conn->query($sql);
	}

	public function update() {}
	public function insert() {}
	public function delete() {}
}

?>