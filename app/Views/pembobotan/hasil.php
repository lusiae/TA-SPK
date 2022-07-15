<?php error_reporting(0);
$db = db_connect(); ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Data Perhitungan | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Perangkingan </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Perangkingan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show mb-0">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"> </button>
                    <b>Success !</b>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show mb-0">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"> </button>
                    <b>Error ! </b>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<?php if (!empty($_GET['token'])) {  ?>


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark card-outline">

                        <div class="card-header">
                            <h3 class="card-title">Hasil Perhitungan AHP </h3>

                        </div>
                        <div class="card-body table-responsive ">
                            <div class="text-left">
                                <a href="<?= site_url('pembobotan/hasil') ?>" button="" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-hourglass"></i> Proses Ulang</a>
                                <a href="<?= site_url('pembobotan/cetak') ?>" target="_blank" button="" type="button" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-file"></i> Export Excel </a>

                                <a onclick='cetak()' target="_blank" type="button" class="btn btn-sm btn-success">
                                    <i class="fa fa-print"></i> Cetak Hasil Perhitungan </a>
                                <script>
                                    $("#appbd").addClass("sidebar-collapse");

                                    function cetak() {
                                        var printContents = document.getElementById('ctkhsl').innerHTML;
                                        var width = window.innerWidth * 0.75;
                                        var height = width * window.innerHeight / window.innerWidth;
                                        var ctkWin = window.open('<?php echo base_url('pembobotan/print') ?>', 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2))
                                        printContents = printContents.replace(/table table-bordered table-striped/g, "");
                                        ctkWin.onload = function() {
                                            ctkWin.document.getElementById('tctk').innerHTML = printContents;
                                            ctkWin.window.print();
                                        }
                                    }
                                </script>

                                <a href="<?= site_url('pembobotan/hasil') ?>?token=xyyyx" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i></i> Hapus Data Rangking </a>


                                <form class="form-horizontal" action="<?= site_url('pembobotan/hasil') ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-10">

                                                <select name="tahun" class="form-control">
                                                    <option selected="selected"> Pilih Tahun</option>
                                                    <?php
                                                    for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                                        echo "<option value='$i'> $i </option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">Cari</button>

                                    </div>
                                </form>
                            </div>

                        </div>



                        <div class="card-body table-responsive mb-0" id="ctkhsl">
                            <table class='table table-bordered'>
                                <tr>
                                    <th width="110px">NPM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Program Studi</th>
                                    <th>Tahun</th>
                                    <th>Hasil</th>
                                    <th width="110px">Rangking</th>
                                </tr>
                                <?php
                                $urut = 1;
                                $db->query("delete from hasil");
                                $query = $db->query("SELECT a.nama_mahasiswa as nama_mahasiswa, a.npm as npm, a.program_studi as prodi, a.tahun as tahun  from bobot_alternatif h join alternatif a on a.id_alternatif=h.alternatif1 group by nama_mahasiswa");
                                $mahasiswa = $query->getResultArray();
                                foreach ($mahasiswa as $list) {
                                    if ($urut > 10) {
                                        $style = 'color:red';
                                    } else {
                                        $style = '';
                                    }  ?>
                                    <tr style='<?= $style ?>'>
                                        <td><?= $list['npm'] ?></td>
                                        <td><?= $list['nama_mahasiswa'] ?></td>
                                        <td><?= $list['prodi'] ?></td>
                                        <td><?= $list['tahun'] ?></td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                <?php }  ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } else { ?>


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark card-outline">

                        <div class="card-header">
                            <h3 class="card-title">Hasil Perhitungan AHP </h3>

                        </div>
                        <div class="card-body table-responsive ">
                            <div class="text-left">
                                <a href="<?= site_url('pembobotan/hasil') ?>" button="" type="button" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-hourglass"></i> Proses Ulang</a>
                                <a href="<?= site_url('pembobotan/cetak') ?>" target="_blank" button="" type="button" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-file"></i> Export Excel </a>

                                <a onclick='cetak()' target="_blank" type="button" class="btn btn-sm btn-success">
                                    <i class="fa fa-print"></i> Cetak Hasil Perhitungan </a>
                                <script>
                                    $("#appbd").addClass("sidebar-collapse");

                                    function cetak() {
                                        var printContents = document.getElementById('ctkhsl').innerHTML;
                                        var width = window.innerWidth * 0.75;
                                        var height = width * window.innerHeight / window.innerWidth;
                                        var ctkWin = window.open('<?php echo base_url('pembobotan/print') ?>', 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2))
                                        printContents = printContents.replace(/table table-bordered table-striped/g, "");
                                        ctkWin.onload = function() {
                                            ctkWin.document.getElementById('tctk').innerHTML = printContents;
                                            ctkWin.window.print();
                                        }
                                    }
                                </script>

                                <a href="<?= site_url('pembobotan/hasil') ?>?token=xyyyx" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i></i> Hapus Data Rangking </a>
                            </div>

                        </div>


                        <?php
                        error_reporting(E_ALL ^ E_NOTICE);
                        $db->query("delete from hasil");
                        $query = $db->query("SELECT id_kriteria FROM kriteria");
                        $kriteria = $query->getResultArray();

                        foreach ($kriteria  as $k) {


                            $jml = 0;


                            $query = $db->query("SELECT bobot, alternatif1 from bobot_alternatif where id_kriteria='$k[id_kriteria]'");
                            $subkriteria = $query->getResultArray();
                            foreach ($subkriteria as $row) {
                                $sub_kriteria[] = $row['alternatif1'];
                                $bobot[] = $row['bobot'];
                                $jml += 1;
                            }

                            //   $jml=5;
                            $kolom = $jml + 1;
                            $bawah = $kolom + 1;
                            $x = 1;
                            $ar1 = array();
                            $ar2 = array();

                            echo "<div class='table-responsive'><table class='table table-bordered' style='display:none'>";
                            for ($i = 0; $i < $bawah; $i++) {
                                echo "<tr>";
                                for ($j = 0; $j < $kolom; $j++) {
                                    if ($i == 0) {
                                        if (($i == 0) && ($j == 0)) {
                                            echo "<th> Alternatif</th>";
                                        } else {
                                            echo "<th>" . $sub_kriteria[$j - 1] . "</th>";
                                        }
                                    } else {
                                        if ($j == 0) {
                                            if ($i == $kolom) {
                                                if ($j == 0) {
                                                    echo "<th>Jumlah</th>";
                                                } else {
                                                    echo "<td>" . $kolom1[1] . "</td>";
                                                }
                                            } else {
                                                echo "<th>" . $sub_kriteria[$i - 1] . "</th>";
                                            }
                                        } else if ($i == $j) {
                                            echo "<td style='color:red'>1</td>";
                                            $ar2[$j] = 1;
                                        } else if ($j > $i) {
                                            echo "<td>" . $bobot[$j - 1] . "</td>";
                                            $ar2[$j] = $bobot[$j - 1];
                                        } else {
                                            if ($i == $kolom) {
                                                if ($j != 0) {
                                                    $jumlah = 0;
                                                    for ($y = 1; $y <= $jml; $y++) {
                                                        $jumlah = $jumlah + $ar1[$y][$j];
                                                    }
                                                    echo "<td>";
                                                    echo number_format($jumlah, 3) . "</td>";
                                                    $sigma[$j] = $jumlah;
                                                }
                                            } else {
                                                echo "<td>" . number_format((1 / $bobot[$j]), 3) . "</td>";
                                                $ar2[$j] = (1 / $bobot[$j - 1]);
                                            }
                                        }
                                    }
                                }

                                $ar1[$i] = $ar2;


                                echo "</tr><input type='hidden' id='jml_data' name='jml_data' value='$jml' />";
                            }
                            echo "</table></div><br/>";


                            //table 2
                            $kolom = $jml + 1;
                            $bawah = $kolom + 1;
                            $x = 1;
                            $ar1 = array();
                            $ar2 = array();

                            echo "<div class='table-responsive' style='display:none'><table class='table table-bordered'>";
                            for ($i = 0; $i < $kolom; $i++) {
                                echo "<tr>";
                                for ($j = 0; $j < $bawah; $j++) {
                                    if ($i == 0) {
                                        if (($i == 0) && ($j == 0)) {
                                            echo "<th> Alternatif</th>";
                                        } else {
                                            if ($j == $kolom) {
                                                echo "<th>Vektor Eigen</th>";
                                            } else {
                                                echo "<th>" . $sub_kriteria[$j - 1] . "</th>";
                                            }
                                        }
                                    } else {
                                        if ($j == 0) {

                                            echo "<th>" . $sub_kriteria[$i - 1] . "</th>";
                                        } else if ($j > $i) {
                                            if ($j >= $kolom) {
                                                $ar1[$i] = $ar2;
                                                $jumlah = 0;
                                                for ($y = 1; $y <= $jml; $y++) {

                                                    $jumlah = $jumlah + $ar1[$i][$y];
                                                }
                                                $eigen = $jumlah / $jml;
                                                $id_alternatif = $sub_kriteria[$i - 1];
                                                $rand = substr(uniqid('', true), -5);
                                                $db->query("INSERT INTO hasil  VALUES ('$rand', '$id_alternatif', '$eigen')");

                                                $mak[$i] = $eigen;
                                                echo "<td>" . number_format($eigen, 3) . "</td>";
                                            } else {
                                                echo "<td>" . number_format(($bobot[$j - 1] / $sigma[$j]), 3) . "</td>";
                                                $ar2[$j] = ($bobot[$j - 1] / $sigma[$j]);
                                            }
                                        } else if ($i == $j) {
                                            echo "<td>" . number_format((1 / $sigma[$j]), 3) . "</td>";
                                            $ar2[$j] = (1 / $sigma[$j]);
                                        } else {

                                            echo "<td>" . number_format(((1 / $bobot[$j - 1]) / $sigma[$j]), 3) . "</td>";
                                            $ar2[$j] = ((1 / $bobot[$j - 1]) / $sigma[$j]);
                                        }
                                    }
                                }

                                $ar1[$i] = $ar2;


                                echo "</tr>";
                            }
                            echo "</table></div><br/>";


                            $maks = 0;
                            for ($i = 1; $i <= $jml; $i++) {
                                $maks = ($maks + (($sigma[$i]) * ($mak[$i])));
                                //echo $sigma[$i].",".$mak[$i];
                            }
                            $db->query("delete from hasil where hasil='1'");
                        ?>
                        <?php } ?>

                        <div class="card-body table-responsive mb-0" style="margin-top:-16em" id="ctkhsl">
                            <table class="table table-hover table-bordered" id="dtTabel2">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th width="100px">NPM</th>
                                        <th width="200px">Nama Mahasiswa</th>
                                        <th>Program Studi</th>
                                        <th>Tahun</th>
                                        <th>Hasil</th>
                                        <th width="100px">Rangking</th>
                                    </tr>
                                </thead>


                                <?php
                                $i = 0;
                                $urut = 1;
                                $query = $db->query("SELECT a.nama_mahasiswa as nama_mahasiswa, a.npm as npm, a.program_studi as prodi, a.tahun as tahun, sum(h.hasil) as nilai from hasil h join alternatif a on a.id_alternatif=h.id_alternatif group by nama_mahasiswa order by hasil desc");
                                $mahasiswa = $query->getResultArray();
                                foreach ($mahasiswa as $list) {
                                    if ($urut > 10) {
                                        $style = 'color:red';
                                    } else {
                                        $style = '';
                                    }  ?>
                                    <tr style='<?= $style ?>'>
                                        <td align="center">
                                            <?= $i + 1 ?>
                                        </td>
                                        <td><?= $list['npm'] ?></td>
                                        <td><?= $list['nama_mahasiswa'] ?></td>
                                        <td><?= $list['prodi'] ?></td>
                                        <td><?= $list['tahun'] ?></td>
                                        <td><?= number_format($list['nilai'], 3) ?></td>
                                        <td>
                                            <center class="box"><b><?= $urut++ ?></b></center>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }  ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.content -->
<?= $this->endSection() ?>