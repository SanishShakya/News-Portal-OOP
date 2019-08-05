<?php
    $action = 'List';
    $panel = 'Comment';
    $title = $panel . ' ' . $action;
     require_once "header.php"; 
     $comments = $comment1->index();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>

          <div class="card shadow mb-4">
                <div class="card-header py-3">

                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
                  
                  </h6>
                  
                </div>

                <div class="card-body">

              	<table  class="table table-hover table-hover" id="myTable">
              		<thead class="thead-dark">
              			<tr>
              				<th>#</th>
              				<th>News_Id</th>
                      <th>Name</th>
                      <th>Comment</th>
              				<th>Status</th>
                      <th>Action</th>
              			</tr>
              		</thead>

              		<tbody>
                          <?php foreach($comments as $i => $comment1){?>
              			<tr>
                              <td><?php echo $i+1?></td>
                              <td><?php echo $comment1 -> news_id?></td>
                              <td><?php echo $comment1 -> name?></td>
                              <td><?php echo $comment1 -> comments?></td>
                             <td>
                               <?php if($comment1 -> status ==1){?>
                                <span class="text text-success">Active</span>
                              <?php }else{?>
                                <span class="text text-danger">De Active</span>
                             <?php } ?>
                              </td>
                              <td>
                              <a href="comment_view.php?id=<?php echo $comment1-> id?>" class="btn btn-info" title="View Details"><i class="fas fa-eye"></i></a>
                              <a href="comment_delete.php?id=<?php echo $comment1-> id?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to Delete ?')"><i class="fas fa-trash"></i></a>
                              </td>
                          </tr>
                      <?php } ?>
              		</tbody>

              		<tfoot class="thead-dark">
              			<tr>
                      <th>#</th>
                      <th>News_Id</th>
                      <th>Name</th>
                      <th>Comment</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
              		</tfoot>
              	</table>
 
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->
        
<?php require_once "footer.php"; ?>

      