<?php
class staticpages_controller extends vendor_controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    echo "404";
  }
}