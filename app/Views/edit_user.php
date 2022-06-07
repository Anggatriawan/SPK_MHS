<?= $this->extend('layout/default'); ?>

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


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
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
                <label for="Semester">Username</label>
                <input type="text" class="form-control <?= (isset($err['user'])) ? 'is-invalid' : ''; ?>" id="user" name="user" value="<?= (old('user')) ? old('user') : $data['username']; ?>" placeholder="Username..." required>
               <div class="invalid-feedback">
            <?= (isset($err['user'])) ? $err['user'] : ''; ?>
        </div>
                </div>



        <div class="form-group">
          <label for="Semester">fullname</label>
        <input type="text" class="form-control <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $data['fullname']; ?>" placeholder="Fullname..." required>
        <div class="invalid-feedback">
            <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>
        </div>
    </div>


    <div class="form-group">
          <label for="Semester">password</label>
        <input type="password" class="form-control <?= (isset($err['password'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password...">
        <div class="invalid-feedback">
            <?= (isset($err['password'])) ? $err['password'] : ''; ?>
        </div>
    </div>



    <div class="form-group">
                  <label>Select</label>
                  <select class="form-control">
                  <option value="" disabled selected>Pilih Role User</option>
            <?php
            $val_role = (old('role')) ? old('role') : $data['role'];
            ?>
            <option value="admin" <?= ($val_role == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?= ($val_role == 'user') ? 'selected' : ''; ?>>User</option>
                  </select>
                </div>
    </div>


<div class="form-group row">
    <div class="col-sm-12 col-md-5 offset-md-3">
        <button type="submit" name="Submit" value="Submit" class="btn btn-success">Simpan Data</button>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
    </div>
</div>


</div>

</div>
<div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Callouts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="callout callout-danger">
                <h4>Pada filed Password </h4>

                <p>Biarkan Tetap Kosong apabila tidak ingin merubah password</p>
              </div>
           
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>

</form>

</section>


<?= form_close(); ?>

<?= $this->endSection(); ?>

<!-- page script -->
<?= $this->section('js'); ?>
<?= $this->endSection(); ?>