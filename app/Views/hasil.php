<?= $this->extend('dashboard'); ?>

<?= $this->section('content'); ?>


<section class="content-header">
      <h1 class="text-center">
    Hasil Perhitungan

        <small></small>
      </h1>
<hr />
<?php
if (isset($alert)) :
    echo '<div class="alert alert-danger">' . $alert . '</div>';
else :
?>

 
    <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <?= $data_analisa1; ?>
                </tfoot>
              <thead>
                <?= $data_analisa2; ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Normalisasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <?= $data_normalisasi; ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Bobot Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <?= $data_bobot; ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Perangkingan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <?= $data_perangkingan; ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          
    <?php
    $hasil = $get->getRowArray();
    $pemenang = '';
    $no = 1+1;
    if ($get->getNumRows() > 1) {
        foreach ($get->getResult() as $k) {
            if ($no == ($get->getNumRows() - 1)) {
                $pemenang .= ' & ' . $k->nama_alternative;
            } else {
                $pemenang .= ', ' . $k->nama_alternative;
            }
        }
    } else {
        $pemenang .= $hasil['nama_alternative'];
    }
    ?>
    <div class="alert alert-success">
 
        Dari hasil perangkingan diatas, Alternative terbaik jatuh pada <b><?= trim($pemenang, ', &'); ?></b> dengan perolehan nilai <b><?= $hasil['hasil']; ?></b>
    </div>
    </section>
    <!-- /.content -->
<?php endif; ?>
<?= $this->endSection(); ?>