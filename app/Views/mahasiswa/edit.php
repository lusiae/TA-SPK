<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Edit Data Mahasiswa | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Mahasiswa</li>
                    <li class="breadcrumb-item active">Edit Data Mahasiswa</li>
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
                            Edit Data Mahasiswa / Alternatif
                        </h3>
                    </div>




                    <div class="card-body ">
                        <div class="col-md-6">
                            <?php $validation =  \Config\Services::validation(); ?>
                            <form action="<?= site_url('mahasiswa/' . $alternatif->id_alternatif) ?>" method="post" autocomplete="off">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group mb-0">
                                    <input type="hidden" name="id_alternatif" id="id_alternatif" class="form-control" value="<?php echo  $alternatif->id_alternatif; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input type="text" name="npm" id="npm" class="form-control<?= ($validation->hasError('npm')) ? 'is-invalid'
                                                                                                    : ''; ?>" value="<?= old('npm', $alternatif->npm) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('npm') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control <?= ($validation->hasError('nama_mahasiswa')) ? 'is-invalid'
                                                                                                                            : ''; ?>" value="<?= old('nama_mahasiswa', $alternatif->nama_mahasiswa) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_mahasiswa') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="program_studi">Program Studi</label>
                                    <!-- gunakan event onchange untuk mengirim data secara otomatis  -->
                                    <select class="form-control <?= ($validation->hasError('program_studi')) ? 'is-invalid'
                                                                    : ''; ?>" name="program_studi" onChange="document.getElementById('form_id').submit();">
                                        <option value="">--Pilih Program Studi--</option>
                                        <?php foreach ($jurusan  as $row => $value) : ?>
                                            <option value="<?= $value->nama_jurusan ?>" <?= $alternatif->program_studi == $value->nama_jurusan ? 'selected' : null ?>>
                                                <?= $value->nama_jurusan ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('program_studi') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahun">Tahun Masuk</label>
                                    <select name="tahun" id="tahun" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid'
                                                                                            : ''; ?>" onChange="document.getElementById('form_id').submit();">
                                        <option value="">--Pilih Bobot--</option>
                                        <?php $jks = ['2021', '2020', '2019']; ?>
                                        <?php foreach ($jks as $jk) : ?>
                                            <option value="<?= $jk ?>" <?= $jk == $alternatif->tahun ? 'selected' : '' ?>><?= $jk ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun') ?>
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

</div>


<!-- /.content -->
<?= $this->endSection() ?>
<script type="text/javascript">
    function hapus() {
        document.getElementById("npm").value = "";
        document.getElementById("tahun").value = "";
        document.getElementById("program_studi").value = "";
        document.getElementById("nama_mahasiswa").value = "";
    }
</script>