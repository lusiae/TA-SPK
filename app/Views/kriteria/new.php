<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Tambah Data Kriteria | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kriteria</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
                    <li class="breadcrumb-item active">Tambah Data Kriteria</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
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
                        <h3 class="card-title">
                            <a href=" <?= site_url('kriteria') ?>">
                                <i class="fas fa-arrow-left"></i></a>
                            Tambah Data Kriteria
                        </h3>

                    </div>
                    <div class="card-body ">
                        <div class="col-md-6">
                            <?php $validation =  \Config\Services::validation(); ?>
                            <form action="<?= site_url('kriteria') ?>" method="post" autocomplete="off">
                                <?= csrf_field() ?>

                                <div class="form-group mb-0">
                                    <?php
                                    function randomString($length)
                                    {
                                        $str        = "";
                                        $characters = '123456789';
                                        $max        = strlen($characters) - 1;
                                        for ($i = 0; $i < $length; $i++) {
                                            $rand = mt_rand(0, $max);
                                            $str .= $characters[$rand];
                                        }
                                        return $str;
                                    }
                                    ?>
                                    <input type="hidden" name="id_kriteria" id="id_kriteria" class="form-control" value="<?php echo randomString(5); ?>">

                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control <?= ($validation->hasError('nama_kriteria')) ? 'is-invalid'
                                                                                                                        : ''; ?>" value="<?= old('nama_kriteria') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kriteria') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <!-- gunakan event onchange untuk mengirim data secara otomatis  -->
                                    <select class="form-control <?= ($validation->hasError('bobot')) ? 'is-invalid'
                                                                    : ''; ?>" value="<?= old('bobot') ?>" id="bobot" name="bobot" onChange="document.getElementById('form_id').submit();">
                                        <option value="">--Pilih Bobot--</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '1' ? 'selected' : '';
                                                } ?> value="1">1</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '2' ? 'selected' : '';
                                                } ?> value="2">2</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '3' ? 'selected' : '';
                                                } ?> value="3">3</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '4' ? 'selected' : '';
                                                } ?> value="4">4</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '5' ? 'selected' : '';
                                                } ?> value="5">5</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '6' ? 'selected' : '';
                                                } ?> value="6">6</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '7' ? 'selected' : '';
                                                } ?> value="7">7</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '8' ? 'selected' : '';
                                                } ?> value="8">8</option>
                                        <option <?php if (!empty($cari)) {
                                                    echo $cari == '9' ? 'selected' : '';
                                                } ?> value="9">9</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bobot') ?>
                                    </div>
                                </div>



                        </div>
                        <div class="form-group">
                            <button type="reset" onclick="javascript:hapus()" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- /.content -->
<?= $this->endSection() ?>

<script type="text/javascript">
    function hapus() {
        document.getElementById("nama_kriteria").value = "";
        document.getElementById("bobot").value = "";

    }
</script>