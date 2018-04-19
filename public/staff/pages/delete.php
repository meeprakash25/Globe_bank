<?php
  require_once('../../../private/initialize.php');

  if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
  }
  $id = $_GET['id'];

  if(is_post_request()) {

    $result = delete_page($id);
    redirect_to(url_for('/staff/pages/index.php'));

  } else {
    $page = find_page_by_id($id);
  }

?>

<?php $page_title = 'Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Delete Page</div>
                <div class="card-body">

                    
                  <h4>Are you sure you want tot delete this Page?</h4>
                  <p><?php echo h($page['menu_name']); ?></p>
                  <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">   
                    <div class="row">
                      <div class="col-8">
                        <a class="btn" href="<?php echo url_for('/staff/pages/index.php'); ?>">Cancel</a>   
                      </div>
                      <div class="col-4 text-right">
                        <button type="submit" class="btn" name="commit">Delete</button> 
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