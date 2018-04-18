<?php require_once('../../../private/initialize.php'); ?>

<?php 
    if(!isset($_GET['id'])){
        redirect_to(url_for('/staff/pages/index.php'));
      }
      $id = $_GET['id'];
      $manu_name = $_GET['manu_name'] ?? '';
      $position = $_GET['Position'] ?? '';
      $visible = $_GET['visible'] ?? '';
?>

<?php $page_title = 'Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">View Page: </div>
                <div class="card-body">

                    <form action="edit.php?id=" method="post">
                    <?php //echo $page['id']; ?>   
                      <div class="form-group">
                        <div class="form-group"> 
                        <label>Page ID:</label>  <?php echo h(u($id)); ?>
                      </div>
                        <label>Page Title:</label>  <?php echo h(u($manu_name)); ?>
                      </div>
                      <div class="form-group">
                        <label>Page Body:</label>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, commodi? Omnis rerum laborum qui nisi libero a nemo ab repellat illum? Dicta vero odit nihil ullam ipsa sed quibusdam totam.</p>
                      </div>
                      <div class="form-group">
                        <label>Position</label>  <?php echo h(u($position)); ?>
                      </div>
                      <div class="form-group">
                        <label>Published: </label> <?php
                                                      if(h(u($visible)) == 1){
                                                        echo 'Yes';
                                                        }else{ echo 'No';
                                                        };
                                                      ?>
                      </div> 
                    <div class="row">
                      <div class="col-8">
                        <a class="btn" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>">Edit</a>   
                      </div>
                      <div class="col-4 text-right">
                        <a class="btn btn-outline-danger" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($id))); ?>" onclick="return confirm('Are you sure?');">Delete</a>   
                      </div>
                    </div>  
                  </form>

                    
                </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>

