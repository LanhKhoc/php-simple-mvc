<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class phongban_model extends vendor_model {
  protected $table = "PHONGBAN";

  public function  __construct() {
    parent::__construct();
  }

  public function validateStore($idpb, $mota, $thoigian) {
    if(!$idpb) { $_SESSION['error']['idpb'] = "Mã phòng ban không được để trống!"; return true; }
    if(!$mota) { $_SESSION['error']['mota'] = "Tên phòng ban không được để trống!"; return true; }
    if(!$thoigian) { $_SESSION['error']['thoigian'] = "Thời gian thành lập không được để trống!"; return true; }

    $result = $this->get('idpb', [
      'conditions' => [
        'idpb' => $idpb
      ]
    ])->num_rows;

    if($result > 0) { $_SESSION['error']['idpb'] = 'Mã phòng ban đã tồn tại!'; return true; }

    return false;
  }

  public function validateUpdate($idpb, $options) {
    $fKey = array_keys($options)[0];
    $fValue = array_shift($options);

    foreach($options as $key => $value) {
      if(!$value) { $_SESSION['error'][$key] = "Không được để trống trường này!"; return true; }
    }

    if($idpb != $fValue) {
      $result = $this->get('idpb', [
        'conditions' => ['idpb' => $fValue]
      ])->num_rows;

      if($result > 0) { $_SESSION['error']['idpb'] = "Đã tồn tại!"; return true; }
    }

    return false;
  }

  public function store($idpb, $mota, $thoigian) {
    if ($this->validateStore($idpb, $mota, $thoigian)) return false;

    return parent::store([
      'idpb' => $idpb,
      'mota' => $mota,
      'thoigian' => $thoigian
    ]);
  }

  public function update($idpb, $options) {
    if ($this->validateUpdate($idpb, $options)) return false;

    return parent::update(['idpb' => $idpb], $options);
  }
}