<?php
  $page_set = find_all_pages();
  $page = mysqli_fetch_assoc($page_set);
  $page_count = count_all_pages();
  $page["position"] = $page_count; //for the last number to be selected in options dropdown
?>

<!--Add Page-->
<div id="add-page" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="<?php echo url_for('/staff/pages/create.php') ?>" method="post">
          <div class="modal-header main-color-bg">
            <h4 class="modal-title" id="myModalLabel">Create Page</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- display errors -->
            <?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_page')) {; ?>
              <?php errors(); ?>
              <?php echo display_errors($errors); ?>
            <?php } ?>

            <div class="form-group">
                 <label>Subject</label>
                 <select class="custom-select" name="subject_id">
                   <?php
                      $subject_set = find_all_subjects();
                      while($subject = mysqli_fetch_assoc($subject_set)) {

                        echo "<option value=\"" .h($subject['id']) . "\"";
                        if($page['subject_id'] == $subject['id']) {

                          echo " selected";
                        }
                        echo ">" . h($subject['menu_name']) . "</option>";
                      }
                      mysqli_free_result($subject_set);
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Page Title</label>
                  <input type="text" name="menu_name" class="form-control" value="<?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_page')) { echo $_SESSION['menu_name'];} ?>">
                </div>
                <div class="form-group">
                  <label>Page Body</label>
                  <textarea name="content" class="form-control new_page_body"><?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_page')) { echo $_SESSION['content'];} ?></textarea>
                </div>
                <div class="form-group">
                  <label>Position</label>
                   <select class="custom-select" name="position">
                     <?php
                        for($i=1; $i <= $page_count; $i++) {
                          echo "<option value=\"{$i}\"";
                          if($page["position"] == $i) {
                            echo " selected";
                          }
                          echo ">{$i}</option>";
                        }
                        mysqli_free_result($page_set);
                      ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label>
                      <input type="hidden" name="visible" value="0" />
                      <input type="checkbox" name="visible" value="1"  <?php if((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_page') && ($_SESSION['visible'] == 1)) {echo " checked";} ?> /> Published
                    </label>
                  </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit_page" class="btn">Create Page</button>
                </div>
        </form>
      </div>
    </div>
  </div>
