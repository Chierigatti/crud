<?php
	//session_start();
	if(!$_SESSION['usuario']) {
		header('Location: painel.php');
	exit();
}