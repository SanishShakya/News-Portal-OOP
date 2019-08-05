<?php
	require_once "object.php";;
	$category->set('id',$_GET['id']);
	$category->remove();
	header('location:category_list.php');
?>