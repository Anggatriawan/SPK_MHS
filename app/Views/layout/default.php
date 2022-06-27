<?php
$uri = service('uri');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMAWA | Dashboard</title>

  <!-- Font Awesome -->

  <!-- Ionicons -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/select2/dist/css/select2.min.css'); ?>">

  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/jvectormap/jquery-jvectormap.css'); ?>">

  <!-- Font Awesome -->
  <!-- Ionicons -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/iCheck/all.css'); ?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url('adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'); ?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/timepicker/bootstrap-timepicker.min.css'); ?>">
  <!-- Select2 -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/skins/_all-skins.min.css'); ?>">

  <?= $this->renderSection('css') ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMAWA</b>UMPO</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
            <ul class="dropdown-menu">
              <li class="header"></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                     
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
       
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
             <span class="hidden-xs" >

             <?php
             $data_mhs=userLoginMhs()->nama_mhs;
             $data_user=userLogin()->fullname;
             if (session()->get('role') == 'admin') {
             echo $data_user;
        }
        else{
          (session()->get('role') != 'admin');
          echo $data_mhs;

        }
        ?>
        
 </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="<?= base_url('adminlte/dist/img/umpo.png'); ?>" class="img-circle" alt="User Image">
                <p>
                
                  <small>UNIVERSITAS MUHAMMADIYAH PONOROGO</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                 
                  <div class=" text-center">
                    <a  href="<?= base_url('change-password'); ?>" >Ganti Password</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('profil'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#"  onclick="signOut()"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('adminlte/dist/img/umpo.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div></div>

        <div class="pull-left info">
          <p>
            
          <?php
             $data_user=userLogin()->fullname;
             if (session()->get('role') == 'admin') {
             echo $data_user;
        }
        else{
          (session()->get('role') != 'admin');

        }
        ?>
        </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">

        <li><a href="<?= base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    
      
        </li>
     
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if (session()->get('role') == 'admin') : ?>

            <li><a href="<?= base_url('/mhs'); ?>"><i class="fa fa-circle-o"></i> Kelola Data Mahasiswa</a></li>
            <li><a href="<?= base_url('/mhs/add'); ?>"><i class="fa fa-circle-o"></i> Tambah Data Mahasiswa</a></li>
            
            <?php endif; ?>

            <?php if (session()->get('role') != 'admin') : ?>

            <li><a href="<?= base_url('/profil_mhs'); ?>"><i class="fa fa-circle-o"></i> Profil</a></li>

            <?php endif; ?>

          </ul>
        </li>
     
        <?php if (session()->get('role') == 'admin') : ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('/alternative'); ?>"><i class="fa fa-circle-o"></i> Alternative</a></li>
            <li><a href="<?= base_url('/kriteria'); ?>"><i class="fa fa-circle-o"></i> Kriteria</a></li>
            <li><a href="<?= base_url('/sub-kriteria'); ?>"><i class="fa fa-circle-o"></i> Sub Kriteria</a></li>
            <li><a href="<?= base_url('/bobot'); ?>"><i class="fa fa-circle-o"></i> bobot</a></li>
            <li><a href="<?= base_url('/penilaian'); ?>"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            <li><a href="<?= base_url('/hasil'); ?>"><i class="fa fa-circle-o"></i> hasil</a></li>
          </ul>
        </li>

        <?php endif; ?>

        <?php if (session()->get('role') == 'admin') : ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Hsil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= base_url('/hasil'); ?>"><i class="fa fa-circle-o"></i> hasil</a></li>

          </ul>
        </li>
        <?php endif; ?>

        <?php if (session()->get('role') == 'admin') : ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('/user'); ?>"><i class="fa fa-circle-o"></i> Kelola User</a></li>
            <li><a href="<?= base_url('/user/add'); ?>"><i class="fa fa-circle-o"></i> Tambah User</a></li>

          </ul>
        </li>
        <?php endif; ?>
        <li><a href="#"  onclick="signOut()"><i class="fa fa-sign-out"></i> sign Out</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

    <?= $this->renderSection('content') ?>

    <script src="<?= base_url('js/sweetalert.min.js'); ?>"></script>

    </div>
 
  <!-- /.content-wrapper -->  

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="anggatriawan23@gmail.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <?= $this->renderSection('content'); ?>

    
<!-- ./wrapper -->


<script  src="<?= base_url('adminlte/plugins/input-mask/jquery.inputmask.js');?>"></script>
<script  src="<?= base_url('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
<script  src="<?= base_url('adminlte/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
<!-- date-range-picker -->
<script  src="<?= base_url('adminlte/bower_components/moment/min/moment.min.js');?>"></script>
<script  src="<?= base_url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<!-- bootstrap datepicker -->
<script  src="<?= base_url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- bootstrap color picker -->
<script  src="<?= base_url('adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');?>"></script>
<!-- bootstrap time picker -->
<script  src="<?= base_url('adminlte/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
<!-- SlimScroll -->
<script  src="<?= base_url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- iCheck 1.0.1 -->
<script  src="<?= base_url('adminlte/plugins/iCheck/icheck.min.js');?>"></script>
<!-- FastClick -->
<!-- AdminLTE App -->


<!-- jQuery 3 -->
<script  src="<?= base_url('adminlte/bower_components/select2/dist/js/select2.full.min.js');?>"></script>

<script  src="<?= base_url('adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?= base_url('adminlte/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/dist/js/adminlte.min.js');?>"></script>

<link rel="stylesheet" href="<?= base_url('css/sweetalert.css');?>">

<!-- SlimScroll -->


<!-- AdminLTE for demo purposes -->
<?= $this->renderSection('js')?>


<script>

        function signOut() {
            swal({
                title: 'Sign Out?',
                text: 'Apakah anda yakin ingin keluar dari aplikasi?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn-secondary',
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Ya, Keluar!',
                closeOnConfirm: false
            }, function() {
                location.href = '<?= base_url('logout'); ?>';
            });
        }
        $('.alert-message').delay(3000).slideUp('slow');
    </script>

    <?php
    $page = strtolower($uri->getSegment(1));
    $arr_page = ['alternative', 'kriteria', 'sub-kriteria', 'user', 'user_mhs', 'mhs'];

    if (in_array($page, $arr_page)) :
        switch ($page) {
            case 'alternative':
                $UrlDatatable = base_url('alternative/ajax-list');
                $orderLess = 3;
                $urlDelete = base_url('alternative/delete');
                break;
            case 'kriteria':
                $UrlDatatable = base_url('kriteria/ajax-list');
                $orderLess = 4;
                $urlDelete = base_url('kriteria/delete');
                break;
            case 'sub-kriteria':
                $UrlDatatable = base_url('sub-kriteria/ajax-list');
                $orderLess = 4;
                $urlDelete = base_url('sub-kriteria/delete');
                break;
            case 'user':
                $UrlDatatable = base_url('user/ajax-list');
                $orderLess = 4;
                $urlDelete = base_url('user/delete');
                break;
                case 'user_mhs':
                  $UrlDatatable = base_url('user_mhs/ajax-list');
                  $orderLess = 2;
                  $urlDelete = base_url('user_mhs/delete');
                  break;
                case 'mhs':
                  $UrlDatatable = base_url('mhs/ajax-list');
                  $orderLess = 4;
                  $urlDelete = base_url('mhs/delete');
                  break;
        }
    ?>

<script src="<?= base_url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
      

        <script>
            var table = $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= $UrlDatatable; ?>",
                    "type": "POST",
                    "data": {
                        csrf_token: $('input[name=<?= csrf_token(); ?>').val()
                    },
                    "data": function(data) {
                        data.csrf_token = $('input[name=<?= csrf_token(); ?>]').val();
                    },
                    "dataSrc": function(response) {
                        $('input[name=<?= csrf_token(); ?>]').val(response.csrf_token);
                        return response.data;
                    }
                },
                "columnDefs": [{
                    "targets": [0, <?= $orderLess; ?>],
                    "orderable": false,
                }],
            });

            function sweetDelete(id) {
                if (id == null || id == '') {
                    return false;
                }

                swal({
                    title: 'Hapus Data ini?',
                    text: 'Data yang terhapus tidak dapat dipulihkan',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn-secondary',
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ya, Hapus!',
                    closeOnConfirm: false
                }, function() {
                    var csrfName = '<?= csrf_token(); ?>';
                    var csrfHash = $('input[name=csrf_token]').val();

                    $.ajax({
                        url: "<?= $urlDelete; ?>",
                        method: "POST",
                        data: {
                            id: id,
                            [csrfName]: csrfHash
                        },
                        success: function(obj) {

                            var a = $.parseJSON(obj);
                            //update token
                            $('input[name=<?= csrf_token(); ?>]').val(a.token);

                            if (a.status == 'success') {
                                swal({
                                    title: "Success!",
                                    text: "Data berhasil dihapus",
                                    type: "success",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }, function() {
                                    swal.close();
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Data gagal dihapus",
                                    type: "error",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }, function() {
                                    swal.close();
                                });
                            }
                            table.ajax.reload();
                        }
                    });
                });
            }
        </script>
    <?php endif; ?>

    <?php if (strtolower($uri->getSegment(1)) == 'alternative') : ?>
        <script>
            function getData(id) {
                if (id == null || id == '') {
                    return false;
                }

                var csrfName = '<?= csrf_token(); ?>';
                var csrfHash = $('input[name=csrf_token]').val();

                $.ajax({
                    url: '<?= base_url('alternative/get'); ?>',
                    method: "POST",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    success: function(obj) {
                        var a = $.parseJSON(obj);

                        if (a.status == 'success') {
                            $('#form-header').html(a.header);
                            $('#form-alternative').attr('action', a.url_action);
                            $('#kode').val(a.kode);
                            $('#nama').val(a.nama);
                        } else {
                            return false;
                        }

                        $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    }
                })
            }
        </script>
    <?php endif; ?>

    <?php if (strtolower($uri->getSegment(1)) == 'kriteria') : ?>
        <script>
            function getData(id) {
                if (id == null || id == '') {
                    return false;
                }

                var csrfName = '<?= csrf_token(); ?>';
                var csrfHash = $('input[name=csrf_token]').val();

                $.ajax({
                    url: '<?= base_url('kriteria/get'); ?>',
                    method: "POST",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    success: function(obj) {
                        var a = $.parseJSON(obj);

                        if (a.status == 'success') {
                            $('#form-header').html(a.header);
                            $('#form-kriteria').attr('action', a.url_action);
                            $('#kode').val(a.kode);
                            $('#judul').val(a.judul);
                            $('#sifat').val(a.sifat);
                        } else {
                            return false;
                        }

                        $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    }
                })
            }
        </script>
    <?php endif; ?>


    <?php if (strtolower($uri->getSegment(1)) == 'sub-kriteria') : ?>
        <script>
            function getData(id) {
                if (id == null || id == '') {
                    return false;
                }

                var csrfName = '<?= csrf_token(); ?>';
                var csrfHash = $('input[name=csrf_token]').val();

                $.ajax({
                    url: '<?= base_url('sub-kriteria/get'); ?>',
                    method: "POST",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    success: function(obj) {
                        var a = $.parseJSON(obj);

                        if (a.status == 'success') {
                            $('#form-header').html(a.header);
                            $('#form-sub-kriteria').attr('action', a.url_action);
                            $('#kriteria').val(a.kriteria);
                            $('#nilai').val(a.nilai);
                            $('#keterangan').val(a.keterangan);
                        } else {
                            return false;
                        }

                        $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    }
                })
            }
        </script>
    <?php endif; ?>

    <?php if (strtolower($uri->getSegment(1)) == 'penilaian') : ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('penilaian'));

            function detailPenilaian(id) {

                if (id == null || id == '') {
                    return false;
                }

                var csrfName = '<?= csrf_token(); ?>';
                var csrfHash = $('input[name=csrf_token]').val();

                $.ajax({
                    url: '<?= base_url('penilaian/get-detail'); ?>',
                    method: "POST",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    success: function(obj) {
                        var a = $.parseJSON(obj);

                        if (a.status == 'success') {
                            $('#penilaianModalLabel').html(a.header);
                            $('#penilaianModalBody').html(a.body);
                            myModal.show();
                        } else {
                            return false;
                        }

                        $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    }
                })
            }

            function getData(id) {
                if (id == null || id == '') {
                    return false;
                }

                var csrfName = '<?= csrf_token(); ?>';
                var csrfHash = $('input[name=csrf_token]').val();

                $.ajax({
                    url: '<?= base_url('penilaian/get'); ?>',
                    method: "POST",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    success: function(obj) {
                        var a = $.parseJSON(obj);

                        if (a.status == 'success') {
                            $('#form-header').html(a.header);
                            $('#form-penilaian').attr('action', a.url_action);
                            $('#body-form-penilaian').html(a.body);
                        } else {
                            return false;
                        }

                        $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    }
                })
            }

            function sweetDelete(id) {
                if (id == null || id == '') {
                    return false;
                }

                swal({
                    title: 'Hapus Data ini?',
                    text: 'Data yang terhapus tidak dapat dipulihkan',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn-secondary',
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ya, Hapus!',
                    closeOnConfirm: false
                }, function() {
                    var csrfName = '<?= csrf_token(); ?>';
                    var csrfHash = $('input[name=csrf_token]').val();

                    $.ajax({
                        url: "<?= base_url('penilaian/delete'); ?>",
                        method: "POST",
                        data: {
                            id: id,
                            [csrfName]: csrfHash
                        },
                        success: function(obj) {

                            var a = $.parseJSON(obj);

                            if (a.status == 'success') {
                                swal({
                                    title: "Success!",
                                    text: "Data berhasil dihapus",
                                    type: "success",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }, function() {
                                    window.location.reload();
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Data gagal dihapus",
                                    type: "error",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }, function() {
                                    swal.close();
                                });
                            }
                        }
                    });
                });
            }
        </script>
        </script>
    <?php endif; ?>
    <script>
    $('.select2').select2()
    </script>
</body>
</html>
