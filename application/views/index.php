<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPEKONV</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/purple/vendors/iconfonts/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/purple/vendors/css/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/purple/css/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/purple/images/favicon.png') ?>" />
</head>
 
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary auth">
        <div class="row flex-grow">
           <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?php echo base_url('assets/purple/images/amikom.png') ?>">
              </div>
              <center>
              	<h4>SPE<b>K</b>ONV</h4>
              	<h6 class="font-weight-light">Silakan log in terlebih dulu.</h6>
              </center>
              <form class="pt-3" action="<?php echo base_url('auth/cek_login')?>" method="post"">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOG IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Ingat Saya
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/purple/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?php echo base_url('assets/purple/vendors/js/vendor.bundle.addons.js') ?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/purple/js/off-canvas.js') ?>"></script>
  <script src="<?php echo base_url('assets/purple/js/misc.js') ?>"></script>
  <!-- endinject -->
</body>

</html>
