<?php
	interface CRUD{
		function create();
		function index($field = '*');
		function selectDataById();
		function remove();
		function edit();
		function selectDataByIdForUser();
	}
?>