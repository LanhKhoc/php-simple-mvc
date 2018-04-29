<?php

class logout_controller extends vendor_controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    setcookie('user_token', '', 0, '/');
    setcookie('user_info', '', 0, '/');
    header('Location: ' . vendor_url_util::makeURL(['controller' => 'phongban']));
  }
}