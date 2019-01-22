<!DOCTYPE html>
<html>
<head>
  <?php echo $head; ?>
</head>
<body class="hold-transition sidebar-mini skin-purple fixed">
<div class="wrapper">
  <!-- header -->
  <header class="main-header">
    <?php echo $header; ?>
  </header>
  
  <!-- sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php echo $sidebar; ?>
    </section>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $pageTitle; ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $content; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- main-footer -->
  <footer class="main-footer">
    <?php echo $footer; ?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- js -->
<?php echo $js; ?>
</body>
</html>
