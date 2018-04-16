<!--Modals-->
<!--Add Page-->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        </form>
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
                  <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox"> Published
                  </label>
              </div>
              <div class="form-group">
                <label for="">Meta Tags</label>
                <input type="text" class="form-control" placeholder="Add some tags">
              </div>
              <div class="form-group">
                <label for="">Meta Description</label>
                <input type="text" class="form-control" placeholder="Add Meta Description...">
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