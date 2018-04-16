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


<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active"><?php echo h($page_title); ?></li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container content-main">
    <div class="row">
      <div class="col-md-3">
          <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active  main-color-bg">
                <i class="fas fa-cog"></i> Dashboard
              </a>
              <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-list"></i> Subjects <span class="badge">20</span></a>
              <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Pages <span class="badge">40</span></a>
              <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Admins <span class="badge">5</span></a>
            </div>
            <div class="stats">
            <div class="well">
              <h5>Disk space used</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
                  </div>
            </div>
            <div class="well">
              <h5>Bandwidth used</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                  </div>
            </div>
          </div>
      </div>

      <div class="col-md-9">
            <div class="card">
                <div class="card-header main-color-bg">Subjects</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                          <th class="hide-id">ID</th>
                          <th>Position</th>
                          <th>Visible</th>
                          <th>Name</th>
                          <th class="hide-btn" colspan="3">Action</th>
                        </tr>

                        <?php foreach($subjects as $subject) { ?>
                          <tr onclick="window.location='<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>';">
                            <td class="hide-id"><?php echo h($subject['id']); ?></td>
                            <td><?php echo h($subject['position']); ?></td>
                            <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                            <td><?php echo h($subject['menu_name']); ?></td>
                            <td class="hide-btn"><a class="btn btn-xs" href="<?php echo url_for('/staff/subjects/show.php?page=100&id=' . h(u($subject['id']))); ?>">View</a></td>
                            <td class="hide-btn"><a class="btn btn-xs" href="">Edit</a></td>
                            <td class="hide-btn"><a class="btn btn-xs" href="">Delete</a></td>
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
