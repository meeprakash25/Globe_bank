          <!--Modals create models are placed in shared folder so that they can be accessed from any of the pages-->
        <div class="my-models">        
          <!-- include('<?php echo url_for('/includes/newSubject.php'); ?>') -->
          <?php include(SHARED_PATH . '/new_subject.php') ?>
          <?php include(SHARED_PATH . '/new_page.php') ?>
          <?php include(SHARED_PATH . '/new_admin.php') ?> 
        </div>

        <script>
          CKEDITOR.replace( 'content' );
        </script>
        
      </div>
      <div class="footer footer-copyright py-3 text-center">
        &copy; <?php echo Date("Y"); ?>, <a href="<?php echo url_for('/staff/index.php'); ?>">Globe Bank</a>
      </div>

      

    <script src="<?php echo url_for('javascripts/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/popper.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/fontawesome-all.js'); ?>"></script>
  </body>
</html>

<?php db_disconnect($db); ?>