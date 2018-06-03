<?php require_once('../private/initialize.php'); ?>

<?php

if(is_post_request()) {
  // Form was submitted
  $language = $_POST['language'] ?? 'Default';
  $expire = time() + 60*60*24*365;
  setcookie('language', $language, $expire);

} else {
  // Read the stored value (if Default)
  $language = $_COOKIE['language'] ?? 'Default';
}

?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">

    <div class="container text-center py-5" id="content">
      <div class="card">
        <div class="card-header">
      <h4>Set Language Preference</h4>
</div>
<div class="card-body">
      <p>The currently selected language is: <?php echo $language; ?></p>

      <form action="<?php echo url_for('/language.php'); ?>" method="post">
        <div class="form-group">
          <label for="languageSelect"></label>
        <select class="form-control mx-auto" id="languageSelect" name="language" style="width:50%;">
          <?php
            $language_choices = ['Default', 'English', 'Spanish', 'French', 'German'];
            foreach($language_choices as $language_choice) {
              echo "<option value=\"{$language_choice}\"";
              if($language == $language_choice) {
                echo " selected";
              }
              echo ">{$language_choice}</option>";
            }
          ?>
        </select>
      </div>
        <br />
        <br />
        <button type="submit" class="btn btn-primary mb-2" >Set Preference</button>
      </form>
      </div>
    </div>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
