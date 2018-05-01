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

  public function create() {
    $this->loginMiddleware();

    $data = [];
    $data['nhanvien'] = true;

    $data['error']['idnv'] = isset($_SESSION['error']['idnv']) ? $_SESSION['error']['idnv'] : '';
    $data['error']['hoten'] = isset($_SESSION['error']['hoten']) ? $_SESSION['error']['hoten'] : '';
    $data['error']['diachi'] = isset($_SESSION['error']['diachi']) ? $_SESSION['error']['diachi'] : '';

    // $data['remember']['idpb'] = isset($_SESSION['remember']['idpb']) ? $_SESSION['remember']['idpb'] : '';
    // $data['remember']['mota'] = isset($_SESSION['remember']['mota']) ? $_SESSION['remember']['mota'] : '';
    // $data['remember']['thoigian'] = isset($_SESSION['remember']['thoigian']) ? $_SESSION['remember']['thoigian'] : '';

    session_destroy();

    $this->setProperty('data', $data);
    $this->view();
  }
}