<?= $this->extend('layout/default') ?>
<?= $this->section('tittle') ?>

<title>Beranda | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Beranda</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= countData('alternatif'); ?><sup style="font-size: 20px"></sup></h3>

                        <p>Data Mahasiswa</p>
                    </div>
                    <div class="icon">

                        <i class="ion far fa-folder"></i>
                    </div>
                    <a href="<?= site_url('mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <?php if (session()->akses ==  'Super Administrator') : ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= countData('super_admin'); ?><sup style="font-size: 20px"></sup></h3>
                            <p>Data Akun</p>
                        </div>
                        <div class="icon">

                            <i class="ion far fa-user"></i>
                        </div>

                        <a href="<?= site_url('admin') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            <?php endif; ?>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= countData('kriteria'); ?><sup style="font-size: 20px"></sup></h3>

                        <p>Data Kriteria</p>
                    </div>
                    <div class="icon">
                        <i class="ion fa-regular fa-file"></i>
                    </div>
                    <a href="<?= site_url('kriteria') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= countData('subkriteria'); ?></h3>
                        <p>Data Sub Kriteria</p>
                    </div>
                    <div class="icon">
                        <i class="ion far fa-file-alt"></i>
                    </div>
                    <a href="<?= site_url('sbkriteria') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <?php if (session()->akses ==  'Admin') : ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>0<sup style="font-size: 20px"></sup></h3>
                            <p>Ubah Password</p>
                        </div>
                        <div class="icon">
                            <i class="ion far fa-user"></i>

                        </div>

                        <a href="<?= site_url('password') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <h5 class="card-title-text-center d-flex align-items-center justify-content-center" style="font-size: 30px;">Selamat Datang <?= userLogin()->akses ?> </h5>
                        <center>

                            <h4 class="card-text">
                                di Sistem Pendukung Keputusan (SPK) untuk Penentuan Mahasiswa Bidikmisi,
                                menggunakan metode Analytical Hierarchy Process (AHP)
                            </h4>
                        </center>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
</section>

<?= $this->endSection() ?>