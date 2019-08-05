<?php
require_once "common.class.php";
require_once "CRUD.php";

class Comment extends Common implements CRUD
{
 	protected $id, $news_id, $name, $status, $created_at, $email, $comments;

 	function create()
 	{
 	echo $sql = "insert into tbl_comments (name,email,news_id,comments,status,created_at) values ('$this->name','$this->email','$this->news_id','$this->comments','$this->status','$this->created_at')"; 
 		return $this-> insert($sql);
 	}

 	function index($field='*')
 	{
 	 	$sql = "select $field from tbl_comments order by created_at desc";
 	 	return $this->select($sql);
 	}
 	function selectCommentByNewsId()
 	{
 		$sql = "select * from tbl_comments where news_id='$this->news_id' order by created_at desc";
 	 	return $this->select($sql);
 	}
 	function selectDataById()
 	{
 		$sql = "select c.*,u.name as uname from tbl_categories as c join tbl_users as u on c.created_by=u.id where c.id='$this->id'";
 	 	return $this->select($sql);
 	}
 	
 	function remove()
 	{
 	 	echo $sql = "delete from tbl_categories where id='$this->id'";
 	 	return $this->delete($sql);
 	}
 	function edit(){
 		$sql="update tbl_categories set  name='$this->name' , rank='$this->rank' , status='$this->status' , updated_at='$this->updated_at' , updated_by='$this->updated_by'where id='$this->id'";
 		return $this->update($sql);
 	}
 	function selectDataByIdForUser()
 	{
 		$sql = "select n.*,u.name as uname from tbl_news as n join tbl_users as u on n.created_by=u.id where n.id='$this->id'";
 	 	return $this->select($sql);
 	}
 	function getMenu(){
 		$sql = "select id,name from tbl_categories where status=1 order by rank asc";
 	 	return $this->select($sql);
 	}
}
?>