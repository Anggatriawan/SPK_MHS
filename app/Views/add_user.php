<?= $this->extend('layout/default') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php
$err = session()->getFlashdata('validation');
?>


<?php
//tampilkan pesan success


if (session()->getFlashdata('success')) {
    echo '<div class="my-2">
            <div class="alert alert-success alert-dismissible">' . session()->getFlashdata('success') . '</div>
            </div>';
}

//tampilkan pesan failed
if (session()->getFlashdata('failed')) {
    echo '<div class="my-2">
            <div class="alert alert-danger alert-message ">' . session()->getFlashdata('failed') . '</div>
            </div>';
}
?>
          <!-- Content Wrapper. Contains page content -->

          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

    <section class="content-header">
      <h1>
        Input Data Use
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input Data User</li>
      </ol>
    </section>



          <!-- Content Wrapper. Contains page content -->

 <!-- Main content -->
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
               
                <?= form_open('user/add'); ?>
                 <div class="form-group">
                <label for="Jurusan">Username</label>
                <input type="text" class="form-control <?= (isset($err['user'])) ? 'is-invalid' : ''; ?>" id="user" name="user" value="<?= old('user'); ?>" placeholder="Username..." required>
        <div class="invalid-feedback">
            <?= (isset($err['user'])) ? $err['user'] : ''; ?>
        </div>
                </div>
                
                <div class="form-group">
                  <label>Nama </label>
                  <input type="text" class="form-control <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Fullname..." required>
        <div class="invalid-feedback">
            <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>
        </div>
                </div>
                
              <div class="form-group">
                <label for="Semester">Password</label>
                <input type="password" class="form-control <?= (isset($err['password'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password..." required>
                <div class="invalid-feedback">
                <?= (isset($err['password'])) ? $err['password'] : ''; ?>
               </div>
                </div>

                <div class="form-group">
                  <label>Select</label>
                  <select name="role" id="role" class="form-control" required>
            <option value="" disabled selected>Pilih Role User</option>
            <option value="admin" <?= (old('role') == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?= (old('role') == 'user') ? 'selected' : ''; ?>>User</option>
        </select>
                </div>
 
       </div>  
   

       <div class="box-footer">
              <button type="submit" name="Submit" value="Submit" class="btn btn-success">Simpan Data</button>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
              </div>
       </div>  
       </div>  
     
          <!-- /.box -->
   
 </section>

 <?= form_close(); ?>
 <?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>
<!-- FastClick -->
<!-- AdminLTE App -->
<?= $this->endSection(); ?>
    