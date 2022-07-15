<?= $this->extend('layout/default') ?>
<?php $db = db_connect(); ?>
<?= $this->section('tittle') ?>

<style>
    .errors {
        color: red;
        font-size: 12px;
        margin-left: -2em;
    }

    ul {
        list-style-type: none;
    }
</style>
<title> Tambah Detail Data Mahasiswa | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Data Mahasiswa</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Mahasiswa</li>
                    <li class="breadcrumb-item active">Detail Data Mahasiswa</li>
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
                            <a href=" <?= site_url('mahasiswa') ?>">
                                <i class="fas fa-arrow-left"></i></a>
                            Detail Data Mahasiswa / Alternatif
                        </h3>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $validation =  \Config\Services::validation(); ?>
                                <form action="<?= site_url('mahasiswa/tambah_detail/' . $alternatif->id_alternatif) ?>" method="post" autocomplete="off">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control " disabled value=" <?= $alternatif->nama_mahasiswa ?>">
                                    </div>
                                    <table class="table table-condensed">
                                        <tr>
                                            <th> No</th>
                                            <th> Kriteria</th>
                                            <th> Sub kriteria</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        $query = $db->query("SELECT id_kriteria, nama_kriteria FROM kriteria");
                                        $kriteria = $query->getResultArray();
                                        foreach ($kriteria as $data) {
                                            $datanya = $db->query("SELECT * from bobot_alternatif where alternatif1='$alternatif->id_alternatif' and id_kriteria='$data[id_kriteria]'")->getRowArray();
                                        ?>
                                            <tr>
                                                <td><b><?= $no++ ?>.</b></td>
                                                <td style="width:50%">
                                                    <div class="form-group">
                                                        <label for="nama_mahasiswa"><?= $data['nama_kriteria'] ?></label>
                                                        <input type="hidden" name="id_kriteria[]" id="id_kriteria" class="form-control" value="<?= $data['id_kriteria'] ?>">
                                                    </div>
                                                </td>
                                                <td style="width:50%">
                                                    <div class="form-group">
                                                        <select class="form-control <?= ($validation->hasError('bobot[]')) ? 'is-invalid'
                                                                                        : ''; ?>" value="<?= old('bobot[]') ?>" name="bobot[]">
                                                            <option value=""> - Pilih - </option>
                                                            <?php
                                                            $query = $db->query("SELECT bobot_sb, nama_sub FROM subkriteria where id_kriteria='$data[id_kriteria]'");
                                                            $subkriteria = $query->getResultArray();
                                                            foreach ($subkriteria as $row) {
                                                                if (!empty($datanya['bobot'])) {
                                                                    if ($datanya['bobot'] == $row['bobot_sb']) {
                                                                        $cek = 'selected';
                                                                    } else {
                                                                        $cek = '';
                                                                    }
                                                                } else {
                                                                    $cek = '';
                                                                }
                                                                echo "<option value='$row[bobot_sb]' $cek>$row[nama_sub]</option>";
                                                            } ?>
                                                        </select>
                                                        <?php echo \Config\Services::validation()->listErrors() ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('bobot[]') ?>

                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                    </table>
                                    <div class="form-group">
                                        <a href="<?= site_url('mahasiswa') ?>" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                        <button type="submit" class="btn btn-success ">Simpan</button>
                                    </div>
                            </div>
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