<?php
  $action = 'Create';
  $panel = 'Admin';
  $title = $panel . ' ' . $action;
  require_once "header.php"; 

  if(isset($_POST['btnSave']))
  {
    $err=[];

    if(isset($_POST['name'])&& !empty($_POST['name'])&& trim($_POST['name']) !='')
    {
      $user->set('name',$_POST['name']);
    }
    else{
        $err['name']='Enter name';
        }

   if(isset($_POST['username'])&& !empty($_POST['username'])&& trim($_POST['username']) !='')
  {
    $user->set('username',$_POST['username']);
  }
  else{
      $err['username']='Enter username';
      }

  if(isset($_POST['email'])&& !empty($_POST['email'])&& trim($_POST['email']) !='')
  {
    $user->set('email',$_POST['email']); 
  }
  else{
      $err['email']='Enter email';
      }

  if(isset($_POST['phone'])&& !empty($_POST['phone'])&& trim($_POST['phone']) !='')
  {
    $user->set('phone',$_POST['phone']); 
  }else{
      $err['phone']='Enter phone';
      }

  if(isset($_POST['address'])&& !empty($_POST['address'])&& trim($_POST['address']) !='')
  {
    $user->set('address',$_POST['address']); 
  }
  else{
      $err['address']='Enter address';
      }

  if(isset($_POST['password'])&& !empty($_POST['password'])&& trim($_POST['password']) !='')
  {
    $user->set('password',md5($_POST['password'])); 
  }
  else{
      $err['password']='Enter password';
      }


  if(isset($_POST['status']))
  {
    $user->set('status',$_POST['status']); 
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
          $user->set('image',$_FILES['photo']['name']); 
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
  if(isset($_POST['role'])&& !empty($_POST['role'])&& trim($_POST['role']) !='')
  {
       $user->set('role',$_POST['role']);
    }
    else{
        $err['role']='Enter role';
        }

        $status = $user->create();
  }
 ?>
 

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
            	<a href="admin_list.php" class="btn btn-success">
            	<i class="fas fa-list"></i>
            	List</a>
            </h6>
            
          </div>
    <div class="card-body">

      <?php if(isset($status) && $status == true){ ?>
        <p class="alert alert-success text-success">Admin Insert Success !!</p>
      <?php } ?>
      <?php if(isset($status) && $status == false){ ?>
        <p class="alert alert-danger text-danger">Admin Insert Failed !!</p>
      <?php } ?>

      <form action="" method="post" id="loginForm" enctype="multipart/form-data">
  			<div class="form-group">
    			<label for="name">Name</label>
    			<input type="text" class="form-control" id="name"  placeholder="Enter name" name="name" required="required">
  			</div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username"  placeholder="Enter Username" name="username" required="required">
        </div>

  			<div class="form-group">
  		    <label for="email">Email</label>
          <input type="email" class="form-control" id="email"  placeholder="Enter email" name="email" required="required">
  			</div>

        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone"  placeholder="Enter Phone" name="phone" required="required">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address"  placeholder="Enter Address" name="address" required="required">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password"  placeholder="Enter Password" name="password" required="required">
        </div>

  			<div class="form-group">
  		    <label for="active">Status</label><br>
  		    <input type="radio" id="active" name="status" value="1" checked="" required="required">Active
  		    <input type="radio" id="deactive" name="status" value="0" required="required">De-Active
  			</div>

        <div class="form-group">
          <label for="photo">Image</label><br>
          <input type='file' name='photo' id='photo'  required="required">
        </div>

        <div class="form-group">
          <label for="role">Role</label>
           <select name='role' class="form-control" id="role" required="required"></br>
            <option value=''>Select Role</option>
            <option value='admin'>Admin</option>
            <option value='reporter'>Reporter</option>
            
          </select>
        </div>

  			<hr class="sidebar-divider">

  			<button type="submit" name="btnSave" class="btn btn-primary"><i class="fas fa-plus"></i> Create Admin</button>
  		</form>
            
       
    </div>
  </div>

  </div>

  
  <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

