
<?= $this->extend('layout/default') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
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
       Data Mahasiswa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Mahasiswa</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

        
        <div class="box">

            <div class="box-header">      
            <?php session()->get('id_mhs'); ?>
      
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

  <!-- /.content-wrapper -->

  <?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>
<script src="<?= base_url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
 <script src="<?= base_url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('mhs/ajax-list') ?>",
                    "type": "POST",
                    "data": {
                      csrf_token: $('meta[name=<?= csrf_token(); ?>').attr('content')
                    }
                },
                "columnDefs": [{
                    "targets": [],
                    "orderable": false,
                }, ],
            });
        });
    </script>
<?= $this->endSection(); ?>
    

