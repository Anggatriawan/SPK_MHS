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
    Input Data Mahasiswa
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">Input Data Mahasiswa</li>
  </ol>
</section>




<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<!-- Main content -->
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
            <input type="datetime-local" class="form-control <?= (isset($err['tgl_input'])) ? 'is-invalid' : ''; ?>" id="tgl_input" name="tgl_input" value="<?= old('tgl_input'); ?>" placeholder="tanggal input" >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tgl_input'])) ? $err['tgl_input'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Nim">Nim</label>
            <input type="text" class="form-control <?= (isset($err['nim'])) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>" placeholder="Nim..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['nim'])) ? $err['nim'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Password">Passsword</label>
            <input type="password" class="form-control <?= (isset($err['password'])) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="Password..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['password'])) ? $err['password'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control <?= (isset($err['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Nama..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['nama'])) ? $err['nama'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Tempat lahir">Tempat Lahir</label>
            <input type="text" class="form-control <?= (isset($err['tempat'])) ? 'is-invalid' : ''; ?>" id="tempat" name="tempat" value="<?= old('tempat'); ?>" placeholder="Tempat Lahir..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tempat'])) ? $err['tempat'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Tanggal Lahir">Tanggal Lahir</label>
            <input type="date" class="form-control <?= (isset($err['tgl'])) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= old('tgl'); ?>" placeholder="Tanggal Lahir..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['tgl'])) ? $err['tgl'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Alamat Email">Alamat Email</label>
            <input type="email" class="form-control <?= (isset($err['email'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="email..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['email'])) ? $err['email'] : ''; ?>
            </div>
          </div>


          <div class="form-group">
            <label for="Jurusan">Jurusan</label>
            <input type="text" class="form-control <?= (isset($err['jurusan'])) ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan" value="<?= old('jurusan'); ?>" placeholder="Jurusan..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['jurusan'])) ? $err['jurusan'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label>Alamat </label>
            <textarea class="form-control <?= (isset($err['alamat'])) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3" placeholder="Alamat Legkap (RT/RW, Dusun, Desa, Kecamatan, Kabupaten)"><?= old('alamat'); ?></textarea>
            <div class="invalid-feedback text-danger">
              <?= (isset($err['alamat'])) ? $err['alamat'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="Semester">Semester</label>
            <input type="text" class="form-control <?= (isset($err['semester'])) ? 'is-invalid' : ''; ?>" id="semester" name="semester" value="<?= old('semester'); ?>" placeholder="Semester..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['semester'])) ? $err['semester'] : ''; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="IPK">Nilai IPK</label>
            <input type="text" class="form-control <?= (isset($err['ipk'])) ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk'); ?>" placeholder="Ipk (contoh 4,00)" >
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
                <em class="text-danger">  *format file harus berupa pdf</em>

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
                <em class="text-danger">  *format file harus berupa pdf</em>

                <?php if ($err && isset($err['file_prestasi'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_prestasi'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
            <label for="prestasi">Deskripsi Prestasi</label>
            <input type="text" class="form-control <?= (isset($err['prestasi'])) ? 'is-invalid' : ''; ?>" id="prestasi" name="prestasi" value="<?= old('prestasi'); ?>" placeholder="Deskripsi Prestasi..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['prestasi'])) ? $err['prestasi'] : ''; ?>
            </div>
          </div>

          
            <div class="form-group">
              <label for="">Pilih File Pengabdian Masyarakat</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_pengabdian_masyarakat']) ? 'is-invalid' : '' ?>" name="file_pengabdian_masyarakat" id="file_pengabdian_masyarakat">
                <label class="custom-file-label" for="file">Choose file</label>
                <em class="text-danger">  *format file harus berupa pdf</em>

                <?php if ($err && isset($err['file_pengabdian_masyarakat'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_pengabdian_masyarakat'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            
            <div class="form-group">
            <label for="pengabdian_masyarakat">Deskripsi Pengabdian Masyarakat</label>
            <input type="text" class="form-control <?= (isset($err['pengabdian_masyarakat'])) ? 'is-invalid' : ''; ?>" id="pengabdian_masyarakat" name="pengabdian_masyarakat" value="<?= old('pengabdian_masyarakat'); ?>" placeholder="Deskripsi Pengabdian Masyrakat..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['pengabdian_masyarakat'])) ? $err['pengabdian_masyarakat'] : ''; ?>
            </div>
          </div>



            <div class="form-group">
              <label for="">Pilih File Organisasi</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['file_organisasi']) ? 'is-invalid' : '' ?>" name="file_organisasi" id="file_organisasi">
                <label class="custom-file-label" for="file">Choose file</label>
                <em class="text-danger">  *format file harus berupa pdf</em>

                <?php if ($err && isset($err['file_organisasi'])) : ?>
                  <div class="invalid-feedback text-danger"><?= $err['file_organisasi'] ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
            <label for="Jurusan">Deskripsi Organisasi</label>
            <input type="text" class="form-control <?= (isset($err['organisasi'])) ? 'is-invalid' : ''; ?>" id="organisasi" name="organisasi" value="<?= old('organisasi'); ?>" placeholder="Deskripsi Organisasi..." >
            <div class="invalid-feedback text-danger">
              <?= (isset($err['organisasi'])) ? $err['organisasi'] : ''; ?>
            </div>
          </div>

            <div class="form-group">
              <label for="">Pilih Foto Terbaru</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= $err && isset($err['foto_mhs']) ? 'is-invalid' : '' ?>" name="foto_mhs" id="foto_mhs">
                <label class="custom-file-label" for="file">Choose file</label>
                <em class="text-danger">  *format file harus berupa foto</em>
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
    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Petujuk Pengisian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        IPK
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      KEAKTIFAN ORGANISASI
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      PRESTASI
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                  
                </div>

                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      PENGABDIAN MASYARAKAT
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</section>

<?= form_close(); ?>

<?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>
<!-- FastClick -->
<script src="<?= base_url('adminlte/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<?= $this->endSection(); ?>