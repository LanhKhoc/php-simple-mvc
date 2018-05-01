<?php session_start(); if (!defined('APPLICATION')) die ('Bad requested!');

class phongban_controller extends vendor_controller {
  public function  __construct() {
    parent::__construct();
  }

  private function loginMiddleware() {
    if(vendor_auth_controller::checkAuth() === false) {
      header('Location: ' . vendor_url_util::makeURL(['controller' => 'login']));
      die();
    }
  }

  public function index() {
    $model = new phongban_model();
    $result = $model->get();
    $data = [];

    // NOTE: Check user logged?
    $data['user_logged'] = vendor_auth_controller::checkAuth();

    $data['phongban'] = true;
    while ($row = $result->fetch_assoc()) { $data['data'][] = $row; }

    $this->setProperty('data', $data);
    $this->view();
  }

  public function search() {
    $search = $_GET['search'];
    $typeSearch = $_GET['type'];

    $data = [];
    $model = new phongban_model();
    $result = $model->search('*', [
      $typeSearch => '%' . $search . '%'
    ]);

    while($row = $result->fetch_assoc()) { $data['data'][] = $row; }

    // NOTE: Check user logged?
    $data['user_logged'] = vendor_auth_controller::checkAuth();

    echo json_encode($data);
  }

  public function create() {
    $this->loginMiddleware();

    $data = [];
    $data['phongban'] = true;

    $data['error']['idpb'] = isset($_SESSION['error']['idpb']) ? $_SESSION['error']['idpb'] : '';
    $data['error']['mota'] = isset($_SESSION['error']['mota']) ? $_SESSION['error']['mota'] : '';
    $data['error']['thoigian'] = isset($_SESSION['error']['thoigian']) ? $_SESSION['error']['thoigian'] : '';

    $data['remember']['idpb'] = isset($_SESSION['remember']['idpb']) ? $_SESSION['remember']['idpb'] : '';
    $data['remember']['mota'] = isset($_SESSION['remember']['mota']) ? $_SESSION['remember']['mota'] : '';
    $data['remember']['thoigian'] = isset($_SESSION['remember']['thoigian']) ? $_SESSION['remember']['thoigian'] : '';

    session_destroy();

    $this->setProperty('data', $data);
    $this->view();
  }

  public function store() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') { die('302'); }
    $this->loginMiddleware();

    $idpb = isset($_POST['idpb']) ? $_POST['idpb'] : '';
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $thoigian = isset($_POST['thoigian']) ? $_POST['thoigian'] : '';

    $model = new phongban_model();
    if ($model->store($idpb, $mota, $thoigian)) {
      header('Location: ' . vendor_url_util::makeURL(['action' => 'index']));
    } else {
      header('Location: ' . vendor_url_util::makeURL(['action' => 'create']));
      die();
    }
  }

  public function edit() {
    $this->loginMiddleware();

    $idpb = isset($_GET['idpb'])? $_GET['idpb'] : null;
    if(!$idpb) { header('Location: ' . vendor_url_util::makeURL(['action' => 'index'])); die(); }

    $data = [];
    $data['phongban'] = true;

    $model = new phongban_model();
    $result = $model->get('*', [
      'conditions' => [
        'idpb' => $idpb
      ]
    ])->fetch_assoc();

    $data['error']['idpb'] = isset($_SESSION['error']['idpb']) ? $_SESSION['error']['idpb'] : '';
    $data['error']['mota'] = isset($_SESSION['error']['mota']) ? $_SESSION['error']['mota'] : '';
    $data['error']['thoigian'] = isset($_SESSION['error']['thoigian']) ? $_SESSION['error']['thoigian'] : '';

    $data['remember']['idpb'] = $result['idpb'];
    $data['remember']['mota'] = $result['mota'];
    $data['remember']['thoigian'] = $result['thoigian'];

    session_destroy();

    $this->setProperty('data', $data);
    $this->view();
  }

  public function update() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') { die('302'); }
    $this->loginMiddleware();

    $idpb = isset($_POST['idpb']) ? $_POST['idpb'] : '';
    $old_idpb = isset($_POST['old_idpb']) ? $_POST['old_idpb'] : '';
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $thoigian = isset($_POST['thoigian']) ? $_POST['thoigian'] : '';

    $model = new phongban_model();
    $result = $model->update($old_idpb, [
      'idpb' => $idpb,
      'mota' => $mota,
      'thoigian' => $thoigian
    ]);

    if($result) {
      header('Location: ' . vendor_url_util::makeURL(['action' => 'index']));
    } else {
      header('Location: ' . vendor_url_util::makeURL(['action' => 'edit', 'params' => ['idpb' => $idpb]]));
    }
  }

  public function destroy() {
    $idpb = isset($_GET['idpb']) ? $_GET['idpb'] : null;
    if(!$idpb) die();

    (new phongban_model())->destroy(['idpb' => $idpb]);
    header('Location: ' . vendor_url_util::makeURL(['action' => 'index']));
  }
}