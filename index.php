<?php 

require "vendor/autoload.php";

use ReporteCita\Content\config\settings\sysConfig as sysConfig;

	$globalConfig = new sysConfig();
	$globalConfig->existController();

use ReporteCita\Content\controlador\frontController as frontController;

	$frontController = new frontController($_REQUEST);

 ?>