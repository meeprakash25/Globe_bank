<?php
session_start();
  $errors = [];
  $info = '';
// function session_message()
// {
//     if (isset($_SESSION["session_message"])) {
//         $output = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">";
//         $output .= htmlentities($_SESSION["session_message"]);
//         $output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\"> <span aria-hidden=\"true\">&times;</span></button>";
//         $output .= "</div>";
//         $msg = "<script>console.log(";
//         $msg .= $_SESSION["session_message"];
//         $msg .= ")</script>";
//         echo $msg;
//         //display only once, dissappears on reload
//         $_SESSION["session_message"] = null;
//
//         return $output;
//     }
// }
//
function errors()
{
    global $errors;
    if (isset($_SESSION["errors"])) {
      // global $errors;
        $errors = $_SESSION["errors"];
        //display only once, dissappears on reload
        $_SESSION["errors"] = null;

    }
}
function info()
{
    if (isset($_SESSION["info"])) {
      // global $infos;
        $info = $_SESSION["info"];
        //display only once, dissappears on reload
        $_SESSION["info"] = null;
        return $info;
    }
}

?>
