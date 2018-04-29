<?php if (!defined('APPLICATION')) die ('Bad requested!');

class vendor_model {
	protected $table;
	protected $conn;

	public function __construct() {
    global $DB_CONFIG;

		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(mysqli_connect_error()) {
			echo 'Failed to connect to MySQL' . mysqli_connect_error();
			exit();
		}
		$this->conn->set_charset('utf8');
	}

	public function get($fields = "*", $options = null) {
		$conditions = '';
		if(isset($options['conditions'])) {
			$conditions = 'WHERE ' . mysqli_real_escape_string( $this->conn, array_keys($options['conditions'])[0]) . "='" . $this->conn->real_escape_string(array_shift($options['conditions'])) . "'";
			foreach($options['conditions'] as $key => $value) {
				if(strpos($key, '|') === 0) {
					$conditions .= ' OR ' . $this->conn->real_escape_string(substr($key, 1)) . "='" . $this->conn->real_escape_string($value) . "'";
				} else if(strpos($key, '&') === 0) {
					$conditions .= ' AND ' . $this->conn->real_escape_string(substr($key, 1)) . "='" . $this->conn->real_escape_string($value) . "'";
				} else {
					$conditions .= ' AND ' . $this->conn->real_escape_string($key) . "='" . $this->conn->real_escape_string($value) . "'";
				}
			}
		}

		$sql = "SELECT $fields FROM `$this->table` $conditions";
		return $this->conn->query($sql);
	}

	public function excute($sql) {
		return $this->conn->query($sql);
	}

	public function search($fields = '*', $options) {
		$conditions = 'WHERE ' . $this->conn->real_escape_string(array_keys($options)[0]) . " LIKE '" . $this->conn->real_escape_string(array_shift($options)) . "'";

    foreach($options as $key => $value) {
      if(strpos($key, '|') === 0) {
        $conditions .= ' OR ' . $this->conn->real_escape_string(substr($key, 1)) . " LIKE '" . $this->conn->real_escape_string($value) . "'";
      } else if(strpos($key, '&') === 0) {
        $conditions .= ' AND ' . $this->conn->real_escape_string(substr($key, 1)) . " LIKE '" . $this->conn->real_escape_string($value) . "'";
      } else {
        $conditions .= ' AND ' . $this->conn->real_escape_string($key) . " LIKE '" . $this->conn->real_escape_string($value) . "'";
      }
    }

		$sql = "SELECT $fields FROM `$this->table` $conditions";
		return $this->conn->query($sql);
	}

	public function update() {}
	public function insert() {}
	public function destroy($id) {
		$sql = "DELETE FROM {$this->table} WHERE id = '" . $this->conn->real_escape_string($id) . "'";
		return $this->conn->query($sql);
	}
}