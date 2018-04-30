<?php

	require_once 'controller.php';

	if(!$_GET) {
		$controller = new UserController('main');

	} else {
		$controller = new UserController($_GET['action']);
	}


	$controller->run();
	
	exit;

?>