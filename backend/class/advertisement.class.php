<?php
require_once "common.class.php";
require_once "CRUD.php";

class Advertisement extends Common implements CRUD
{
 	protected $id, $title, $rank, $expire_date, $status, $image, $created_at, $updated_at, $created_by, $updated_by;

 	function create()
 	{
 		$sql = "insert into tbl_advertisements (title,rank,status,image,expire_date,created_at,created_by) values ('$this->title','$this->rank','$this->status','$this->image','$this->expire_date','$this->created_at','$this->created_by')"; 
 		return $this-> insert($sql);
 	}

 	function index($field='*')
 	{
 	 	$sql = "select $field from tbl_advertisements order by rank asc";
 	 	return $this->select($sql);
 	}
 	
 	function selectDataById()
 	{
 		$sql = "select a.*,u.name as uname from tbl_advertisements as a join tbl_users as u on a.created_by=u.id where a.id='$this->id'";
 	 	return $this->select($sql);
 	}
 	
 	function remove()
 	{
 	 	echo $sql = "delete from tbl_advertisements where id='$this->id'";
 	 	return $this->delete($sql);
 	}
 	function edit(){
 		$sql="update tbl_advertisements set  title='$this->title' , rank='$this->rank' , status='$this->status' , image='$this->image' , expire_date='$this->expire_date' , updated_at='$this->updated_at' , updated_by='$this->updated_by' where id='$this->id'";
 		return $this->update($sql);
 	}
 	function selectDataByIdForUser()
 	{
 		$sql = "select n.*,u.name as uname from tbl_news as n join tbl_users as u on n.created_by=u.id where n.id='$this->id'";
 	 	return $this->select($sql);
 	}
}
?>