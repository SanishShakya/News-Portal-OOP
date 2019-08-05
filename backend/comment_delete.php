<?php
	require_once "object.php";;
	$comment1->set('id',$_GET['id']);
	$comment1->remove();
	header('location:comment_list.php');
?>