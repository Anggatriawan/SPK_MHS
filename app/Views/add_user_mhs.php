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
            <div class="alert alert-success alert-dismissible">' . session()->getFlashdata('success') . '</div>
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

          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

    <section class="content-header">
      <h1>
        Input User Mahasiswa
        <small></small>
      </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input User Mahasiswa</li>
      </ol>
    </section>



          <!-- Content Wrapper. Contains page content -->
          <?= form_open('mhs/add','enctype="multipart/form-data"'); ?>
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
        <div class="box-body">

        <div class="form-group">
            <label for="Tanggal Lahir">Tanggal Input</label>
            <input type="date" class="form-control <?= (isset($err['tgl_input'])) ? 'is-invalid' : ''; ?>" id="tgl_input" name="tgl_input" value="<?= old('tgl_input'); ?>" placeholder="Masukan Tanggal Input..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tgl_input'])) ? $err['tgl_input'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Nim">Nim</label>
            <input type="text" class="form-control <?= (isset($err['nim'])) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>" placeholder="Masukan Nim..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['nim'])) ? $err['nim'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Password">Passsword</label>
            <input type="password" class="form-control <?= (isset($err['password'])) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="Masukan Nim..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['password'])) ? $err['password'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Maskan Nama..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Tempat lahir">Tempat Lahir</label>
            <input type="text" class="form-control <?= (isset($err['tempat'])) ? 'is-invalid' : ''; ?>" id="tempat" name="tempat" value="<?= old('tempat'); ?>" placeholder="Masukan Tempat Lahir..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tempat'])) ? $err['tempat'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Tanggal Lahir">Tanggal Lahir</label>
            <input type="date" class="form-control <?= (isset($err['tgl'])) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= old('tgl'); ?>" placeholder="Masukan Tanggal Lahir..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tgl'])) ? $err['tgl'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Alamat Email">Alamat Email</label>
            <input type="email" class="form-control <?= (isset($err['email'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="Masukan email..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['email'])) ? $err['email'] : ''; ?>
            </div>
          </div>


          <div class="form-group">
            <label for="Jurusan">Jurusan</label>
            <input type="text" class="form-control <?= (isset($err['jurusan'])) ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan" value="<?= old('jurusan'); ?>" placeholder="Masukan Jurusan..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['jurusan'])) ? $err['jurusan'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label>Alamat </label>
            <textarea class="form-control <?= (isset($err['alamat'])) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3" placeholder="Masukan Alamat Legkap ..."><?= old('alamat'); ?></textarea>
            <div class="invalid-feedback text-danger">
              <?= (isset($err['alamat'])) ? $err['alamat'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Semester">Semester</label>
            <input type="text" class="form-control <?= (isset($err['semester'])) ? 'is-invalid' : ''; ?>" id="semester" name="semester" value="<?= old('semester'); ?>" placeholder="Masukan Semester..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['semester'])) ? $err['semester'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="IPK">Nilai IPK</label>
            <input type="text" class="form-control <?= (isset($err['ipk'])) ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk'); ?>" placeholder="Masukan Ipk..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['ipk'])) ? $err['ipk'] : ''; ?>
            </div>
          </div>

          
        
 

         
          <?= $form; ?>
        </div>
      </div>
    </div>

    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">-</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

          <div class="box-body">

            <div class="form-group">
              <label for="">Pilih File IPK</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_ipk']) ? 'is-invalid' : '' ?>" name="file_ipk" id="file_ipk">
                <label class="custom-file-label" for="file">Choose file</label>
                <?php if ($err && isset($err['file_ipk'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_ipk'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="">Pilih File Prestasi</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_prestasi']) ? 'is-invalid' : '' ?>" name="file_prestasi" id="file_prestasi">
                <label class="custom-file-label" for="file">Choose file</label>
                <?php if ($err && isset($err['file_prestasi'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_prestasi'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
            <label for="prestasi">Deskripsi Prestasi</label>
            <input type="text" class="form-control <?= (isset($err['prestasi'])) ? 'is-invalid' : ''; ?>" id="prestasi" name="prestasi" value="<?= old('prestasi'); ?>" placeholder="Masukan Prestasi..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['prestasi'])) ? $err['prestasi'] : ''; ?>
            </div>
          </div>

          
            <div class="form-group">
              <label for="">Pilih File Pengabdian Masyarakat</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_pengabdian_masyarakat']) ? 'is-invalid' : '' ?>" name="file_pengabdian_masyarakat" id="file_pengabdian_masyarakat">
                <label class="custom-file-label" for="file">Choose file</label>
                <?php if ($err && isset($err['file_pengabdian_masyarakat'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_pengabdian_masyarakat'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            
            <div class="form-group">
            <label for="pengabdian_masyarakat">Deskripsi Pengabdian Masyarakat</label>
            <input type="text" class="form-control <?= (isset($err['pengabdian_masyarakat'])) ? 'is-invalid' : ''; ?>" id="pengabdian_masyarakat" name="pengabdian_masyarakat" value="<?= old('pengabdian_masyarakat'); ?>" placeholder="Masukan Pengabdian Masyrakat..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['pengabdian_masyarakat'])) ? $err['pengabdian_masyarakat'] : ''; ?>
            </div>
          </div>



            <div class="form-group">
              <label for="">Pilih File Organisasi</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_organisasi']) ? 'is-invalid' : '' ?>" name="file_organisasi" id="file_organisasi">
                <label class="custom-file-label" for="file">Choose file</label>
                <?php if ($err && isset($err['file_organisasi'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_organisasi'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
            <label for="Jurusan">Deskripsi Organisasi</label>
            <input type="text" class="form-control <?= (isset($err['organisasi'])) ? 'is-invalid' : ''; ?>" id="organisasi" name="organisasi" value="<?= old('organisasi'); ?>" placeholder="Masukan Deskripsi Organisasi..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['organisasi'])) ? $err['organisasi'] : ''; ?>
            </div>
          </div>

            <div class="form-group">
              <label for="">Pilih Foto Terbaru</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['foto_mhs']) ? 'is-invalid' : '' ?>" name="foto_mhs" id="foto_mhs">
                <label class="custom-file-label" for="file">Choose file</label>
                <?php if ($err && isset($err['foto_mhs'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['foto_mhs'] ?></div>
                <?php endif; ?>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" name="Submit" value="Submit" class="btn btn-success">Simpan Data</button>
              <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
            </div>

    

      </div>


    </div>
    <!-- /.box -->

</section>
<?= form_close(); ?>

 <?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>
<script  src="<?= base_url('adminlte/bower_components/select2/dist/js/select2.full.min.js');?>"></script>

<!-- FastClick -->
<!-- AdminLTE App -->
<?= $this->endSection(); ?>
<script>
$('.select2').select2()
</script>

    