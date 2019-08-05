<?php
  $action = 'Create';
  $panel = 'News';
  $title = $panel . ' ' . $action;
  require_once "header.php"; 

  if(isset($_POST['btnSave']))
  {
    $err=[];

    if(isset($_POST['category_id'])&& !empty($_POST['category_id'])&& trim($_POST['category_id']) !='')
    {
      $news->set('category_id',$_POST['category_id']);
    }
    else{
        $err['category_id']='Enter Category Name';
        }

    if(isset($_POST['description'])&& !empty($_POST['description'])&& trim($_POST['description']) !='')
    {
      $news->set('description',$_POST['description']); 
    }
    else{
        $err['description']='Enter News Description';
        }

    if(isset($_POST['short_description'])&& !empty($_POST['short_description'])&& trim($_POST['short_description']) !='')
    {
      $news->set('short_description',$_POST['short_description']); 
    }else{
        $err['short_description']='Enter News Short description';
        }

    if(isset($_POST['title'])&& !empty($_POST['title'])&& trim($_POST['title']) !='')
    {
      $news->set('title',$_POST['title']); 
    }
    else{
        $err['title']='Enter News Title';
        }
 
      $news->set('status',$_POST['status']);
      $news->set('feature_key',$_POST['feature_key']); 
      $news->set('slider_key',$_POST['slider_key']); 
      $news->set('breaking_key',$_POST['breaking_key']); 

  if(isset($_FILES['photo']['error'])&& $_FILES['photo']['error'] ==0)
  {
    //size check
    if($_FILES['photo']['size'] < 1000000){
      //type check
      $type = ['image/png','image/jpg','image/jpeg','image/gif'];
      if(in_array($_FILES['photo']['type'],$type)){
        //upload file
        if(move_uploaded_file($_FILES['photo']['tmp_name'],'images/' . $_FILES['photo']['name'])){
          $news->set('image',$_FILES['photo']['name']); 
        }else{
          echo 'file uploaded failed';
        }
      }else{
        $err['photo']='files type dos not match';
      }
    }else{
      $err['photo']='files size exceeded,100 kb allowed';
    }
  }

     $news->set('created_by',$_SESSION['admin_id']);
     $news->set('created_at',date('Y-m-d H:i:s'));
     $status = $news->create();
  }
  $category_list = $category->index('id,name');
 ?>
 

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
            	<a href="news_list.php" class="btn btn-success">
            	<i class="fas fa-list"></i>
            	List</a>
            </h6>
            
          </div>
    <div class="card-body">

      <?php if(isset($status) && $status == true){ ?>
        <p class="alert alert-success text-success">News Insert Success !!</p>
      <?php } ?>
      <?php if(isset($status) && $status == false){ ?>
        <p class="alert alert-danger text-danger">News Insert Failed !!</p>
      <?php } ?>

      <form action="" method="post" id="loginForm" enctype="multipart/form-data">

        <div class="form-group">
          <label for="category_id">Category Name</label>
           <select name='category_id' class="form-control" id="category_id" required="required"></br>
            <option value=''>Select Category</option>
            <?php foreach ($category_list as $cl) {?>
              <option value="<?php echo $cl->id ?>"><?php echo $cl->name ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="title">News Title</label>
          <input type="text" class="form-control" id="title"  placeholder="Enter News Title" name="title" required="required">
        </div>

  			<div class="form-group">
    			<label for="short_description">Short Description</label>
    			<textarea class="form-control" id="short_description" name="short_description" required="required"></textarea> 
  			</div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" required="required"></textarea> 
        </div>

  			<div class="form-group">
  		    <label for="photo">Image</label><br>
          <input type='file' name='photo' id='photo'  required="required">
  			</div>

  			<div class="form-group">
  		    <label for="status">Status</label><br>
  		    <input type="radio" id="active" name="status" value="1" checked="" required="required">Active
  		    <input type="radio" id="deactive" name="status" value="0" required="required">De-Active
  			</div>

        <div class="form-group">
          <label for="feature_key">Key Feature</label><br>
          <input type="radio" id="active" name="feature_key" value="1" checked="" required="required">Active
          <input type="radio" id="deactive" name="feature_key" value="0" required="required">De-Active
        </div>

        <div class="form-group">
          <label for="slider_key">Slider Key</label><br>
          <input type="radio" id="active" name="slider_key" value="1" checked="" required="required">Active
          <input type="radio" id="deactive" name="slider_key" value="0" required="required">De-Active
        </div>

        <div class="form-group">
          <label for="breaking_key">Breaking News Key</label><br>
          <input type="radio" id="active" name="breaking_key" value="1" checked="" required="required">Active
          <input type="radio" id="deactive" name="breaking_key" value="0" required="required">De-Active
        </div>

  			<hr class="sidebar-divider">

  			<button type="submit" name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Save News</button>
  		</form>
            
       
    </div>
  </div>

  </div>

  
  <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

  <script>
    CKEDITOR.replace( 'description' );
    </script>