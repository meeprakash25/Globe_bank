<?php
require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Handle form values sent by new.php

    $page = [];
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['content'] = $_POST['content'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';

    $result = insert_page($page);
    if($result === true){
      $new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
      redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
    }else{
      $_SESSION['errors'] = $errors;
      $_SESSION['form'] = 'submit_page';

      // to repopulate the form
      $_SESSION['subject_id'] = $_POST['subject_id'] ?? '';
      $_SESSION['menu_name'] = $_POST['menu_name'] ?? '';
      $_SESSION['content'] = $_POST['content'] ?? '';
      $_SESSION['position'] = $_POST['position'] ?? '';
      $_SESSION['visible'] = $_POST['visible'] ?? '';

      redirect_to(url_for('/staff/pages/index.php'));
    }
} else {
    redirect_to(url_for('/staff/pages/index.php'));
}
