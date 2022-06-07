<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
<?= $this->endSection(); ?>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?= $this->section('content'); ?>

<?php
$err = session()->getFlashdata('validation');
?>


        <?php
        //tampilkan pesan success
        if (session()->getFlashdata('success')) {
            echo '<div class="my-2">
            <div class="alert alert-success alert-message ">' . session()->getFlashdata('success') . '</div>
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


    <section class="content-header">
      <h1>
        Input Data Kriteria
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input Data Kriteria</li>
      </ol>
    </section>
    



          <!-- Content Wrapper. Contains page content -->

 <!-- Main content -->
  <!-- Main content -->
  <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
         
                <div class="form-group">
                <label for="kode" class="py-2">Kode Kriteria</label>
            <input type="text" name="kode" id="kode" class="form-control form-control-sm <?= (isset($err['kode'])) ? 'is-invalid' : ''; ?>" placeholder="Kode Kriteria..." value="<?= old('kode'); ?>" required>
            <div class="invalid-feedback">
                <?= (isset($err['kode'])) ? $err['kode'] : ''; ?>
            </div>
                </div>
                
                <div class="form-group">
                <label for="judul" class="py-2">Judul Kriteria</label>
            <input type="text" name="judul" id="judul" class="form-control form-control-sm <?= (isset($err['judul'])) ? 'is-invalid' : ''; ?>" placeholder="Judul Kriteria..." value="<?= old('judul'); ?>" required>
            <div class="invalid-feedback">
                <?= (isset($err['judul'])) ? $err['judul'] : ''; ?>
            </div>
                </div>

                <div class="form-group">
            <label for="sifat" class="py-2">Sifat Kriteria</label>
            <select name="sifat" id="sifat" class="form-control form-control-sm <?= (isset($err['sifat'])) ? 'is-invalid' : ''; ?>">
                <option value="" disabled selected>Pilih Sifat Kriteria</option>
                <option value="cost" <?= (old('sifat') == 'cost') ? 'selected' : ''; ?>>Cost</option>
                <option value="benefit" <?= (old('sifat') == 'benefit') ? 'selected' : ''; ?>>Benefit</option>
            </select>
            <div class="invalid-feedback">
                <?= (isset($err['sifat'])) ? $err['sifat'] : ''; ?>
            </div>
        </div>
                
         </div>
                <div class="box-footer">
              <button type="submit" name="Submit" value="Submit" class="btn btn-success">Simpan Data</button>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
              </div>
       </div>  
       
       </div>  
     
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal">
              <div class="box-body">
              <h5>List Kriteria</h5>
              <table id="table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="min-width: 50px;">No.</th>
                        <th style="min-width: 100;">Kode Kriteria</th>
                        <th style="min-width: 200;">Judul Kriteria</th>
                        <th style="min-width: 100;">Sifat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
             </form>
                  </div>
             </form>
           </div>
          <!-- /.box -->

 </section>
 <?= $this->endSection(); ?>
<!-- page script -->
