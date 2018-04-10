<?php

class phongban_controller extends vendor_controller {
  public function  __construct() {
    parent::__construct();
  }

  public function index() {
    $model = new phongban_model();
    $result = $model->get();

    $this->data = [];
    
    while($row = $result->fetch_assoc()) {
      array_push($this->data, $row);
    }

    $this->view();
  }
}