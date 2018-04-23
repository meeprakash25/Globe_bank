<?php
  $subject_count = count_all_subjects() + 1;
  $subject = [];
  $subject["position"] = $subject_count; //for the last number to be selected in options dropdown
?>

<!--Modal Add Subject-->
        <div id="add-subject" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">



              <form action="<?php echo url_for('/staff/subjects/create.php') ?>" method="post" role="form">
                <div class="modal-header main-color-bg">
                  <h4 class="modal-title" id="myModalLabel">Create Subject</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                  <div class="modal-body">
                    <!-- display errors -->
                    <?php if (isset($_SESSION['form']) && ($_SESSION['form'] === 'submit_subject')) {; ?>
                      <?php errors(); ?>
                      <?php echo display_errors($errors); ?>
                    <?php } ?>

                    <div class="form-group">
                          <label>Subject Title</label>
                          <input type="text" name="menu_name" class="form-control" value="<?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_subject')) { echo $_SESSION['menu_name'];} ?>">
                        </div>
                        <div class="form-group">
                          <label>Position</label>
                          <select class="custom-select" name="position">
                            <?php
                              for ($i=1; $i <= $subject_count; $i++) {
                                  echo "<option value=\"{$i}\"";
                                  if ($subject["position"] == $i) {
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
                            <input type="checkbox" name="visible" value="1" <?php if((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_subject') && $_SESSION['visible'] == 1) {echo " checked";} ?> /> Published
                          </label>
                      </div>



                </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="button" class="btn" data-dismiss="modal">Close</button>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit_subject" class="btn">Create Subject</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
