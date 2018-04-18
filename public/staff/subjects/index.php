<?php require_once('../../../private/initialize.php'); ?>

<?php
  $subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];
?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Subjects</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                          <th class="hide-id">ID</th>
                          <th class="hide-position">Position</th>
                          <th class="hide-visible">Visible</th>
                          <th>Name</th>
                          <th colspan="3">Action</th>
                        </tr>

                        <?php foreach($subjects as $subject) { ?>
                          <tr>
                            <td class="hide-id"><?php echo h($subject['id']); ?></td>
                            <td class="hide-position"><?php echo h($subject['position']); ?></td>
                            <td class="hide-visible"><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                            <td><?php echo h($subject['menu_name']); ?></td>
                            <td><a class="btn" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
                            <td class="hide-btn"><a class="btn" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
                            <td class="hide-btn"><a class="btn" href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                          </tr>
                        <?php } ?>
                      </table>
                </div>
            </div>
      </div>
    </div>
  </div>
</section>



<?php include(PUBLIC_PATH . '/staff/subjects/new.php') ?>
<?php include(SHARED_PATH . '/staff_footer.php') ?>
