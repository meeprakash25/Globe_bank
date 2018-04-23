<?php require_once('../../../private/initialize.php'); ?>

<?php
    if (empty($_GET['id'])) {
        redirect_to(url_for('/staff/subjects/index.php'));
    }
      $id = $_GET['id'];

      $subject = find_subject_by_id($id);
      $show = '';

?>

<?php $page_title = 'Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">View subject: <?php echo h($subject['menu_name']); ?></div>
                <div class="card-body">

                   <form action="" method="">
                      <div class="row">
                        <div class="col-8">
                          <a class="btn" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>">Edit</a>
                        </div>
                        <div class="col-4 text-right">
                          <a class="btn" href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($id))); ?>">Delete</a>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label>Subject:</label> <strong><?php echo h($subject['menu_name']); ?></strong>
                      </div>
                      <div class="form-group">
                        <label>Position:</label> <?php echo h($subject['position']); ?>
                      </div>
                      <div class="form-group">
                        <label>Published: </label> <?php
                                                      if (h($subject['visible']) == 1) {
                                                          echo 'Yes';
                                                      } else {
                                                          echo 'No';
                                                      };
                                                    ?>
                      </div>

                  </form>

                </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>
