<?php
    $action = 'View';
    $panel = 'Advertisement';
    $title = $panel . ' ' . $action;
    require_once "header.php";
    $advertisement->set('id',$_GET['id']);
    $advertisements = $advertisement->selectDataById();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
                  	<a href="advertisement_create.php" class="btn btn-success">
                  	<i class="fas fa-plus"></i>
                  	Create</a>
                    <a href="advertisement_list.php" class="btn btn-success">
                    <i class="fas fa-list"></i>
                    List</a>
                  </h6>
                  
                </div>
                <div class="card-body">
                	<table  class="table table-hover table-hover">
                		<tr>
                    <th>Title</th>
                    <td><?php echo $advertisements[0]->title?></td>
                  </tr>
                  <tr>
                    <th>Rank</th> 
                    <td><?php echo $advertisements[0]->rank?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                       <?php if($advertisements[0] -> status ==1){?>
                                  <span class="text text-success">Active</span>
                                <?php }else{?>
                                  <span class="text text-danger">De Active</span>
                               <?php } ?>

                    </td>
                  </tr>
                  <tr>
                    <th>Images</th> 
                    <td><img src="images/<?php echo $advertisements[0]->image?>" width="150" height="100"></td>  
                  </tr>
                  <tr>
                    <th>Expire Date</th> 
                    <td><?php echo $advertisements[0]->expire_date?></td>
                  </tr>
                  <tr>
                    <th>Created Date</th>
                    <td><?php echo $advertisements[0]->created_at?></td>
                  </tr>
                  <tr>
                    <th>Updated Date</th>
                    <td><?php echo $advertisements[0]->updated_at?></td>
                  </tr>
                  <tr>
                    <th>Created By</th>
                    <td><?php echo $advertisements[0]->uname?></td>
                  </tr>
                  <tr>
                    <th>Updated By</th>                 
                    <td><?php echo $advertisements[0]->updated_by?></td>
                    </tr>
                    </table>
 
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

      