<?php
    $action = 'View';
    $panel = 'Admin';
    $title = $panel . ' ' . $action;
    require_once "header.php";
    $comment1->set('id',$_GET['id']);
    $comments = $comment1->index();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
                    <a href="comment_list.php" class="btn btn-success">
                    <i class="fas fa-list"></i>
                    List</a>
                  </h6>
                  
                </div>
                <div class="card-body">
                	<table  class="table table-hover table-hover">
                		<tr>
                    <th>News_Id</th>
                    <td><?php echo $comments[0]->news_id ?></td>
                  </tr>
                  <tr>
                    <th>Name</th> 
                    <td><?php echo $comments[0]->name?></td>
                  </tr>
                  <tr>
                    <th>Email</th> 
                    <td><?php echo $comments[0]->email?></td>
                  </tr>
                  <tr>
                    <th>Comment</th> 
                    <td><?php echo $comments[0]->comments?></td>
                  </tr>
                  <tr>
                    <th>created At</th> 
                    <td><?php echo $comments[0]->created_at?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                       <?php if($comments[0] -> status ==1){?>
                                  <span class="text text-success">Active</span>
                                <?php }else{?>
                                  <span class="text text-danger">De Active</span>
                               <?php } ?>

                    </td>
                  </tr>
              </table>
 
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->
<?php require_once "footer.php"; ?>

      