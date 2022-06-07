<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
<?= $this->endSection(); ?>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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

        if (session()->getFlashdata('url_update')) {
            echo '<h5 id="form-header">Update Data</h5>';
            echo '<form action="' . session()->getFlashdata('url_update') . '" method="POST" id="form-alternative">';
        } else {
            echo '<h5 id="form-header">Tambah Data</h5>';
            echo '<form action="' . base_url('alternative') . '" method="POST" id="form-alternative">';
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

    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        
 <!-- Main content -->
  <!-- Main content -->
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
            <label for="kode" class="py-2">Kode Alternative</label>
            <input type="text" name="kode" id="kode" class="form-control form-control-sm <?= (isset($err['kode'])) ? 'is-invalid' : ''; ?>" placeholder="Kode Alternative..." value="<?= old('kode'); ?>" required>
            <div class="invalid-feedback">
                <?= (isset($err['kode'])) ? $err['kode'] : ''; ?>
            </div>
        </div>

              <div class="form-group">
                <label for="kode" class="py-2">Nama Alternatif</label>
            <input type="text" name="nama" id="nama" class="form-control form-control-sm <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" placeholder="Nama Alternative..." value="<?= old('nama'); ?>" required>
            <div class="invalid-feedback">
                <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>
            </div>
        </div>


        <div class="form-group my-1 py-2 text-end">
            <button type="submit" name="Submit" value="Submit" class="btn btn-sm btn-success">
                Simpan Data
            </button>
        </div>
    </div>
    </div></div>
  
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
                        <th style="min-width: 150px;">Kode Alternative</th>
                        <th style="min-width: 200px;">Nama Alternative</th>
                        <th style="max-width: 150px;">Action</th>
                        </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        
              <!-- /.box-body -->

        
             
             </form>
        
                  </div>
             
             </form>

           </div>
          <!-- /.box -->

 </section>
 <?= $this->endSection(); ?>

    
