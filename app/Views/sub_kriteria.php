<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
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
            echo '<form action="' . session()->getFlashdata('url_update') . '" method="POST" id="form-sub-kriteria">';
        } else {
            echo '<h5 id="form-header">Tambah Data</h5>';
            echo '<form action="' . base_url('sub-kriteria') . '" method="POST" id="form-sub-kriteria">';
        }
        ?>
        
        
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


          <!-- Content Wrapper. Contains page content -->
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
            <label for="kriteria" class="py-2"> Kriteria</label>
            <select name="kriteria" id="kriteria" class="form-control form-control-sm <?= (isset($err['kriteria'])) ? 'is-invalid' : ''; ?>" required>
                <option value="" disabled selected>Pilih kriteria</option>
                <?php
                foreach ($kriteria as $k) {
                    $pilih = (old('kriteria') == $k['id_kriteria']) ? 'selected' : '';
                    echo '<option value="' . $k['id_kriteria'] . '" ' . $pilih . '>' . $k['judul_kriteria'] . '</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?= (isset($err['kriteria'])) ? $err['kriteria'] : ''; ?>
            </div>
        </div>

        <div class="form-group">
                <label for="judul" class="py-2">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control form-control-sm <?= (isset($err['nilai'])) ? 'is-invalid' : ''; ?>" placeholder="Nilai" step="0.01" required value="<?= old('nilai'); ?>">
            <div class="invalid-feedback">
                <?= (isset($err['nilai'])) ? $err['nilai'] : ''; ?>
            </div>
        </div>

        <div class="form-group">
                <label for="judul" class="py-2">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control form-control-sm <?= (isset($err['keterangan'])) ? 'is-invalid' : ''; ?>" placeholder="Keterangan Sub Kriteria" required value="<?= old('keterangan'); ?>">
            <div class="invalid-feedback">
                <?= (isset($err['keterangan'])) ? $err['keterangan'] : ''; ?>
            </div>
        </div>

        <div class="form-group my-1 py-2 text-end">
            <button type="submit" name="Submit" value="Submit" class="btn btn-sm btn-success">
                Simpan Data
            </button>
        </div>

    </div>
    </div>
    </div>

     <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Sub Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal">
              <div class="box-body">
              <h5>List Sub Kriteria</h5>
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
</div>
</form>
        
        </div>
   
   </form>

 </div>
<!-- /.box -->
</section>
<?= $this->endSection(); ?>
