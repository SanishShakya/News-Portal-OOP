<?php
	require_once "object.php";;
	$user->set('id',$_GET['id']);
	$user->remove();
	header('location:admin_list.php');
?>