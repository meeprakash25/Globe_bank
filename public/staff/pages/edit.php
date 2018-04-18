<?php require_once('../../../private/initialize.php'); ?>

<?php 
  if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/pages/index.php'));
  }
  $menu_name = '';
  $body = '';
  $position = '';
  $visible = '';
  $id = $_GET['id'];
  if(is_post_request()){  
    $menu_name = $_POST['menu_name'] ?? '';
    $body = $_POST['body'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';
    
    echo "Form parameters <br>";
    echo "Menu name: " . $menu_name . "<br>";
    echo "Body: " . $body . "<br>";
    echo "Position: " . $position . "<br>";
    echo "Visible: " . $visible . "<br>";
    }else{
      // redirect_to(url_for('/staff/subjects/index.php'));
  }
?>

<?php $page_title = 'Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Edit Page: </div>
                <div class="card-body">

                    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">    
                      <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" class="form-control" name="menu_name" value="<?php echo h($menu_name); ?>">
                      </div>
                      <div class="form-group">
                        <label>Page Body</label>
                        <textarea name="body" class="form-control"  value=""><?php echo $body; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="position">
                          <option selected>Select</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>
                          <input type="hidden" name="visible" value="0" />
                          <input type="checkbox" name="visible" value="1"/> Published
                        </label>
                    </div>   
                     <div class="row">
                      <div class="col-8">
                        <button type="submit" class="btn">Save</button>   
                      </div>
                      <div class="col-4 text-right">
                        <a class="btn" href="<?php echo url_for('/staff/pages/index.php'); ?>">Cancel</a>   
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

