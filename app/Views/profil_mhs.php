<?= $this->extend('dashboard') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">

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
        Profil Mahasiswa <a >
      </h1>

 <div class="box-body">'

             <?php if (session()->get('status') == 'Pending') :?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Status di Tunda</h4>
               Mohon Menunggu untuk dilakukan verifikasi
               <em>Untuk Me-refresh Status silakan logout dan login kambali</em>

              </div>
              <?php endif; ?>
              <?php if (session()->get('status') == 'Approve') : ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Status di Setujui</h4>


               <em>Untuk Me-refresh Status silakan logout dan login kambali</em>
              </div>
              <?php endif; ?>

              <?php if (session()->get('status') == 'Revision') : ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Status Revisi</h4>
            
               silakan melakukan perubahan data dengan klik tombol perbarui data, setelah di simpan silakan logout dan login kembali
              </div>

              <a href="<?= base_url('profil_mhs/'.encrypt_url($data['id_mhs']).'/edit') ?>" class="btn btn-warning">
                <i class="fa fa-edit"> Perbarui Data</a></i>

                

                        
              <?php endif; ?>

            </div>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
<section class="content">
<div class="row">
  <div class="col-md-4">

    <!-- Profile Image -->
    
    <div class="box box-primary">
      <div class="box-body box-profile">
        
        <img class="profile-user-img img-responsive img-circle" src="<?=base_url('uploads/'.$data['foto_mhs']);?>" alt="User profile picture">

        <h3 class="profile-username text-center text-bold"><?=$data['nama_mhs']?></h3>

        <p class="text-muted text-center"><?=$data['jurusan_mhs']?></p>
      

        <ul class="list-group list-group-unbordered">
            
          <li class="list-group-item">
            <b> Tempat Lahir </b> <a class="pull-right"><?=$data['tempat_lahir']?></a>
          </li>
          <li class="list-group-item">
            <b>Tanggal Lahir</b><a class="pull-right">   <?=$data['tgl_lahir']?> </a>
          </li>
          <li class="list-group-item">
            <b>e-Mail </b> <a class="pull-right"> <?=$data['email']?></a>
          </li>
          <li class="list-group-item">
            <b>Alamat </b> <a class="pull-right"> <?=$data['alamat']?></a>
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
        


<strong><i class="fa fa-pencil margin-r-5"></i> Nilai IPK</strong>

              <p>
                <span class="label label-danger"><?=$data['ipk']?></span>
            
              </p>
    
        <hr>
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Pengabdian Masyarakat</strong>
        <p><?=$data['pengabdian_masyarakat']?></p>
                
        <hr>
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Pengabdian Masyarakat</strong>
        <p><?=$data['organisasi']?></p>        
        
        <hr>
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Prestasi</strong>
        <p><?=$data['prestasi']?></p>           <hr>
          
 


      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="box-body">
        
  <div class="col-md-7">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">File</a></li>
      
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <?= form_open_multipart(base_url('mhs/ajax-list')); ?>

          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>nama File</th>
                  <th>keterangan</th>
                  <th>Action</th>

                </tr>
              
                <tr>
                  <td>1</td>
                  <td> <?php echo $data['file_ipk']; ?></td>
                  <td> - </td>
                  <td> <button id="file_ipk" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modal-ipk">
                  Lihat file</td>
                  </button>
                </tr>
                <tr>
                  <td>2</td>
                  <td> <?php echo $data['file_prestasi']; ?></td>
                  <td> <?php echo $data['prestasi']; ?></td>

          <td> <button id="file_ipk" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modal-prestasi">
                  Lihat file</td>
                  </button>
                  </tr>

                <tr>
                  <td>3</td>
                  <td> <?php echo $data['file_pengabdian_masyarakat']; ?></td>
                  <td> <?php echo $data['pengabdian_masyarakat']; ?></td>
                  <td> <button id="file_ipk" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modal-pengabdian-masyarakat">
                  Lihat file</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td> <?php echo $data['file_organisasi']; ?></td>
                  <td> <?php echo $data['organisasi']; ?></td>
                  <td> <button id="file_ipk" type="button" class="btn btn-info fa fa-eye" data-toggle="modal" data-target="#modal-organisasi">
                  Lihat file</td></tr>
              </table>
            </div>
        
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

  


<!-- Modal -->




<div class="modal fade" id="modal-ipk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dokumen IPK</h4>
              </div>
              <div class="modal-body">
                <p><div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?= base_url(); ?>/uploads/<?= $data['file_ipk']; ?>"></iframe>
</div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        
<div class="modal fade" id="modal-prestasi">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dokumen Prestasi</h4>
              </div>
              <div class="modal-body">
                <p><div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?= base_url(); ?>/uploads/<?= $data['file_prestasi']; ?>"></iframe>
</div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

               
<div class="modal fade" id="modal-organisasi">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dokumen Organisasi</h4>
              </div>
              <div class="modal-body">
                <p><div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?= base_url(); ?>/uploads/<?= $data['file_organisasi']; ?>"></iframe>
</div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


                       
<div class="modal fade" id="modal-pengabdian-masyarakat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dokumen Pengabdian Masyarakat</h4>
              </div>
              <div class="modal-body">
                <p><div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?= base_url(); ?>/uploads/<?= $data['file_pengabdian_masyarakat']; ?>"></iframe>
</div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /.content -->

  <!-- /.content-wrapper -->

  <?= $this->endSection(); ?>
<!-- page script -->
<?= $this->section('js'); ?>



<?= $this->endSection(); ?>
    
