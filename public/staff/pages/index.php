<?php require_once('../../../private/initialize.php'); ?>

<?php $page_set = find_all_pages(); ?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>



      <div class="col-md-9" id="pages">
            <div class="card">
                <div class="card-header main-color-bg">Pages</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                          <!-- <th class="hide-id">ID</th> -->
                          <th class="hide-id">Subject</th>
                          <th>Page</th>
                          <th class="hide-position">Position</th>
                          <th class="hide-visible">Published</th>
                          <th colspan="3">Action</th>
                        </tr>

                        <?php while ($page = mysqli_fetch_assoc($page_set)) {
    ?>

                          <tr>
                            <!-- <td class="hide-id"><?php //echo h($page['id']); ?></td> -->
                            <?php $subject = find_subject_by_id($page['subject_id']); ?>
                            <td class="hide-id"><?php echo h($subject['menu_name']); ?></td>
                            <td><?php echo h($page['menu_name']); ?></td>
                            <td class="hide-position"><?php echo h($page['position']); ?></td>
                            <td class="hide-visible"><?php echo $page['visible'] == 1 ? 'Yes' : 'No'; ?></td>
                            <td><a class="btn btn-sm" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                            <td class="hide-btn"><a class="btn btn-sm" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                            <td class="hide-btn"><a class="btn btn-sm" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
                          </tr>
                        <?php
} ?>
                      </table>

                      <?php mysqli_free_result($page_set); ?>

                </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>
