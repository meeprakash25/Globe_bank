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
              <label>Page Title</label>
              <input type="text" name="menu_name" class="form-control" placeholder="Page Title">
                </div>
                <div class="form-group">
                  <label>Page Body</label>
                  <textarea name="body" class="form-control new_page_body" placeholder="Page Body"></textarea>
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
