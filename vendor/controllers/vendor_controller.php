<?php if (!defined('APPLICATION')) die ('Bad requested!');

class vendor_controller {
	protected $controller = "login";
	protected $action = "index";

	public function __construct() {
		global $app;

		if(isset($app["controller"]) && $app["controller"]) $this->controller = $app["controller"];
		if(isset($app["action"]) && $app["action"]) $this->action = $app["action"];

		if(method_exists($this, $this->action)) {
			$this->{$this->action}();
		} else {
			include "views/staticpages/error.php";
		}
	}

	public function view($options = null) {
		if(empty($options['controller']))	$options['controller'] = $this->controller;
		if(empty($options['action']))	$options['action'] = $this->action;

		include_once "views/" . $options['controller'] . "/" . $options['action'] . ".php";
	}

	public function setProperty($name, $value) {
		$this->$name = $value;
	}
}