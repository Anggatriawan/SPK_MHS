

<?=$this->extend('dashboard') ?>

<?= $this->section('css'); ?>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/skins/_all-skins.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<?php if (session()->get('role') == 'admin') : ?>

<section class="content">
 <!-- Info boxes -->
 <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" >Mahasiswa</span>
              <span class="info-box-number"><?=countData('tbl_mhs')?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-indent"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Alternative</span>
              <span class="info-box-number"><?=countData('tbl_alternative')?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-align-justify"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kriteria</span>
              <span class="info-box-number"><?=countData('tbl_kriteria')?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-refresh"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sub Kriteria</span>
              <span class="info-box-number"><?=countData('tbl_sub_kriteria')?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Pertahun</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong> Informasi Nilai</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>


                  <!-- /.chart-responsive -->
                </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong> -</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">-</span>
                    <span class="progress-number"><b></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">-</span>
                    <span class="progress-number"><b></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">-</span>
                    <span class="progress-number"><b></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">-</span>
                    <span class="progress-number"><b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 col-xs-19">
                <span class="description-text">SISTEM PENDUKUNG KEPUTUSAN </span>
                    <a> di bangun untuk mendukung pengambilan keputusan dalam menentukan mahasiswa berprestasi di Universitas Muhammadiyah Ponorogo </a>
         
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
             
            
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      
      <!-- /.row -->

      <!-- Main row -->
      
      <!-- /.row -->


    


      </section>
      <?php endif; ?>
      <?php if (session()->get('role') != 'admin') : ?>
      <section class="content-header">
      <h1>
        Selamat Datang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Boxed</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 
            <!-- /.box-header -->
            <?php if (session()->get('status') == 'Revision') : ?>
            <div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Data Revisi</h4>
               Silakan perbaiki data dengan klik tombol edit pada menu profil
              </div>
              <?php endif; ?>

              <?php if (session()->get('status') == 'Pending') : ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Data Sedang di Proses</h4>
                Mohon Menunggu. 
              </div>
              <?php endif; ?>
              <?php if (session()->get('status') == 'Approve') : ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Data di Setujui</h4>
                Selamat data anda di setujui.
              </div>
              <?php endif; ?>

            <!-- /.box-body -->
      
          <!-- /.box -->
     


      <div class="callout callout-info">
        <h4>Sistem Pendukung Keputusan Adalah</h4>

        <p>Menurut Raymond McLeod (1998), Sistem
Pendukung Keputusan adalah sistem penghasil
informasi spesifik yang ditujukan untuk
memecahkan suatu masalah tertentu yang harus
dipecahkan oleh manager pada berbagai tingkatan.</p>

<p>Sistem ini di bangun untuk menentukan prestasi mahasiswa berdasarkan nilai IPK, Prestasi, Pengabdian Masyarkat dan Keaktifan Organisasi.</p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        Setelah update data lakukan logotu dan login kembali
        </div>
     
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <div class="box">
        <div class="box-header with-border">
        <h4 class="box-title">berikut adalah keterangan status dokumen</h4>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="col-sm-12 col-xs-19">

        <tr>
                    <td>Status : </td>
                    <td><span class="label label-success">Approve</span>(Dokumen di setujui)</td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>Status : </td>
                    <td><span class="label label-warning">Pending</span> (Menunggu Persetujuan Dari Admin)</td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>Status :</td>
                    <td><span class="label label-danger">Revision</span>(terdapat Kesalahan data yang ada kirim)</td>
                    <td>
                      <div class="sparkbar " data-color="#f56954" data-height="50"></div>
                    </td>
                  </tr>
                  </div>
                  </div>
     <!-- /.box-body -->
     <div class="box-footer">
       
     </div>
     <!-- /.box-footer-->
   </div>
   <!-- /.box -->
    </section>

    <?php endif; ?>

      <?= $this->section('js'); ?>

<script src="<?= base_url('adminlte/bower_components/chart.js/Chart.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('adminlte/dist/js/pages/dashboard2.js'); ?>"></script>
      <?= $this->endSection(); ?>
      <?= $this->endSection() ?>
