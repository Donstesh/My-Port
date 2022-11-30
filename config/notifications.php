<?php if(isset($errors)):?>
  <?php foreach($errors as $error): ?>
  <script>
    toastr.error('<?php echo clean($error); ?>')
  </script>
  <?php endforeach; ?>
<?php endif; ?>
<?php if(isset($_SESSION["success"])):?>
  <script>
    toastr.success('<?php echo clean($_SESSION["success"]); ?>')
  </script>
<?php unset($_SESSION["success"]); ?>
<?php endif; ?>
<?php if(isset($_SESSION["error"])):?>
  <script>
    toastr.error('<?php echo clean($_SESSION["error"]); ?>')
  </script>
<?php unset($_SESSION["error"]); ?>
<?php endif; ?>