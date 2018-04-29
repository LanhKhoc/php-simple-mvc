<?php if (!defined('APPLICATION')) die ('Bad requested!');

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

  public function edit() {
    $this->loginMiddleware();
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
    $this->view();
  }

  public function destroy() {
    $id = isset($_GET['idpb']) ? $_GET['idpb'] : null;
    if(!$id) die();

    (new phongban_model())->destroy($id);
  }
}