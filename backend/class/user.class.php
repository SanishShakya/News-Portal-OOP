<?php
require_once "common.class.php";

 class User extends Common
 {
 	protected $id, $name, $email, $phone, $address, $password, $status, $last_login, $image, $role;

 	function login()
 	{
	 	$sql = "select * from tbl_users where email='$this->email' and password='$this->password' and status=1";
	 	return $this->select($sql);
 	}
 	function getUserByEmail(){
 		 $sql = "select * from tbl_users where email='$this->email'";
	 	return $this->select($sql);
 	}
 	function create()
 	{
 		$sql = "insert into tbl_users (name,username,email,phone,address,password,status,image,role) values ('$this->name','$this->username','$this->email','$this->phone','$this->address','$this->password','$this->status','$this->image','$this->role')"; 
 		return $this-> insert($sql);
 	}
 	function index()
 	{
 	 	$sql = "select * from tbl_users order by username desc";
 	 	return $this->select($sql);
 	}
 	function remove()
 	{
 	 	$sql = "delete from tbl_users where id='$this->id'";
 	 	return $this->delete($sql);
 	}
 	function selectDataById()
 	{
 		$sql = "select * from tbl_users where id='$this->id'";
 	 	return $this->select($sql);
 	}
 	function edit(){
 		 $sql="update tbl_users set  name='$this->name' , username='$this->username', email='$this->email', phone='$this->phone', address='$this->address', password='$this->password', status='$this->status', image='$this->image' , role='$this->role' where id='$this->id'";
 		return $this->update($sql);
 	}
 }
?>