<?php
  $action = 'Edit';
  $panel = 'Category';
  $title = $panel . ' ' . $action;
  require_once "object.php"; 

  $category->set('id',$_GET['id']);

  if(isset($_POST['btnUpdate']))
  {
    $err=[];

    if(isset($_POST['name'])&& !empty($_POST['name'])&& trim($_POST['name']) !='')
    {
      $category->set('name',$_POST['name']);
    }
    else{
        $err['name']='Enter name';
        }

    if(isset($_POST['rank'])&& !empty($_POST['rank'])&& trim($_POST['rank']) !='')
    {
      $category->set('rank',$_POST['rank']); 
    }
    else{
        $err['rank']='Enter rank';
        }
 
    if(isset($_POST['status']))
    {
      $category->set('status',$_POST['status']); 
    }
    else{
        $err['status']='Enter status';
        }

     $category->set('updated_by',$_SESSION['admin_id']);
     $category->set('updated_at',date('Y-m-d H:i:s'));
     $status = $category->edit();
     header('location:category_list.php');
  }
  $cat = $category->selectDataById();
  require_once "header.php"; 
 ?>
 

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
            	<a href="category_list.php" class="btn btn-success">
            	<i class="fas fa-list"></i>
            	List</a>
            </h6>
            
          </div>
    <div class="card-body">

      <?php if(isset($status) && $status == true){ ?>
        <p class="alert alert-success text-success">Category Edited Success !!</p>
      <?php } ?>
      <?php if(isset($status) && $status == false){ ?>
        <p class="alert alert-danger text-danger">Category Edited Failed !!</p>
      <?php } ?>

      <form action="" method="post" id="loginForm">
  			<div class="form-group">
    			<label for="name">Name</label>
    			<input type="text" class="form-control" id="name"  placeholder="Enter name" name="name" required="required" value="<?php echo $cat[0]->name?>">
  			</div>

  			<div class="form-group">
  		    <label for="rank">Rank</label>
          <input type="number" class="form-control" id="rank"  placeholder="Enter rank" name="rank" required="required" value="<?php echo $cat[0]->rank?>">
  			</div>

  			<div class="form-group">
  		    <label for="active">Status</label>
          <?php if($cat[0]->status == 1){?>
  		    <input type="radio" id="active" name="status" value="1" checked="" required="required">Active
  		    <input type="radio" id="deactive" name="status" value="0" required="required">De-Active
           <?php }else{?>
            <input type="radio" id="active" name="status" value="1" required="required">Active
          <input type="radio" id="deactive" name="status" value="0" checked="" required="required">De-Active
        <?php } ?>
  			</div>

  			<hr class="sidebar-divider">

  			<button type="submit" name="btnUpdate" class="btn btn-primary"><i class="fas fa-redo"></i> Update Category</button>
  		</form>
            
       
    </div>
  </div>

  </div>

  
  <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

