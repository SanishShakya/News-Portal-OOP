<?php
    $action = 'View';
    $panel = 'Admin';
    $title = $panel . ' ' . $action;
    require_once "header.php";
    $user->set('id',$_GET['id']);
    $users = $user->selectDataById();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
                  	<a href="admin_create.php" class="btn btn-success">
                  	<i class="fas fa-plus"></i>
                  	Create</a>
                    <a href="admin_list.php" class="btn btn-success">
                    <i class="fas fa-list"></i>
                    List</a>
                  </h6>
                  
                </div>
                <div class="card-body">
                	<table  class="table table-hover table-hover">
                		<tr>
                    <th>Name</th>
                    <td><?php echo $users[0]->name ?></td>
                  </tr>
                  <tr>
                    <th>Username</th> 
                    <td><?php echo $users[0]->username?></td>
                  </tr>
                  <tr>
                    <th>Email</th> 
                    <td><?php echo $users[0]->email?></td>
                  </tr>
                  <tr>
                    <th>Phone</th> 
                    <td><?php echo $users[0]->phone?></td>
                  </tr>
                  <tr>
                    <th>Address</th> 
                    <td><?php echo $users[0]->address?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                       <?php if($users[0] -> status ==1){?>
                                  <span class="text text-success">Active</span>
                                <?php }else{?>
                                  <span class="text text-danger">De Active</span>
                               <?php } ?>

                    </td>
                  </tr>
                  <tr>
                    <th>Password</th>
                    <td><?php echo $users[0]->password?></td>
                  </tr>
                  <tr>
                    <th>Images</th>
                    <td><img src="images/<?php echo $users[0]->image?>" width="100" height="100"></td>
                  </tr>
                  <tr>
                    <th>Role</th>
                    <td><?php echo $users[0]->role?></td>
                  </tr>
              </table>
 
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

      