<?php
function demo($val1){
    // return $arr=array("value"=>$val,"value1"=>$val1);
    // print_r($val) . "<br>";
    // $val1 = ["address1"=>"Balkot","address2"=>"Bhaktapur"];
    // $val2 = ["address3"=>"Kathmandu","address4"=>"Nepal"];
    // $val3 = $val1;
    // $val3 = array_merge($val1,["menu name cannot be empty","menu name must be between 2 and 255 characters"]);
    // $val3 = array_merge($val3,["Password can't be empty"]);
    // $val3 = ["Passwords don't match"];

    // $val6 = array_merge($val1,$val2);

    // return $val3;
    // return $val;

}
$name=["firstname"=>"Prakash","lastname"=>"Poudel"];
// $arr_rec=demo($name);
// print_r($arr_rec);
// echo $arr_rec["address4"];
// echo $arr_rec[1];
// echo $arr_rec[2];
// echo $arr_rec[3];

$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$current_host = "$_SERVER[HTTP_HOST]";
$current_uri = "$_SERVER[REQUEST_URI]";
// echo "current_link: " . $current_link . "<br>current_host: " . $current_host . "<br>current_uri: " . $current_uri;


$a = 'Howareyou?';

if (strpos($a, 'are') !== false) {
    echo 'true';
}
?>
