<?php if (!defined('APPLICATION')) die ('Bad requested!');

class vendor_logged_controller extends vendor_controller {
  public function __construct() {
    if($this->isLogged()) {
      header("Location: /?route=phongban");
      die();
    } else {
      parent::__construct();
    }
  }

  private function isLogged() {
    $loginModel = new login_model();

    $token = $_COOKIE["user_token"];
    $username = $_COOKIE["user_info"];
    if(!$username || !$token) return false;

    $result = $loginModel->get("username, password", [
      "conditions" => [
        "username" => $username
      ]
    ])->fetch_assoc();

    return $token == md5($result["username"] . $result["password"]);
  }
}