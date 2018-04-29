<?php

$app = [];
$app["controller"] = DEFAULT_CONTROLLER;

$route = isset($_GET["route"]) ? $_GET["route"] : null;
$prs = explode("/", $route);

if(isset($prs[0]) && $prs[0]) $app["controller"] = $prs[0];
if(isset($prs[1]) && $prs[1]) $app["action"] = $prs[1];


$controller = $app["controller"] . '_controller';

if(!is_file(ControllerREL . $controller . ".php")) {
	$controller = "staticpages_controller";
}

new $controller();