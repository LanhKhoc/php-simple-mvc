<?php if (!defined('APPLICATION')) die ('Bad requested!');

class nhanvien_controller extends vendor_controller {
  public function  __construct() {
    parent::__construct();
  }

  public function index() {
    $idpb = isset($_GET['idpb']) ? $_GET['idpb'] : null;
    $data = [];
    $model = new nhanvien_model();

    // NOTE: Check user logged?
    $data['user_logged'] = vendor_auth_controller::checkAuth();

    if($idpb == null) {
      $result = $model->get();
    } else {
      $result = $model->get('*', [
        'conditions' => ['idpb' => $idpb]
      ]);
    }

    $data['nhanvien'] = true;
    while($row = $result->fetch_assoc()) { $data['data'][] = $row; }

    $this->setProperty('data', $data);
    $this->view();
  }
}