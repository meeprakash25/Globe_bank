<?php require_once('../../../private/initialize.php'); ?>

<?php

  $subject_set = find_all_subjects();
  ?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>

      <div class="col-md-9" id="subjects">
            <div class="card">
                <div class="card-header main-color-bg">Subjects</div>
                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <tr>
                      <!-- <th class="hide-id">ID</th> -->
                      <th>Name</th>
                      <th class="hide-position">Position</th>
                      <th class="hide-visible">Published</th>
                      <th colspan="3">Action</th>
                    </tr>

                    <?php while ($subject = mysqli_fetch_assoc($subject_set)) {
      ?>
                      <tr>
                        <!-- <td class="hide-id"><?php //echo h($subject['id']);?></td> -->
                        <td><?php echo h($subject['menu_name']); ?></td>
                        <td class="hide-position"><?php echo h($subject['position']); ?></td>
                        <td class="hide-visible"><?php echo $subject['visible'] == 1 ? 'Yes' : 'No'; ?></td>
                        <td><a class="btn btn-sm" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
                        <td class="hide-btn"><a class="btn btn-sm" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
                        <td class="hide-btn"><a class="btn btn-sm" href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
                      </tr>
                    <?php
  } ?>
                  </table>

                  <?php mysqli_free_result($subject_set); ?>
                </div>
              </div>
        </div>
      </div>
    </div>
  </section>

<?php include(SHARED_PATH . '/staff_footer.php') ?>
