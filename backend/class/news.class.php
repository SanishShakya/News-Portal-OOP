<?php
require_once "common.class.php";
require_once "CRUD.php";

class News extends Common implements CRUD
{
 	protected $id, $category_id, $title, $description, $image, $slider_key, $breaking_key, $feature_key, $status, $created_by, $updated_by, $created_at, $updated_at, $short_description;

 	function create()
 	{
 		$sql = "insert into tbl_news (category_id,title,short_description,description,image,status,feature_key,slider_key,breaking_key,created_at,created_by) values ('$this->category_id','$this->title','$this->short_description','$this->description','$this->image','$this->status','$this->feature_key','$this->slider_key','$this->breaking_key','$this->created_at','$this->created_by')"; 
 		return $this-> insert($sql);
 	}
 	function index($field = '*')
 	{
 	 	$sql = "select n.*,c.name as category_name from tbl_news n join tbl_categories c on n.category_id=c.id order by n.created_at desc";
 	 	return $this->select($sql);
 	}
 	function selectDataById()
 	{
 	 $sql = "select n.*,c.name as cname from tbl_news n join tbl_categories as c on c.id=n.category_id where n.id='$this->id'";
 	 	return $this->select($sql);
 	}

 	function selectDataByIdForUser()
 	{
 		$sql = "select n.*,u.name as uname from tbl_news as n join tbl_users as u on n.created_by=u.id where n.id='$this->id'";
 	 	return $this->select($sql);
 	}
 	
 	function remove()
 	{
 	 	$sql = "delete from tbl_news where id='$this->id'";
 	 	return $this->delete($sql);
 	}
 	function edit(){
 		$sql="update tbl_news set  category_id='$this->category_id' , title='$this->title', short_description='$this->short_description', description='$this->description', image='$this->image', feature_key='$this->feature_key', slider_key='$this->slider_key', breaking_key='$this->breaking_key' , status='$this->status' , updated_at='$this->updated_at' , updated_by='$this->updated_by' where id='$this->id'";
 		return $this->update($sql);
 	}
 	function getLatestNews(){
 		$sql = "select n.title, n.category_id,n.id,n.created_at,c.name as category_name from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 order by n.created_at desc limit 4";
 	 	return $this->select($sql);
 	}
 	function getSliderNews(){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at,c.name as category_name from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.slider_key=1 order by n.created_at desc limit 4";
 	 	return $this->select($sql);
 	}
 	function getBreakingNews(){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.breaking_key=1 order by n.created_at desc limit 5";
 	 	return $this->select($sql);
 	}
 	function getFeatureNews(){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.feature_key=1 order by n.created_at desc limit 5";
 	 	return $this->select($sql);
 	}
 	function getFeatureNewsByCategoryId(){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.category_id='$this->category_id' order by n.created_at desc limit 4";
 	 	return $this->select($sql);
 	}
 	function getNewsByCategoryId(){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.category_id='$this->category_id' order by n.created_at desc";
 	 	return $this->select($sql);
 	}
 	function getNewsByKeyword($keyword){
 		$sql = "select n.title,n.category_id,n.id,n.image,n.created_at from tbl_news as n join tbl_categories as c on n.category_id=c.id where n.status=1 and n.title like '%$keyword%' order by n.created_at desc";
 	 	return $this->select($sql);
 	}
}
?>