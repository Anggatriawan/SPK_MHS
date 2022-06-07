<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>

<?php
$err = session()->getFlashdata('validation');
?>

<h5><i class="fas fa-users"></i> Edit User</h5>
<hr />
<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> Biarkan <b>Password</b> tetap kosong jika tidak ingin mengubahnya
</div>
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
                  <label for="Nim">Nim</label>
                  <input type="text" class="form-control <?= (isset($err['nim'])) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>" placeholder="Masukan Nim..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['nim'])) ? $err['nim'] : ''; ?>
                </div>
                </div>

                <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input type="text" class="form-control <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Maskan Nama..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>              
                      </div>
                    </div>

                      <div class="form-group">
                    <label for="Tempat lahir">Tempat Lahir</label>
                 <input type="text" class="form-control <?= (isset($err['tempat'])) ? 'is-invalid' : ''; ?>" id="tempat" name="tempat" value="<?= old('tempat'); ?>" placeholder="Masukan Tempat Lahir..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['tempat'])) ? $err['tempat'] : ''; ?>
                    </div>
                    </div>

                    <div class="form-group">
                  <label for="Tanggal Lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control <?= (isset($err['tgl'])) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= old('tgl'); ?>" placeholder="Masukan Tanggal Lahir..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['tgl'])) ? $err['tgl'] : ''; ?>
                      </div>
                </div>
                
                <div class="form-group">
                  <label for="Alamat Email">Alamat Email</label>
                  <input type="email" class="form-control <?= (isset($err['email'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="Masukan email..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['email'])) ? $err['email'] : ''; ?>
                      </div>
                </div>
        
                 
                 <div class="form-group">
                <label for="Jurusan">Jurusan</label>
                <input type="text" class="form-control <?= (isset($err['jurusan'])) ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan" value="<?= old('jurusan'); ?>" placeholder="Masukan Jurusan..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['jurusan'])) ? $err['jurusan'] : ''; ?>
                      </div>
                </div>
                
                <div class="form-group">
                  <label>Alamat </label>
                  <textarea class="form-control <?= (isset($err['alamat'])) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"rows="3"  value="<?= old('alamat'); ?>"placeholder="Masukan Alamat Legkap ..."></textarea>
                  <div class="invalid-feedback">
                      <?= (isset($err['alamat'])) ? $err['alamat'] : ''; ?>
                       </div>
                </div>
                
                <div class="form-group">
                <label for="Semester">Semester</label>
                <input type="text" class="form-control <?= (isset($err['semester'])) ? 'is-invalid' : ''; ?>" id="semester" name="semester" value="<?= old('semester'); ?>" placeholder="Masukan Semester..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['semester'])) ? $err['semester'] : ''; ?>
                      </div>
                </div>

                <div class="form-group">
                <label for="IPK">Nilai IPK</label>
                <input type="text" class="form-control <?= (isset($err['ipk'])) ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk'); ?>" placeholder="Masukan Ipk..." required>
                    <div class="invalid-feedback">
                      <?= (isset($err['ipk'])) ? $err['ipk'] : ''; ?>
                      </div>
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