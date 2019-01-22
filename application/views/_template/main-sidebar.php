
<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="<?php echo base_url('assets/adminlte/dist/img/user7-128x128.jpg') ?>" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p><?php echo $username; ?></p>
    <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
  </div>
</div>
<!-- search form -->
<form action="#" method="get" class="sidebar-form">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
  </div>
</form>
<!-- /.search form -->

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <?php if($this->session->userdata('level')=='ptgs'):?>
    <li class="<?php if($this->uri->segment(1)=="petugas"){echo "active";}?>"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="header">SET UP SISTEM</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-gears"></i> <span>Set up Sistem</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-calendar"></i> Tahun Ajar</a></li>
        <li><a href="#"><i class="fa fa-database"></i> Mata Kuliah Amikom</a></li>
        <li><a href="#"><i class="fa fa-key"></i> Set up AHP</a></li>
      </ul>
    </li>
    <li class="header">FITUR UTAMA</li>
    <li><a href="<?php echo base_url('data_mhs'); ?>"><i class="fa fa-users"></i> <span>Kelola Data Mahasiswa</span></a></li>
    <li class="treeview">
      <a href="">
        <i class="fa fa-files-o"></i><span>Konversi Mata Kuliah</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href=""><i class="fa fa-calculator"></i> 
          <span>Hitung Konversi</span>
          <span class="pull-right-container">
            <span class="label pull-right bg-green">new</span>
          </span>
        </a></li>
        <li><a href=""><i class="fa fa-list-alt"></i> Pilih Mata Kuliah</a></li>
        <li><a href=""><i class="fa fa-check"></i> Acc Hasil Konversi</a></li>
      </ul>
    </li>
    <li><a href=""><i class="fa fa-book"></i> <span>Laporan</span></a></li>
    
    <?php elseif($this->session->userdata('level')=='mhs'):?>
    <li class="<?php if($this->uri->segment(1)=="mahasiswa"){echo "active";}?>"><a href="<?php echo base_url('mahasiswa'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="header">Kelengkapan Data</li>
        <li class=""><a href="<?php echo base_url('mahasiswa'); ?>"><i class="fa fa-user-o"></i> Data Mahasiswa</a></li>
        <li class=""><a href="<?php echo base_url('mhs_c/transkrip'); ?>"><i class="fa fa-folder"></i> Data Transkrip D3</a></li>
    <li class="header">Hasil Konversi</li>
      <li class=""><a href=""><i class="fa fa-check"></i> Acc Hasil Konversi</a></li>
      <li class=""><a href=""><i class="fa fa-print"></i> Cetak Hasil Konversi</a></li>
    <?php endif;?>
</ul>
