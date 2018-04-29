<?php if (!defined('APPLICATION')) die ('Bad requested!');

class nhanvien_model extends vendor_model {
  protected $table = "NHANVIEN";

  public function  __construct() {
    parent::__construct();
  }
}