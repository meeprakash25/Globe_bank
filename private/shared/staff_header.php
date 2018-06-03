<?php if (!isset($page_title)) {
    $page_title = '';
}
?>
<!doctype html>

<html lang="en">
  <head>
    <title>GBI Staff - <?php echo $page_title; ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.min.css'); ?>" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/google-fonts.css') ?>" media="all">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css') ?>" media="all">
    <!-- <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script> -->

     <!-- if session errors are set show the form modal again -->
    <?php if (isset($_SESSION['errors'])) {; ?>
    <?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_subject')) {; ?>
      <script type="text/javascript">
          <?php echo "window.onload = function(){ document.getElementById(\"subject\").click(); }"; ?>
      </script>

    <?php } elseif ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_page')) {; ?>
      <script type="text/javascript">
          <?php echo "window.onload = function(){ document.getElementById(\"page\").click(); }"; ?>
      </script>
    <?php } ?>
    <?php } ?>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-custom py-0 sticky-top" id="my-navbar">
      <div class="container">
        <a class="navbar-brand" href="<?php echo url_for('/staff/index.php'); ?>">
          <img src="<?php echo url_for('/images/globebank02.png'); ?>" width="20" height="20" alt="">
          Globe Bank
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
        aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span>
          <i class="fa fa-bars"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <!-- Links -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php echo url_for('/staff/index.php'); ?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a>
            </li>
            <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a>
            </li>
            <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a>
            </li>
            <li class="nav-item">
              <!-- <div class="dropdown show">
                <a class="text-left py-2 rounded btn-block dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown link
                </a>

                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="index.php">Action1</a>
                  <a class="dropdown-item" href="index.php">Action1</a>
                  <a class="dropdown-item" href="index.php">Action3</a>
                </div>
              </div> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>


  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h4><i class="fas fa-cog"> </i> <?php echo $page_title; ?> <small><h6>Manage
                <?php if ($page_title == 'Staff Menu') {
                    echo "Your Website";
                  } else {
                    echo $page_title;
                  }?>
           </h6></small></h4>
          </div>
          <div class="col-4 text-right">
            <div class="dropdown show">
              <a class="btn btn-sm dropdown-toggle" href="" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Create
              </a>

              <div class="dropdown-menu dropdown-menu-right px-1"  id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" id="subject" data-toggle="modal" href="#add-subject">Create Subject</a>
                <a class="dropdown-item" id="page" data-toggle="modal" href="#add-page">Create Page</a>
                <a class="dropdown-item" id="admin" data-toggle="modal" data-target="#add-dmin" href="#addAdmin">Create Admin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>


    <div class="container content">

<!-- staff top bar and sidebar contents -->
      <section class="breadcrumb" id="breadcrumb">
          <div class="container">
              <div class="row">
                <div class="col-4 col-sm-5 col-md-6 col-lg-8">
                  <?php echo h($page_title); ?>
                </div>
                <div class="col-8 col-sm-7 col-md-6 col-lg-4">
                  <?php
                    echo display_info(info());
                  ?>
                </div>

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
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-list"></i> Subjects <span class="badge badge-pill badge-dark float-right"><?php echo count_all_subjects(); ?></span></a>
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Pages <span class="badge badge-pill badge-dark float-right"><?php echo count_all_pages(); ?></span></a>
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Admins <span class="badge badge-pill badge-dark float-right">5</span></a>
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
