<?php
    $action = 'List';
    $panel = 'News';
    $title = $panel . ' ' . $action;
     require_once "header.php"; 
     $newss = $news->index();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $panel ?> Management</h1>

          <div class="card shadow mb-4">
                <div class="card-header py-3">

                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $action ?> <?php echo $panel ?>
                    <a href="news_create.php" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    Create</a>
                  </h6>
                  
                </div>

                <div class="card-body">

                <table  class="table table-hover table-hover" id="myTable">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                          <?php foreach($newss as $i => $news){?>
                    <tr>
                              <td><?php echo $i+1?></td>
                              <td><?php echo $news->category_name?></td>
                              <td><?php echo $news->title?></td>
                             <td>
                               <?php if($news->status==1){?>
                                <span calss="text text-success">Active</span>
                              <?php }else{?>
                                <span class="text text-danger">De Active</span>
                             <?php } ?>
                              </td>
                              <td><img src="images/<?php echo $news->image?>" width="150" height="100"></td>
                              
                              <td>
                              <a href="news_view.php?id=<?php echo $news->id?>" class="btn btn-info" title="View Details"><i class="fas fa-eye"></i></a>
                              <a href="news_edit.php?id=<?php echo $news->id?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                              <a href="news_delete.php?id=<?php echo $news->id?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to Delete ?')"><i class="fas fa-trash"></i></a>
                              </td>

                          </tr>
                      <?php } ?>
                  </tbody>

                  <tfoot class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>

                    </tr>
                  </tfoot>
                </table>
 
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->
        
<?php require_once "footer.php"; ?>

      