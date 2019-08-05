<?php
  $action = 'Update';
  $panel = 'Advertisement';
  $title = $panel . ' ' . $action;
  require_once "object.php"; 

  $advertisement->set('id',$_GET['id']);

  if(isset($_POST['btnUpdate']))
  {
    $err=[];

    if(isset($_POST['title'])&& !empty($_POST['title'])&& trim($_POST['title']) !='')
    {
      $advertisement->set('title',$_POST['title']);
    }
    else{
        $err['title']='Enter Title';
        }

    if(isset($_POST['rank'])&& !empty($_POST['rank'])&& trim($_POST['rank']) !='')
    {
      $advertisement->set('rank',$_POST['rank']); 
    }
    else{
        $err['rank']='Enter rank';
        }
    if(isset($_POST['expire_date'])&& !empty($_POST['expire_date'])&& trim($_POST['expire_date']) !='')
    {
      $advertisement->set('expire_date',$_POST['expire_date']); 
    }
    else{
        $err['expire_date']='Enter Expire Date';
        }
 
    if(isset($_POST['status']))
    {
      $advertisement->set('status',$_POST['status']); 
    }
    else{
        $err['status']='Enter status';
        }
    if(isset($_FILES['photo']['error'])&& $_FILES['photo']['error'] ==0)
    {
    //size check
    if($_FILES['photo']['size'] < 1000000){
      //type check
      $type = ['image/png','image/jpg','image/jpeg','image/gif'];
      if(in_array($_FILES['photo']['type'],$type)){
        //upload file
        if(move_uploaded_file($_FILES['photo']['tmp_name'],'images/' . $_FILES['photo']['name'])){
          $advertisement->set('image',$_FILES['photo']['name']); 
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

     $advertisement->set('updated_by',$_SESSION['admin_id']);
     $advertisement->set('updated_at',date('Y-m-d H:i:s'));
     $status = $advertisement->edit();
     header('location:advertisement_list.php');
  }
  $advetisements = $advertisement->selectDataById();
  require_once "header.php";
 ?>
 

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
            	<a href="advertisement_list.php" class="btn btn-success">
            	<i class="fas fa-list"></i>
            	List</a>
            </h6>
            
          </div>
    <div class="card-body">

      <?php if(isset($status) && $status == true){ ?>
        <p class="alert alert-success text-success">Advertisement Update Success !!</p>
      <?php } ?>
      <?php if(isset($status) && $status == false){ ?>
        <p class="alert alert-danger text-danger">Advertisement Update Failed !!</p>
      <?php } ?>

      <form action="" method="post" id="loginForm" enctype="multipart/form-data">
  			<div class="form-group">
    			<label for="title">Title</label>
    			<input type="text" class="form-control" id="title"  placeholder="Enter title" name="title" required="required" value="<?php echo $advetisements[0]->title?>">
  			</div>

  			<div class="form-group">
  		    <label for="rank">Rank</label>
          <input type="number" class="form-control" id="rank"  placeholder="Enter rank" name="rank" required="required" value="<?php echo $advetisements[0]->rank?>">
  			</div>

        <div class="form-group">
          <label for="expire_date">Expire Date</label>
          <input type="date" class="form-control" id="expire_date"  placeholder="Enter expire_date" name="expire_date" required="required" value="<?php echo $advetisements[0]->expire_date?>">
        </div>

        <div class="form-group">
          <label for="photo">Image</label><br>
          <input type='file' name='photo' id='photo'  required="required">
        </div>

  			<div class="form-group">
  		    <label for="active">Status</label><br>
  		    <input type="radio" id="active" name="status" value="1" checked="" required="required">Active
  		    <input type="radio" id="deactive" name="status" value="0" required="required">De-Active
  			</div>

  			<hr class="sidebar-divider">

  			<button type="submit" name="btnUpdate" class="btn btn-primary"><i class="fas fa-redo"></i> Update Advertisement</button>
  		</form>
            
       
    </div>
  </div>

  </div>

  
  <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

