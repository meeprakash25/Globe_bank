<?php require_once('../../../private/initialize.php'); ?>

<?php 
  if(!isset($_GET['id'])){
    redirect_to(url_for('/staff/subjects/index.php'));
  }

  $id = $_GET['id'];

  if(is_post_request()){  
    //process form request
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';
    
    $result = update_subject($subject);
    redirect_to(url_for('/staff/subjects/show.php?id=' . $id));

  }else{
      $subject = find_subject_by_id($id);

      $subject_count = count_all_subjects();
  }
?>

<?php $page_title = 'Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Edit Subject: </div>
                <div class="card-body">

                    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">    
                      <div class="form-group">
                        <label>Subject Title</label>
                        <input type="text" name="menu_name" class="form-control" placeholder="Subject Title" value="<?php echo h($subject['menu_name']); ?>">
                      </div>
                      <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="position">
                        <?php 
                          for ($i=1; $i <= $subject_count; $i++) { 
                            echo "<option value=\"{$i}\"";
                            if ($subject['position'] == $i) {
                              echo " selected";
                            }
                            echo ">{$i}</option>";
                          }
                        ?>
                       
                        </select>
                      </div>
                      <div class="form-group">
                        <label>
                            <input type="hidden" name="visible" value="0" />
                            <input type="checkbox" name="visible" value="1" <?php if($subject['visible'] == "1") { echo "checked";}; ?> /> Published
                            
                          </label>
                    </div>   
                    <div class="row">
                      <div class="col-8">
                        <button type="submit" class="btn">Save</button>   
                      </div>
                      <div class="col-4 text-right">
                        <!-- <a class="btn btn-outline-danger" href="delete.php?id=" onclick="return confirm('Are you sure?');">Delete</a>    -->
                        <a class="btn" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Cancel</a>   
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

