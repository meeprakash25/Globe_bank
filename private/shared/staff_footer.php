      </div>
      <div class="footer footer-copyright py-3 text-center">
        &copy; <?php echo Date("Y"); ?>, <a href="index.php">Globe Bank</a>
      </div>

<!--Modals-->
<!--Add Subject-->
<div id="addSubject" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel">Add Subject</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Subject Title</label>
                  <input type="text" class="form-control" placeholder="Subject Title">
                </div>
                <div class="form-group">
                  <label>Subject Body</label>
                  <textarea name="editor1" class="form-control" placeholder="Subject Body"></textarea>
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox"> Published
                  </label>
              </div>
           </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--Add Subject-->
<div id="addPage" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel">Add Page</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Page Title</label>
                  <input type="text" class="form-control" placeholder="Page Title">
                </div>
                <div class="form-group">
                  <label>Page Body</label>
                  <textarea name="editor2" class="form-control" placeholder="Page Body"></textarea>
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox"> Published
                  </label>
              </div>
           </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--Add Subject-->
<div id="addAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel">Add Admin</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Admin Title</label>
                  <input type="text" class="form-control" placeholder="Admin Title">
                </div>
                <div class="form-group">
                  <label>Admin Body</label>
                  <textarea name="editor3" class="form-control" placeholder="Admin Body"></textarea>
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox"> Published
                  </label>
              </div>
           </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
			CKEDITOR.replace( 'editor1' );
	</script>
  <script>
			CKEDITOR.replace( 'editor2' );
	</script>
  <script>
			CKEDITOR.replace( 'editor3' );
	</script>

    <script src="<?php echo url_for('javascripts/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/popper.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/fontawesome-all.js'); ?>"></script>
  </body>
</html>
