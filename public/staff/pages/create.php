<?php 
require_once('../../../private/initialize.php');

if(is_post_request()){

  
  $menu_name = $_POST['menu_name'] ?? '';
  $body = $_POST['body'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';
  
  echo "Form parameters <br>";
  echo "Menu name: " . $menu_name . "<br>";
  echo "Body: " . $body . "<br>";
  echo "Position: " . $position . "<br>";
  echo "Visible: " . $visible . "<br>";
}else{
  header('Location:  javascript://history.go(-1)');
  // redirect_to(url_for('/staff/subjects/index.php'));
}
  
?>