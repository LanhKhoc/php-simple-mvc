<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class login_controller extends vendor_logged_controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
    session_destroy();
    $this->view();
  }

  public function check() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') exit();

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $model = new login_model();

    if($model->checkLogin($username, $password)) {
      // NOTE: 86400 = 1 day
      setcookie('user_token', md5($username . md5($password)), time() + (86400 * 30), '/');
      setcookie('user_info', $username, time() + (86400 * 30), '/');
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'phongban']));
    } else {
      $_SESSION['login_error'] = 'Username/Password incorrect';
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'login']));
    }
  }
}