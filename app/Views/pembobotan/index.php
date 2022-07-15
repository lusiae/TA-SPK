<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Data Pembobotan | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pembobotan </h1>
            </div><!-- /.col -->


            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Pembobotan</li>

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

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Data Pembobotan Kriteria & Sub Kriteria </h3>

                    </div>
                    <div class="card-body table-responsive">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <?php if (!empty($_GET['kriteria'])) { ?>
                                        <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Pembobotan Kriteria</a>
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Pembobotan Sub Kriteria</a>
                                    <?php } else { ?>
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pembobotan Kriteria</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pembobotan Sub Kriteria</a>
                                    <?php } ?>

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php if (!empty($_GET['kriteria'])) { ?>
                                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <?php } else { ?>
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <?php } ?>
                                        <?php if (isset($_POST['simpan'])) {
                                            $style = "display:none";
                                        } else {
                                            $style = "";
                                        } ?>
                                        <form class="form-horizontal" action="<?= site_url('pembobotan') ?>" method="post" role="form" style="<?= $style ?>">
                                            <?= csrf_field() ?>
                                            <div class="col-md-12"><br />
                                                <h3 class="card-title">Matrik Perbandingan Kriteria </h3> <br /><br />
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                <?php
                                                                $db = db_connect();
                                                                $count = 0;
                                                                $query = $db->query("SELECT id_kriteria, nama_kriteria, bobot FROM kriteria");
                                                                $coba = $query->getResultArray();

                                                                foreach ($coba as $row) {
                                                                    echo  "<th>" . $row['nama_kriteria'] . "</th>";
                                                                    $count += 1;
                                                                } ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $urut = 1;
                                                            foreach ($coba as $row) { ?>

                                                                <?php if ($urut == '1') { ?>
                                                                    <tr>

                                                                        <td><b><?= $row['nama_kriteria'] ?></b></td>
                                                                        <td style="color:red">1</td>
                                                                        <td><select class="form-control" name="bobot_1">
                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8" selected>8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_2">

                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8" selected>8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_3">

                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8" selected>8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_4">

                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8" selected>8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($urut == 2) { ?>

                                                                    <tr>
                                                                        <td><b><?= $row['nama_kriteria'] ?></b></td>
                                                                        <td>0</td>
                                                                        <td style="color:red">1</td>
                                                                        <td><select class="form-control" name="bobot_5">

                                                                                <option value="1" selected>1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_6">

                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2" selected>2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_7">

                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2" selected>2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($urut == 3) { ?>

                                                                    <tr>
                                                                        <td><b><?= $row['nama_kriteria'] ?></b></td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td style="color:red">1</td>
                                                                        <td><select class="form-control" name="bobot_8">
                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2" selected>2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><select class="form-control" name="bobot_9">
                                                                                <option value="1">1 - Sama penting dengan</option>
                                                                                <option value="2" selected>2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($urut == 4) { ?>
                                                                    <tr>
                                                                        <td><b><?= $row['nama_kriteria'] ?></b></td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td style="color:red">1</td>
                                                                        <td><select class="form-control" name="bobot_10">
                                                                                <option value="1" selected>1 - Sama penting dengan</option>
                                                                                <option value="2">2 - Mendekati lebih penting dari</option>
                                                                                <option value="3">3 - Lebih penting dari</option>
                                                                                <option value="4">4 - Mendekati jelas lebih penting dari</option>
                                                                                <option value="5">5 - Jelas lebih penting dari</option>
                                                                                <option value="6">6 - Mendekati sangat jelas lebih penting dari</option>
                                                                                <option value="7">7 - Sangat jelas lebih penting dari</option>
                                                                                <option value="8">8 - Mendekati mutlak dari</option>
                                                                                <option value="9">9 - Mutlak lebih penting dari</option>
                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td><b><?= $row['nama_kriteria'] ?></b></td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td style="color:red">1</td>


                                                                    </tr>
                                                                <?php } ?>




                                                            <?php $urut++;
                                                            } ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <!--<button type="submit" form="form1" value="Submit" class="btn btn-primary">Cek Konsistensi</button>-->

                                            <input type="submit" name="simpan" value="Cek Konsistensi" class="btn btn-primary">
                                        </form>


                                        <?php


                                        if (isset($_POST['simpan'])) {
                                            $nm_banding1 = number_format($_POST['bobot_1'], 2);
                                            $nm_banding2 = number_format($_POST['bobot_2'], 2);
                                            $nm_banding3 = number_format($_POST['bobot_3'], 2);
                                            $nm_banding4 = number_format($_POST['bobot_4'], 2);
                                            $nm_banding5 = number_format($_POST['bobot_5'], 2);
                                            $nm_banding6 = number_format($_POST['bobot_6'], 2);
                                            $nm_banding7 = number_format($_POST['bobot_7'], 2);
                                            $nm_banding8 = number_format($_POST['bobot_8'], 2);
                                            $nm_banding9 = number_format($_POST['bobot_9'], 2);
                                            $nm_banding10 = number_format($_POST['bobot_10'], 2);


                                            // memasukan nilai banding dari database ke dalam variabel
                                            $k1 = '1.00';
                                            $k2 = '1.00';
                                            $k3 = '1.00';
                                            $k4 = '1.00';
                                            $k5 = '1.00';

                                            // perhitungan baris dan kolom
                                            // Tanggungan Orang Tua
                                            $bk11 = $k1;
                                            $bk12 = $nm_banding1;
                                            $bk13 = $nm_banding2;
                                            $bk14 = $nm_banding3;
                                            $bk15 = $nm_banding4;

                                            // baris Pekerjaan Orang tua
                                            $bk21 = number_format($k2 / $nm_banding1, 2);
                                            $bk22 = $k2;
                                            $bk23 = $nm_banding5;
                                            $bk24 = $nm_banding6;
                                            $bk25 = $nm_banding7;

                                            // baris penghasilan ortu
                                            $bk31 = number_format($k3 / $nm_banding2, 2);
                                            $bk32 = number_format($k3 / $k3, 2);
                                            $bk33 = $k3;
                                            $bk34 = $nm_banding8;
                                            $bk35 = $nm_banding9;

                                            // baris semester
                                            $bk41 = number_format($k4 / $nm_banding3, 2);
                                            $bk42 = number_format($k4 / $nm_banding6, 2);
                                            $bk43 = number_format($k4 / $k4, 2);
                                            $bk44 = $k4;
                                            $bk45 = $nm_banding10;


                                            $bk51 = number_format($k4 / $nm_banding4, 2);
                                            $bk52 = number_format($k4 / $nm_banding7, 2);
                                            $bk53 = number_format($k4 / $nm_banding9, 2);
                                            $bk54 = number_format($k4 / $nm_banding10, 2);
                                            $bk55 = $k5;



                                            // perhitungan jumlah kolom
                                            $jk51 = number_format($bk11 + $bk21 + $bk31 + $bk41 + $bk51, 2);
                                            $jk52 = number_format($bk12 + $bk22 + $bk32 + $bk42 + $bk52, 2);
                                            $jk53 = number_format($bk13 + $bk23 + $bk33 + $bk43 + $bk53, 2);
                                            $jk54 = number_format($bk14 + $bk24 + $bk34 + $bk44 + $bk54, 2);
                                            $jk55 = number_format($bk15 + $bk25 + $bk35 + $bk45 + $bk55, 2);

                                            // perhitungan Priority Weight
                                            $pw11 = number_format($bk11 / $jk51, 2);
                                            $pw12 = number_format($bk12 / $jk52, 2);
                                            $pw13 = number_format($bk13 / $jk53, 2);
                                            $pw14 = number_format($bk14 / $jk54, 2);
                                            $pw15 = number_format($bk15 / $jk55, 2);
                                            $pw21 = number_format($bk21 / $jk51, 2);
                                            $pw22 = number_format($bk22 / $jk52, 2);
                                            $pw23 = number_format($bk23 / $jk53, 2);
                                            $pw24 = number_format($bk24 / $jk54, 2);
                                            $pw25 = number_format($bk25 / $jk55, 2);
                                            $pw31 = number_format($bk31 / $jk51, 2);
                                            $pw32 = number_format($bk32 / $jk52, 2);
                                            $pw33 = number_format($bk33 / $jk53, 2);
                                            $pw34 = number_format($bk34 / $jk54, 2);
                                            $pw35 = number_format($bk35 / $jk55, 2);
                                            $pw41 = number_format($bk41 / $jk51, 2);
                                            $pw42 = number_format($bk42 / $jk52, 2);
                                            $pw43 = number_format($bk43 / $jk53, 2);
                                            $pw44 = number_format($bk44 / $jk54, 2);
                                            $pw45 = number_format($bk45 / $jk55, 2);

                                            $pw51 = number_format($bk51 / $jk51, 2);
                                            $pw52 = number_format($bk52 / $jk52, 2);
                                            $pw53 = number_format($bk53 / $jk53, 2);
                                            $pw54 = number_format($bk54 / $jk54, 2);
                                            $pw55 = number_format($bk55 / $jk55, 2);

                                            // perhitungan jumlah baris PW
                                            $jb15 = $pw11 + $pw12 + $pw13 + $pw14 + $pw15;
                                            $jb25 = $pw21 + $pw22 + $pw23 + $pw24 + $pw25;
                                            $jb35 = $pw31 + $pw32 + $pw33 + $pw34 + $pw35;
                                            $jb45 = $pw41 + $pw42 + $pw43 + $pw44 + $pw45;
                                            $jb55 = $pw51 + $pw52 + $pw53 + $pw54 + $pw55;

                                            $pembagi = number_format(floor($jb15 + $jb25 + $jb35 + $jb45 + $jb55), 2);

                                            // jumlah baris di tambah kemudian dibagi 4
                                            $rata16 = number_format($jb15 / $pembagi, 2);
                                            $rata26 = number_format($jb25 / $pembagi, 2);
                                            $rata36 = number_format($jb35 / $pembagi, 2);
                                            $rata46 = number_format($jb45 / $pembagi, 2);
                                            $rata56 = number_format($jb55 / $pembagi, 2);

                                            // menghitung jumlah PW baris kolom
                                            $jpw51 = number_format(($pw11 + $pw21 + $pw31 + $pw41 + $pw51), 2);
                                            $jpw52 = number_format(($pw12 + $pw22 + $pw32 + $pw42 + $pw52), 2);
                                            $jpw53 = number_format(($pw13 + $pw23 + $pw33 + $pw43 + $pw53), 2);
                                            $jpw54 = number_format(($pw14 + $pw24 + $pw34 + $pw44 + $pw54), 2);
                                            $jpw55 = number_format(($pw15 + $pw25 + $pw35 + $pw45 + $pw55), 2);
                                            $jpw56 = number_format(floor($jb15 + $jb25 + $jb35 + $jb45 + $jb55), 2);
                                            $jpw57 = number_format(floor($rata16 + $rata26 + $rata36 + $rata46 + $rata56), 2);

                                            $db->query("Delete from bobot_kriteria");

                                            $query = $db->query("SELECT id_kriteria from kriteria");

                                            $kriterianya = $query->getResultArray();
                                            foreach ($kriterianya as $hsl) {

                                                $rand = substr(uniqid('', true), -5);
                                                $rand1 = substr(uniqid('', true), -5);
                                                $rand2 = substr(uniqid('', true), -5);
                                                $rand3 = substr(uniqid('', true), -5);
                                                $rand4 = substr(uniqid('', true), -5);

                                                $db->query("insert into bobot_kriteria VALUES ('$rand', '$hsl[id_kriteria]', '$hsl[id_kriteria]', '$rata16')");
                                                $db->query("insert into bobot_kriteria VALUES ('$rand1', '$hsl[id_kriteria]', '$hsl[id_kriteria]', '$rata26')");
                                                $db->query("insert into bobot_kriteria VALUES ('$rand2', '$hsl[id_kriteria]', '$hsl[id_kriteria]', '$rata36')");
                                                $db->query("insert into bobot_kriteria VALUES ('$rand3', '$hsl[id_kriteria]', '$hsl[id_kriteria]', '$rata46')");
                                                $db->query("insert into bobot_kriteria VALUES ('$rand4', '$hsl[id_kriteria]', '$hsl[id_kriteria]', '$rata56')");
                                            }


                                            $maks = number_format((($jk51 * $rata16) + ($jk52 * $rata26) + ($jk53 * $rata36) + ($jk54 * $rata46) + ($jk55 * $rata56)), 2);


                                            $maks2 = (($jk51 * $rata16) + ($jk52 * $rata26) + ($jk53 * $rata36) + ($jk54 * $rata46) + ($jk55 * $rata56));



                                            // menentukan jumlah rows pada kriteria untuk Rasio Index

                                            $n = 5;
                                            if ($n == 1) {
                                                $rc = 0.00;
                                            } elseif ($n == 2) {
                                                $rc = 0.00;
                                            } elseif ($n == 3) {
                                                $rc = 0.58;
                                            } elseif ($n == 4) {
                                                $rc = 0.90;
                                            } elseif ($n == 5) {
                                                $rc = 1.12;
                                            } elseif ($n == 6) {
                                                $rc = 1.24;
                                            } elseif ($n == 7) {
                                                $rc = 1.32;
                                            } elseif ($n == 8) {
                                                $rc = 1.41;
                                            } elseif ($n == 9) {
                                                $rc = 1.45;
                                            } elseif ($n == 10) {
                                                $rc = 1.49;
                                            } elseif ($n == 11) {
                                                $rc = 1.51;
                                            }

                                            $ci = number_format(($maks2 - 5) / (5 - 1), 2);
                                            $cr = number_format(($ci / $rc), 2);
                                            //          $id = kdauto('pw_kriteria',''); // menambah 1 nilai id yg ada di table pw_kriteria dlm DB
                                            //          $sql = "INSERT INTO pw_kriteria values 
                                            //              ('$id','$rata16','$rata26','$rata36','$rata46')";
                                            //              $query = mysql_query($sql) or die(mysql_error());
                                        ?>
                                            <!-- /hover rows datatable inside panel -->

                                            <!-- Hover rows data table inside panel total kolom -->

                                            <br />
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">TOTAL KOLOM / PERBANDINGAN BERPASANGAN</h6>
                                                </div>
                                                <div class="">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th align="center">Kriteria</th>
                                                                <?php foreach ($coba as $row) {
                                                                    echo  "<th>" . $row['nama_kriteria'] . "</th>";
                                                                } ?>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $urut = 1;
                                                            foreach ($coba as $row) { ?>

                                                                <?php if ($urut == '1') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th> <!-- Membaca baris Tanggungan Orang tua -->
                                                                        <td><?php echo $bk11; ?></td>
                                                                        <th><?php echo $bk12; ?></th>
                                                                        <th><?php echo $bk13; ?></th>
                                                                        <th><?php echo $bk14; ?></th>
                                                                        <th colspan="2"><?php echo $bk15; ?></th>
                                                                    </tr>
                                                                <?php } else if ($urut == '2') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th> <!-- Membaca baris pekerjaan -->
                                                                        <td><?php echo $bk21; ?></td>
                                                                        <td><?php echo $bk22; ?></td>
                                                                        <td><?php echo $bk23; ?></td>
                                                                        <td><?php echo $bk24; ?></td>
                                                                        <td colspan="2"><?php echo $bk25; ?></td>
                                                                    </tr>
                                                                <?php } else if ($urut == '3') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th> <!-- membaca baris Rumah Tinggal -->
                                                                        <td><?php echo $bk31; ?></td>
                                                                        <td><?php echo $bk32; ?></td>
                                                                        <td><?php echo $bk33; ?></td>
                                                                        <td><?php echo $bk34; ?></td>
                                                                        <td><?php echo $bk35; ?></td>
                                                                    </tr>
                                                                <?php } else if ($urut == '4') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th> <!-- membaca  BSM -->
                                                                        <td><?php echo $bk41; ?></td>
                                                                        <td><?php echo $bk42; ?></td>
                                                                        <td><?php echo $bk43; ?></td>
                                                                        <td><?php echo $bk44; ?></td>
                                                                        <td><?php echo $bk45; ?></td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th> <!-- membaca Penghasilan -->
                                                                        <td><?php echo $bk51; ?></td>
                                                                        <td><?php echo $bk52; ?></td>
                                                                        <td><?php echo $bk53; ?></td>
                                                                        <td><?php echo $bk54; ?></td>
                                                                        <td><?php echo $bk55; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>JUMLAH</th>
                                                                        <th><?php echo $jk51; ?></th>
                                                                        <th><?php echo $jk52; ?></th>
                                                                        <th><?php echo $jk53; ?></th>
                                                                        <th><?php echo $jk54; ?></th>
                                                                        <th><?php echo $jk55; ?></th>

                                                                    </tr>
                                                                <?php } ?>
                                                            <?php $urut++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /hover rows datatable inside panel -->


                                            <!-- Hover rows data table inside panel total ratio kolom -->
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">MENGHITUNG PRIORITY WEIGHT</h6>
                                                </div>
                                                <div class="">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                <?php foreach ($coba as $row) {
                                                                    echo  "<th>" . $row['nama_kriteria'] . "</th>";
                                                                } ?>
                                                                <th>Jumlah</th>
                                                                <th>Prioritas Kriteria</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $urut = 1;
                                                            foreach ($coba as $row) { ?>

                                                                <?php if ($urut == '1') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th>
                                                                        <td><?php echo $pw11; ?></td>
                                                                        <td><?php echo $pw12; ?></td>
                                                                        <td><?php echo $pw13; ?></td>
                                                                        <td><?php echo $pw14; ?></td>
                                                                        <td><?php echo $pw15; ?></td>
                                                                        <th><?php echo $jb15; ?></th>
                                                                        <th><?php echo $rata16; ?></th>
                                                                    </tr>
                                                                <?php } else if ($urut == '2') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th>
                                                                        <td><?php echo $pw21; ?></td>
                                                                        <td><?php echo $pw22; ?></td>
                                                                        <td><?php echo $pw23; ?></td>
                                                                        <td><?php echo $pw24; ?></td>
                                                                        <td><?php echo $pw25; ?></td>
                                                                        <td><?php echo $jb25; ?></td>
                                                                        <th><?php echo $rata26; ?></th>
                                                                    </tr>
                                                                <?php } else if ($urut == '3') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th>
                                                                        <td><?php echo $pw31; ?></td>
                                                                        <td><?php echo $pw32; ?></td>
                                                                        <td><?php echo $pw33; ?></td>
                                                                        <td><?php echo $pw34; ?></td>
                                                                        <td><?php echo $pw35; ?></td>
                                                                        <td><?php echo $jb35; ?></td>
                                                                        <th><?php echo $rata36; ?></th>
                                                                    </tr>
                                                                <?php } else if ($urut == '4') { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th>
                                                                        <td><?php echo $pw41; ?></td>
                                                                        <td><?php echo $pw42; ?></td>
                                                                        <td><?php echo $pw43; ?></td>
                                                                        <td><?php echo $pw44; ?></td>
                                                                        <td><?php echo $pw45; ?></td>
                                                                        <td><?php echo $jb45; ?></td>
                                                                        <td><?php echo $rata46; ?></td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <th><?= $row['nama_kriteria'] ?></th>
                                                                        <td><?php echo $pw51; ?> </td>
                                                                        <td><?php echo $pw52; ?></td>
                                                                        <td><?php echo $pw53; ?></td>
                                                                        <td><?php echo $pw54; ?></td>
                                                                        <td><?php echo $pw55; ?></td>
                                                                        <td><?php echo $jb55; ?></td>
                                                                        <td><?php echo $rata56; ?></td>
                                                                    </tr>
                                                            <?php }
                                                                $urut++;
                                                            } ?>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                <td><?php echo $jpw51; ?></td>
                                                                <td><?php echo $jpw52; ?></td>
                                                                <td><?php echo $jpw53; ?></td>
                                                                <td><?php echo $jpw54; ?></td>
                                                                <td><?php echo $jpw55; ?></td>
                                                                <td><?php echo $jpw56; ?></td>
                                                                <td><?php echo $jpw57; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /hover rows datatable inside panel -->



                                            <!-- Hover rows data table inside panel total kolom -->
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">TOTAL &#955; MAX, CI, CR</h6>
                                                </div>
                                                <div class="">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4>&#955; Maks = <?php echo $maks; ?> </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4>CI = <?php echo $ci; ?> </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4>CR = <?php echo $cr; ?></h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <?php if ($cr > 0.1) { ?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                            Hasilnya Bersifat inkonsisten
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                                            Hasilnya Bersifat Konsisten
                                                        </div>

                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php } else { ?>



                                        <?php } ?>
                                        </div>
                                        <?php if (!empty($_GET['kriteria'])) { ?>
                                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                            <?php } else { ?>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <?php } ?>
                                                <div class="col-md-6">
                                                    <div class="box box-primary">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kriteria</label>
                                                                <select class="form-control" name="id_kriteria" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                                    <option value='' selected> Pilih Kriteria</option>
                                                                    <?php

                                                                    $count = 0;
                                                                    $query = $db->query("SELECT id_kriteria, nama_kriteria, bobot FROM kriteria");
                                                                    $coba = $query->getResultArray();

                                                                    foreach ($coba as $row) {
                                                                        if (!empty($_GET['kriteria'])) {
                                                                            if ($_GET['kriteria'] == $row['id_kriteria']) {
                                                                                $cek = 'selected';
                                                                            } else {
                                                                                $cek = '';
                                                                            }
                                                                        } else {
                                                                            $cek = '';
                                                                        }

                                                                        if ($row['id_kriteria'] != '25892') {
                                                                            echo  "<option value='../pembobotan?kriteria=$row[id_kriteria]' $cek>" . $row['nama_kriteria'] . "</option>";
                                                                        }
                                                                        $count += 1;
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--tampilan pembobtan Sub Kriteria-->

                                                <?php if (!empty($_GET['kriteria'])) { ?>
                                                    <h3 class="card-title">Matrik Perbandingan Sub Kriteria </h3> <br /><br />

                                                    <?php
                                                    error_reporting(E_ALL ^ E_NOTICE);
                                                    $jml = 0;
                                                    $query = $db->query("SELECT bobot_sb, nama_sub from subkriteria where id_kriteria='$_GET[kriteria]'");
                                                    $subkriteria = $query->getResultArray();
                                                    foreach ($subkriteria as $row) {
                                                        $sub_kriteria[] = $row['nama_sub'];
                                                        $bobot[] = $row['bobot_sb'];
                                                        $jml += 1;
                                                    }

                                                    //   $jml=5;
                                                    $kolom = $jml + 1;
                                                    $bawah = $kolom + 1;
                                                    $x = 1;
                                                    $ar1 = array();
                                                    $ar2 = array();

                                                    echo "<div class='table-responsive'><table class='table table-bordered'>";
                                                    for ($i = 0; $i < $bawah; $i++) {
                                                        echo "<tr>";
                                                        for ($j = 0; $j < $kolom; $j++) {
                                                            if ($i == 0) {
                                                                if (($i == 0) && ($j == 0)) {
                                                                    echo "<th> SubKriteria</th>";
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
                                                    echo "<br><b><h3>Matriks Normalisasi</h3></b>";
                                                    echo "<div class='table-responsive'><table class='table table-bordered'>";
                                                    for ($i = 0; $i < $kolom; $i++) {
                                                        echo "<tr>";
                                                        for ($j = 0; $j < $bawah; $j++) {
                                                            if ($i == 0) {
                                                                if (($i == 0) && ($j == 0)) {
                                                                    echo "<th> Subkriteria</th>";
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
                                                    // echo "&lambda; maksimum = ".number_format($maks,3)."<br>";
                                                    // echo "CI = ";
                                                    $ci2 = number_format((($maks - $jml) / ($jml - 1)), 3);
                                                    // echo "$ci<br>";
                                                    if ($jml == 1) {
                                                        $ri = 0;
                                                    } else if ($jml == 2) {
                                                        $ri = 0;
                                                    } else if ($jml == 3) {
                                                        $ri = 0.58;
                                                    } else if ($jml == 4) {
                                                        $ri = 0.9;
                                                    } else if ($jml == 5) {
                                                        $ri = 1.12;
                                                    } else if ($jml == 6) {
                                                        $ri = 1.24;
                                                    } else if ($jml == 7) {
                                                        $ri = 1.32;
                                                    } else if ($jml == 8) {
                                                        $ri = 1.41;
                                                    } else if ($jml == 9) {
                                                        $ri = 1.45;
                                                    } else if ($jml == 10) {
                                                        $ri = 1.49;
                                                    } else if ($jml == 11) {
                                                        $ri = 1.51;
                                                    } else if ($jml == 12) {
                                                        $ri = 1.48;
                                                    } else if ($jml == 13) {
                                                        $ri = 1.56;
                                                    } else if ($jml == 14) {
                                                        $ri = 1.57;
                                                    } else if ($jml == 15) {
                                                        $ri = 1.59;
                                                    }
                                                    $cr2 = ($ci2 / $ri);



                                                    ?>

                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4>&#955; Maks = <?php echo $maks; ?> </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4>CI = <?php echo $ci2; ?> </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4>CR = <?php echo $cr2; ?></h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <?php if ($cr2 > 0.1) { ?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                            Hasilnya Bersifat inkonsisten
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                                            Hasilnya Bersifat Konsisten
                                                        </div>

                                                    <?php } ?>
                                                <?php } ?>
                                                </div>

                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

        <!-- /.content -->
        <?= $this->endSection() ?>