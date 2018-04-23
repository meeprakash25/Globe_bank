<?php require_once('../../../private/initialize.php'); ?>

<?php
    if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/pages/index.php'));
    }
      $id = $_GET['id'];

      $page = find_page_by_id($id);
?>

<?php $page_title = 'Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">View Page: <?php echo h($page['menu_name']); ?></div>
                <div class="card-body">

                    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">
                      <div class="row">
                        <div class="col-8">
                          <a class="btn" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>">Edit</a>
                        </div>
                        <div class="col-4 text-right">
                          <a class="btn" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($id))); ?>">Delete</a>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group">
                        <?php $subject = find_subject_by_id($page['subject_id']); ?>
                        <label>Subject: </label>  <strong><?php echo h($subject['menu_name']); ?></strong>
                      </div>

                      <div class="form-group">
                        <label>Page:</label>  <strong><?php echo h($page['menu_name']); ?></strong>
                      </div>

                      <div class="form-group">
                        <label>Position: </label>  <?php echo h($page['position']); ?>
                      </div>

                      <div class="form-group">
                        <label>Published: </label> <?php
                                                      if (h($page['visible']) == 1) {
                                                          echo 'Yes';
                                                      } else {
                                                          echo 'No';
                                                      };
                                                      ?>
                      </div>
                      <div class="form-group">
                        <label>Page Body: </label>
                        <hr>
                            <p><?php echo $page['content']; ?></p>
                        <hr>
                      </div>
                  </form>


                </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>
