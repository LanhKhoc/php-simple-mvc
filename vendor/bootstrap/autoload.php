<?php

function __autoload($className) {
	$arrCL 		= explode("_", $className);
	$firstCL 	= $arrCL[0];
	$lastCL		= $arrCL[count($arrCL) - 1];
  $filename = "";

	if($firstCL == "vendor") $filename = "vendor/";
  $filename .= $lastCL . "s/" . $className . ".php";

	if (is_file($filename)) {
    include_once($filename);
	} else {
    include_once("controllers/staticpages_controller.php");
  }
}