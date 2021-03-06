<?php require_once('../private/initialize.php') ?>

<?php
//default values to prevent errors
  $page_id = $page_id ?? '';
  $subject_id = $subject_id ?? '';
  $page_title = $page['menu_name'] ?? '';
  $visible = $visible ?? true;
?>
<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(!empty($page_title)) { echo '- ' . h($page_title); } ?>
    <?php if(isset($preview) && $preview){ echo ' [PREVIEW]'; } ?></title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.min.css'); ?>" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/google-fonts.css') ?>" media="all">
    <!-- <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script> -->
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

    <style>
    .dropdown:hover .dropdown-menu {
      display: block;
    }
    .dropdown .dropdown-toggle:active {
      /*Without this, clicking will make it sticky*/
      pointer-events: none;
    }
    .dropdown-toggle:after { content: none; }
    </style>

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

          <?php $nav_subjects = find_all_subjects(['visible' => $visible]); // $visible = true; declared at the top ?>

          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="btn text-left nav-link" href="<?php //echo url_for('/index.php'); ?>">Home<span class="sr-only">(current)</span></a>
            </li> -->

            <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)) { ?>
            <li class="nav-item">
              <div class="dropdown show">
                <a class="text-left p-2 rounded btn-block dropdown-toggle <?php if($nav_subject['id'] == $subject_id) { echo "subject-selected"; } ?>" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo h($nav_subject['menu_name']); ?>
                </a>
                <?php $nav_pages = find_pages_by_subject_id($nav_subject['id'], ['visible' => $visible]); // $visible = true; declared at the top?>
                <div class="dropdown-menu dropdown-menu-left m-0" aria-labelledby="dropdownMenuLink">

                  <?php while($nav_page = mysqli_fetch_assoc($nav_pages)) { ?>
                      <a class="dropdown-item <?php if($nav_page['id'] == $page_id) { echo "page-selected"; } ?>" href="<?php echo url_for('/index.php?id=' . h(u($nav_page['id']))); ?>">
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

    <header class="" id="header">
      <div class="container">
        <div class="row">
          <div class="col-8">
              <a style="display:inline-block;" href="<?php echo url_for('/index.php'); ?>">
                <img class="img-fluid d-block" src="<?php echo url_for('/images/gbi_logo.png'); ?>" width="250" alt="" />
              </a>
          </div>

          <div class="col-4 text-right">

          </div>

        </div>
      </div>
    </header>
