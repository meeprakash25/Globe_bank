<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>


      <div class="col-md-9">
          <div class="card">
              <div class="card-header main-color-bg">Website Overview</div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card dash-card">
                            <div class="card-body">
                                <h3><i class="fas fa-user"></i> 5</h3>
                                <h4>Admins</h4>

                            </div>
                        </div>
                      </div>
                    <div class="col-md-3">
                        <div class="card dash-card">
                            <div class="card-body">
                                <h3><i class="fas fa-list-alt"></i> 50</h3>
                                <h4>Subjects</h4>

                            </div>
                        </div>
                      </div>
                    <div class="col-md-3">
                        <div class="card dash-card">
                            <div class="card-body">
                                <h3><i class="fas fa-pencil-alt"></i> 250</h3>
                                <h4>Pages</h4>

                            </div>
                        </div>
                      </div>
                    <div class="col-md-3">
                        <div class="card dash-card">
                            <div class="card-body">
                                <h3><i class="fas fa-chart-bar"></i> 1000</h3>
                                <h4>Visitors</h4>

                            </div>
                        </div>
                      </div>
                </div>
              </div>

          </div> <!-- end of first card -->
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-table">
                      <div class="card-header main-color-bg">Latest Users</div>
                      <div class="card-body">
                          <table class="table table-striped table-hover">
                              <tr>
                                <th class="hide-name">Name</th>
                                <th>Email</th>
                                <th>Joined</th>
                              </tr>
                              <tr>
                                <td class="hide-name">Jill Smith</td>
                                <td>jillsmith@gmail.com</td>
                                <td>3-15-2018</td>
                              </tr>
                              <tr>
                                <td class="hide-name">Prakash Poudel</td>
                                <td>mee.prakash25@gmail.com</td>
                                <td>3-10-2018</td>
                              </tr>
                              <tr>
                                <td class="hide-name">Dipendra Dahal</td>
                                <td>dipendra@gmail.com</td>
                                <td>3-1-2018</td>
                              </tr>
                              <tr>
                                <td class="hide-name">Ujjwol Poudel</td>
                                <td>ujp@hotmail.com</td>
                                <td>2-29-2018</td>
                              </tr>
                              <tr>
                                <td class="hide-name">Anjila Poudel</td>
                                <td>anjila@yahoo.com</td>
                                <td>2-28-2018</td>
                              </tr>
                            </table>

                      </div>
                  </div>
              </div>
            </div>

      </div>
    </div>
  </div>
</section>

    <?php include(SHARED_PATH . '/staff_footer.php') ?>
