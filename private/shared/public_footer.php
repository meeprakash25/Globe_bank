    <div class="footer footer-copyright py-3 mt-3 text-center">
      &copy; <?php echo Date("Y"); ?>, <a href="<?php echo url_for('/index.php'); ?>">Globe Bank</a>
    </div>

    <script src="<?php echo url_for('javascripts/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/popper.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo url_for('javascripts/fontawesome-all.js'); ?>"></script>
  </body>
</html>

<?php
  db_disconnect($db);
?>
