<?php require_once('../private/initialize.php'); ?>

<?php
  // for preview mode
  $preview = false;
  if(isset($_GET['preview'])){
    // previewing will require admin to be loggen in
    $preview = $_GET['preview'] == 'true' ? true : false;
  }
  $visible = !$preview;

  if(isset($_GET['id'])) {
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id, ['visible'=>$visible]);
    if(!$page){
      redirect_to(url_for('/index.php'));//if page is not visible, redirect to index.php
    }
    $subject_id = $page['subject_id'];
    $subject = find_subject_by_id($subject_id, ['visible'=>$visible]);
    if(!$subject){
      redirect_to(url_for('/index.php'));//if subject of the requested page is not visible, donot show the page but instead redirect to index.php
    }
  } else {
    //nothing selected; show the homepage
  }
?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

  <div class="container mt-3" id="page">

    <?php if (isset($page)) {
            //show the page from the database
            $allowed_tags = '<div>,<img>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<p>,<br>,<strong>,<em>,<ul>,<li>';
            echo strip_tags($page['content'], $allowed_tags);
          } else {
            include(SHARED_PATH . '/static_homepage.php');
          }
    ?>

  </div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
