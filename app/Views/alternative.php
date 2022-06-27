<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>

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
         Data Alternative
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active"> Data Kriteria</li>
      </ol>
    </section>

    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        
 <!-- Main content -->
  <!-- Main content -->
  <section class="content">
      <div class="row">

    <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Alternative</h3>
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

    
