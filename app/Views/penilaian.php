<?= $this->extend('layout/default') ?>

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
        Input Data Kriteria
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input Data Kriteria</li>
      </ol>
    </section>
        <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">



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
         


              
            <?= $form; ?>
        </div>
        <div class="box-footer">
              <button type="submit" name="Submit" value="Submit" class="btn btn-success">Simpan Data</button>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
              </div>
    </div>
    </div>
 



      <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Penilaian</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal">
              <div class="box-body">
              <h5>List Penilaian</h5>
              <table id="table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Alternative</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($penilaian->getNumRows() < 1) {
                        echo '<tr><td colspan="3" class="text-center text-white">Belum ada data</td></tr>';
                    } else {
                        $no = 1;
                        foreach ($penilaian->getResult() as $p) {
                            echo '<tr class="text-white">';
                            echo '<td>' . $no++ . '</td>';
                            echo '<td>' . $p->nama_alternative . '</td>';
                            echo '<td>
                                <button type="button" onclick="detailPenilaian(\'' . encrypt_url($p->id_alternative) . '\')" class="btn btn-success btn-xs my-1"><i class="fa fa-search"></i> Detail</button>
                                <button type="button" onclick="getData(\'' . encrypt_url($p->id_alternative) . '\')" class="btn btn-warning btn-xs my-1"><i class="fa fa-edit"></i> Edit</button>
                                <button type="button" onclick="sweetDelete(\'' . encrypt_url($p->id_alternative) . '\')" class="btn btn-danger btn-xs my-1"><i class="fa fa-trash"></i> Hapus</button>
                            </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </form>

</div>
<!-- Modal -->
<div class="modal fade" id="penilaian" tabindex="-1" aria-labelledby="penilaianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penilaianModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="penilaianModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>