<?= $this->extend('dashboard'); ?>

<?= $this->section('css'); ?>

<?= $this->endSection(); ?>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?= $this->section('content'); ?>

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


    
<section class="content-header">
      <h1>
        Input Data Bobot
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input Data Bobot</li>
      </ol>
    </section>

    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


<section class="content">
<?= form_open('/bobot'); ?>

      <div class="row">
        <!-- left column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Bobot</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="form-group">
            
            <?= $form; ?>

                <div class="box-footer">
                <button type="submit" name="Submit" value="Submit" class="btn btn-primary">Simpan Data</button>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
              </div>
       </div>  
       <?= form_close(); ?>

       </div>  
       </div>  
     
       </div>  

       </div> 









<?= $this->endSection(); ?>