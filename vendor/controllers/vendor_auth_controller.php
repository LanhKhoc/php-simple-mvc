<?php if (!defined('APPLICATION')) die ('Bad requested!');

class vendor_auth_controller extends vendor_controller {
  public function __construct() {
    if($this->checkAuth()) {
      parent::__construct();
    } else {
      header('Location: /?route=login');
    }
  }

  public function checkAuth() {
    $loginModel = new login_model();

    $token = $_COOKIE['user_token'];
    $username = $_COOKIE['user_info'];
    if(!$username || !$token) return false;

    $result = $loginModel->get('username, password', [
      'conditions' => [
        'username' => $username
      ]
    ])->fetch_assoc();

    return $token == md5($result['username'] . $result['password']);

    // if($token == md5($result['username'] . $result['password'])) {
    //   return [
    //     'logged' => true,
    //     'info' => [
    //       'role' => '',
    //     ]
    //   ];
    // } else {
    //   return [ 'logged' => false ];
    // }
  }
}