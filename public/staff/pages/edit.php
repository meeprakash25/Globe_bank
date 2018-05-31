<?php require_once('../../../private/initialize.php'); ?>

<?php
  if (!isset($_GET['id'])) {
      redirect_to(url_for('/staff/pages/index.php'));
  }

  $id = $_GET['id'];
  // $subject_id = $_GET['subject_id'];

  if (is_post_request()) {
      //process form request
      $page = [];
      $page['id'] = $id;
      $page['subject_id'] = $_POST['subject_id'] ?? '';
      $page['menu_name'] = $_POST['menu_name'] ?? '';
      $page['content'] = $_POST['content'] ?? '';
      $page['position'] = $_POST['position'] ?? '';
      $page['visible'] = $_POST['visible'] ?? '';

      $result = update_page($page);
      if ($result === true) {
        redirect_to(url_for('/staff/pages/show.php?id=' . $id));
      } else {
          // $errors = $result;
          // var_dump($errors);
          // reload the page with errors
      }
  } else {
      $page = find_page_by_id($id);
      // $page_count_by_subject = count_pages_by_subject_id(h($subject_id));
  }
  $page_count = count_all_pages();
?>

<?php $page_title = 'Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Edit Page: <?php echo h($page['menu_name']); ?></div>
                <div class="card-body">

                    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">

                      <!-- display errors -->
                      <?php echo display_errors($errors); ?>

                      <div class="form-group">
                        <label>Subject Title</label>
                        <select class="custom-select" name="subject_id">
                          <?php
                            $subject_set = find_all_subjects();
                            while($subject = mysqli_fetch_assoc($subject_set)) {
                              echo "<option value=\"" . h($subject['id']) . "\"";
                              if($page["subject_id"] == $subject['id']) {
                                echo " selected";
                              }
                              echo ">" . h($subject['menu_name']) . "</option>";
                            }
                          ?>

                          </select>
                        </div>
                        <div class="form-group">
                          <label>Page Title</label>
                          <input type="text" name="menu_name" class="form-control" placeholder="Page Title" value="<?php echo h($page['menu_name']); ?>">
                        </div>
                        <div class="form-group">
                          <label>Position</label>
                          <select class="custom-select" name="position">
                          <?php
                            for ($i=1; $i <= $page_count; $i++) {
                                echo "<option value=\"{$i}\"";
                                if ($page['position'] == $i) {
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
                              <input type="checkbox" name="visible" value="1" <?php if ($page['visible'] == "1") {
                              echo "checked";
                          }; ?> /> Published

                            </label>
                      </div>
                      <div class="form-group">
                        <label>Page Body</label>
                        <textarea type="text" name="content" class="form-control" placeholder="Page Body"><?php echo h($page['content']); ?></textarea>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <button type="submit" class="btn">Save</button>
                        </div>
                        <div class="col-4 text-right">
                          <!-- <a class="btn btn-outline-danger" href="delete.php?id=" onclick="return confirm('Are you sure?');">Delete</a>    -->
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
