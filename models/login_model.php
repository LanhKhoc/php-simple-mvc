<?php if (!defined('APPLICATION')) die ('Bad requested!');

class login_model extends vendor_model {
  protected $table = "ADMIN";

  public function __construct() {
    parent::__construct();
  }

  public function checkLogin($username, $password) {
    $result = $this->get("*", [
      "conditions" => [
        "username" => $username,
        "password" => md5($password)
      ]
    ])->num_rows;

    return $result > 0;
  }
}