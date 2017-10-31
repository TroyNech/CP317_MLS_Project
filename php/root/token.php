<?php
require_once('config.php');

session_start();
if(!isset($_SESSION['app_context'])) {
	$_SESSION['user_context'] = $_SESSION['app_context']->createUserContext($config['lms_host'], $config['lms_port'], $config['encrypt_requests']); // Get context
	session_write_close();
	header('Location: root/index.php');
	die();
} else {
	echo 'This address is for use internally, you shouldn\'t be here.';
}
?>
