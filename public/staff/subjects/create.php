<?php
require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Handle form values sent by new_subject.php

    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if($result === true){
      $_SESSION['info'] = "Subject created successfully";
      $new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
      redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
    } else{
      $_SESSION['errors'] = $errors;
      $_SESSION['form'] = 'submit_subject';

      // to repopulate the form
      $_SESSION['menu_name'] = $_POST['menu_name'] ?? '';
      $_SESSION['position'] = $_POST['position'] ?? '';
      $_SESSION['visible'] = $_POST['visible'] ?? '';

      redirect_to(url_for('/staff/subjects/index.php'));
    }
} else {
    redirect_to(url_for('/staff/subjects/index.php'));
}
