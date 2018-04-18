<?php require_once('../../../private/initialize.php'); ?>

<?php
  $pages = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact us'],
  ];
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>



      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Pages</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                          <th class="hide-id">ID</th>
                          <th class="hide-position">Position</th>
                          <th class="hide-visible">Visible</th>
                          <th>Name</th>
                          <th colspan="3">Action</th>
                        </tr>

                        <?php foreach($pages as $page) { ?>
                          <tr>
                            <td class="hide-id"><?php echo h($page['id']); ?></td>
                            <td class="hide-position"><?php echo h($page['position']); ?></td>
                            <td class="hide-visible"><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                            <td><?php echo h($page['menu_name']); ?></td>
                            <td><a class="btn btn-xs" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                            <td class="hide-btn"><a class="btn btn-xs" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                            <td class="hide-btn"><a class="btn btn-xs" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                          </tr>
                        <?php } ?>
                      </table>
                </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>
