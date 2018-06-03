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


<div id="hero-image">
  <img src="images/homepage_assets/world_in_hands_900px.png" width="900" height="200" alt="" class="rounded img-fluid mx-auto d-block"/>
</div>

<div class="mt-3" id="content">

  <h4>At Globe Bank, we have the products and customer service to back up our "worldly" claims. Give us a try, and you'll see we stand by our values and our customers.</h4>

  <div class="mt-5" id="service-blocks">
    <div class="service">
      <img src="images/homepage_assets/family_buying_home_L30707.jpg" width="250" height="166" alt="Family in front of sold home" class="img-fluid img-thumbnail d-block"/>
      <h5>Buying a home?</h5>
      <p>There's no place like home, and there's no home loan like Globe's.</p>
      <p><a href="#" class="learnmore">Learn More...</a> </p>
    </div>

    <div class="mt-5" class="service">
      <img src="images/homepage_assets/father_daughter_finances_L30717.jpg" width="250" height="166" alt="Father and daughter discussing finances" class="img-fluid img-thumbnail d-block"/>
      <h5>Saving for a rainy day?</h5>
      <p>Let our financial experts help you commit to a savings plan and schedule that works for you.</p>
      <p><a href="#" class="learnmore">Learn More...</a> </p>
    </div>

    <div class="mt-5" class="service">
      <img src="images/homepage_assets/owner_salon_L30714.jpg" width="250" height="166" alt="Small business owner" class="img-fluid img-thumbnail d-block"/>
      <h5>Starting a business?</h5>
      <p>From small business loans to merchant accounts, our service are designed to help your small business thrive.</p>
      <p><a href="#" class="learnmore">Learn More...</a> </p>
    </div>
  </div>

</div>

