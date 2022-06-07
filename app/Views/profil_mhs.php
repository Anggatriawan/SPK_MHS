<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<?= $this->endSection(); ?>

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
        Profil Mahasiswa <a >Status  : <?=getUserMhs1()->status ?></a>
        <hr>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
<section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

        <h3 class="profile-username text-center"><?=getUserMhs1()->nama_mhs ?></h3>

        <p class="text-muted text-center"><?=getUserMhs1()->jurusan_mhs ?></p>
      

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b> Tempat Lahir : <?=getUserMhs1()->tempat_lahir ?> </b> <a class="pull-right"></a>
          </li>
          <li class="list-group-item">
            <b>Tanggal Lahir : <?=getUserMhs1()->tgl_lahir ?></b> <a class="pull-right"></a>
          </li>
          <li class="list-group-item">
            <b>e-Mail : <?=getUserMhs1()->email ?></b> <a class="pull-right"></a>
          </li>
          <li class="list-group-item">
            <b>Alamat : <?=getUserMhs1()->alamat ?></b> <a class="pull-right"></a>
          </li>
         
        </ul>
      
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Prestasi </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Nilai IPK  : <?=getUserMhs1()->ipk ?></strong>
        <p class="text-muted">
        </p>
        <hr>
        <strong><i class="fa fa-book margin-r-5"></i> Pengabdian Masyarakat  : <?=getUserMhs1()->pengabdian_masyarakat ?></strong>
        <p class="text-muted">
       
        <hr>
        <strong><i class="fa fa-book margin-r-5"></i> organisasi  : <?=getUserMhs1()->organisasi ?></strong>
        <hr>
          
       


      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <?= form_open_multipart(base_url('mhs/ajax-list')); ?>

          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>nama Prestasi</th>
                  <th>keterangan</th>
                  <th>Download File</th>

                </tr>
              
                <tr>
                  <td>1</td>
                  <td> </td>
                  <td> </td>
                  <td><button type="button" class="fa fa-download btn btn-primary btn-lm"> download file </button></td>

                </tr>
                <tr>
                  <td>2</td>
                  <td> </td>
                  <td> </td>
                  <td><button type="button" class="fa fa-download btn btn-primary btn-lm"> download file </button></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td> </td>
                  <td> </td>
                  <td><button type="button" class="fa fa-download btn btn-primary btn-lm"> download file </button></td>
                </tr>
              </table>
            </div>
          <!-- /.post -->

          <!-- Post -->
       
          

        
          </div>
          <!-- /.post -->

          <!-- Post -->
       
          <!-- /.post -->
        </div>
        <!-- /.tab-pane -->
     
        <!-- /.tab-pane -->

     
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->

  <!-- /.content-wrapper -->

  <?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>
<script src="<?= base_url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
 <script src="<?= base_url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?= $this->endSection(); ?>
    
