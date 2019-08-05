<?php
	require_once "object.php";;
	$news->set('id',$_GET['id']);
	$news->remove();
	header('location:news_list.php');
?>