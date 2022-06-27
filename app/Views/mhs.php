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
        ?>
          <!-- Content Wrapper. Contains page content -->


          <section class="content-header">
      <h1>
       Data Mahasiswa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Mahasiswa</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
        <div class="box">
            <div class="box-header">      
            <a href="<?= base_url('mhs/add'); ?>" class="btn btn-primary btn-sm">Tambah Mahasiswa</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nim</td>
                                    <td>Nama</td>
                                    <td>Tempat Lahir</td>
                                    <td>Tgl Lahir</td>
                                    <td>Email</td>
                                    <td>Jurusan</td>
                                    <td>Alamat</td>
                                    <td>Semester</td>
                                    <td>Status</td>
                                    <td>action</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <?= $this->section('js'); ?>
    
    <?= $this->endSection(); ?>

  <!-- /.content-wrapper -->
<?= $this->endSection(); ?>
