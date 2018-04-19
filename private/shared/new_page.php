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
                  <input type="text" name="menu_name" class="form-control" placeholder="Page Title">
                </div>
                <div class="form-group">
                  <label>Page Body</label>
                  <textarea name="content" class="form-control new_page_body" placeholder="Page Body"></textarea>
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
                      <input type="checkbox" name="visible" value="1" checked /> Published
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn">Create Page</button>
                </div>
        </form>
      </div>
    </div>
  </div>
