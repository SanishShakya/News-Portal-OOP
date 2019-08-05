<?php
	require_once "object.php";;
	$advertisement->set('id',$_GET['id']);
	$advertisement->remove();
	header('location:advertisement_list.php');
?>