<?php

class vendor_url_util {
  public function makeURL($options = null) {
    global $app;
    $controller = $app['controller'];
    $action = '';
    $params = '';
    $rootRel = RootREL == '/' ? '' : RootREL;

    if ($options == '/') { return 'index.php'; }
    if (isset($options['controller'])) { $controller = $options['controller']; }
    if (isset($options['action'])) { $action = '/' . $options['action']; }
    if (isset($options['params'])) {
      foreach ($options['params'] as $key => $value) {
        $params .= '&' . $key . '=' . $value;
      }
    }

    return $rootRel . '/?route=' .$controller . $action . $params;
  }
}