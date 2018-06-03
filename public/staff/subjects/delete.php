<?php
  require_once('../../../private/initialize.php');

  if (!isset($_GET['id'])) {
      redirect_to(url_for('/staff/subjects/index.php'));
  }
  $id = $_GET['id'];

  if (is_post_request()) {
      $result = delete_subject($id);
      if ($result === true) {
          $_SESSION['info'] = "Subject deleted successfully";
          redirect_to(url_for('/staff/subjects/index.php'));
      } else {
        $subject = find_subject_by_id($id);
          // show this page again
      }
  } else {
      $subject = find_subject_by_id($id);
  }

?>

<?php $page_title = 'Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Delete subject</div>
                <div class="card-body">
                  
                  <!-- display errors -->
                    <?php echo display_errors($errors); ?>

                  <h5>Are you sure you want to delete Subject: <strong><?php echo h($subject['menu_name']); ?></strong> ?</h5><br>
                                    
                  <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
                  
                    <div class="row">
                      <div class="col-8">
                        <a class="btn" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Cancel</a>
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
