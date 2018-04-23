<?php
  function url_for($script_path)
  {
      // add the leading '/' if not present
      if ($script_path[0] != '/') {
          $script_path = "/" . $script_path;
      }
      return WWW_ROOT . $script_path;
  }

  function u($string = "")
  {
      return urlencode($string);
  }
  function raw_u($string = "")
  {
      return rawurlencode($string);
  }

  function h($string = "")
  {
      return htmlspecialchars($string);
  }

  function error_404()
  {
      header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
      exit();
  }

  function error_500()
  {
      header($_SERVER['SERVER_PROTOCOL'] . " 500 Internal Server Error");
      exit();
  }

  function redirect_to($location)
  {
      header("Location: " . $location);
      exit();
  }

  function is_post_request()
  {
      return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function is_GET_request()
  {
      return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  function display_errors($errors=[])
  {
      $output = '';
      if (!empty($errors)) {
          $output .= "<div class=\"alert alert-danger alert-dismissible fade show\">";
          $output .= "Please fix the following errors:";
          $output .= "<ul>";
          foreach ($errors as $error) {
              $output .= "<li>" . h($error) . "</li>";
          }
          $output .= "</ul>";
          $output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" >&times;</button>";
          $output .= "</div>";
      }
      return $output;
  }
  //
  // function form_errors($errors=array()) {
	// 	$output = "";
	// 	if (!empty($errors)) {
	// 	$output .= "<div class=\"alert alert-danger alert-dismissible fade show\">";
	// 	$output .= "<ul>";
	// 	foreach ($errors as $key => $error) {
	// 		$output .= "<li>";
	// 			$output .= htmlentities($error);
	// 			$output .= "</li>";
	// 	}
	// 	$output .= "</ul>";
	// 	$output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" >&times;</button>";
	// 	$output .= "</div>";
	// 	}
	// 	return $output;
	// }


?>
