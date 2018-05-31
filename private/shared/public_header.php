<?php require_once('../private/initialize.php') ?>

<?php
//default values to prevent errors
  $page_id = $page_id ?? '';
  $subject_id = $subject_id ?? '';
  $page_title = $page['menu_name'] ?? '';
?>
<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(!empty($page_title)) { echo '- ' . $page_title; } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.min.css'); ?>" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/google-fonts.css') ?>" media="all">
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-custom py-0 sticky-top" id="my-navbar">
      <div class="container">
        <a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>">
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
          <!-- Nav items -->

          <?php $nav_subjects = find_all_visible_subjects(); ?>

          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php //echo url_for('/index.php'); ?>">Home<span class="sr-only">(current)</span></a>
            </li> -->

            <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)){ ?>
            <li class="nav-item">
              <div class="dropdown show">
                <a class="text-left p-2 rounded btn-block dropdown-toggle <?php if($nav_subject['id'] == $subject_id) { echo "selected"; } ?>" href="<?php echo url_for('/index.php'); ?>" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo h($nav_subject['menu_name']); ?>
                </a>
                <?php $nav_pages = find_pages_by_subject_id($nav_subject['id']); ?>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">

                  <?php while($nav_page = mysqli_fetch_assoc($nav_pages)){ ?>
                      <a class="dropdown-item <?php if($nav_page['id'] == $page_id) { echo "selected"; } ?>" href="<?php echo url_for('/index.php?id=' . h(u($nav_page['id']))); ?>">
                        <?php echo h($nav_page['menu_name']); ?>
                      </a>
                  <?php } // while nav_pages ?>
                  <?php mysqli_free_result($nav_pages); ?>
                </div>
              </div>
            </li>

          <?php } // while nav_subjects ?>

          </ul>

          <?php mysqli_free_result($nav_subjects); ?>

        </div>
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <h1>
              <a href="<?php echo url_for('/index.php'); ?>">
                <img src="<?php echo url_for('/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
              </a>
            </h1>
          </div>

          <div class="col-4 text-right">

          </div>

        </div>
      </div>
    </header>
