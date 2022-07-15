<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Edit Data Sub Kriteria | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Sub Kriteria</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Sub Kriteria</li>
                    <li class="breadcrumb-item active">Edit Data Sub Kriteria</li>
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
                            <a href=" <?= site_url('sbkriteria') ?>">
                                <i class="fas fa-arrow-left"></i></a>
                            Edit Data Sub Kriteria
                        </h3>
                    </div>

                    <div class="card-body ">
                        <?php $validation =  \Config\Services::validation(); ?>
                        <div class="col-md-6">
                            <form action="<?= site_url('sbkriteria/' . $sbkriteria->id_Skriteria) ?>" method="post" autocomplete="off">
                                <?= csrf_field() ?>

                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group mb-0">
                                    <input type="hidden" name="id_Skriteria" id="id_Skriteria" class="form-control" value="<?php echo $sbkriteria->id_Skriteria; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Kriteria</label>
                                    <select name="id_kriteria" id="id_kriteria" class="form-control <?= ($validation->hasError('id_kriteria')) ? 'is-invalid'
                                                                                                        : ''; ?>">
                                        <option value="">--Pilih Kriteria--</option>
                                        <?php foreach ($kriteria as $row => $value) : ?>
                                            <option value="<?= $value->id_kriteria ?>" <?= $sbkriteria->id_kriteria == $value->id_kriteria ? 'selected' : null ?>>
                                                <?= $value->nama_kriteria ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_kriteria') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_Kriteria">Nama Sub Kriteria</label>
                                    <input type="text" name="nama_sub" id="nama_sub" class="form-control <?= ($validation->hasError('nama_sub')) ? 'is-invalid'
                                                                                                                : ''; ?>" value="<?= old('nama_sub',  $sbkriteria->nama_sub) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_sub') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <select id="bobot_sb" class="form-control <?= ($validation->hasError('bobot_sb')) ? 'is-invalid'
                                                                                    : ''; ?>" name="bobot_sb" onChange="document.getElementById('form_id').submit();">
                                        <option value="">--Pilih Bobot--</option>
                                        <?php $jks = ['1', '2', '3', '4', '5', '6', '7', '8', '9']; ?>
                                        <?php foreach ($jks as $jk) : ?>
                                            <option value="<?= $jk ?>" <?= $jk ==  $sbkriteria->bobot_sb ? 'selected' : '' ?>><?= $jk ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bobot_sb') ?>
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
<?= $this->endSection() ?>

<script type="text/javascript">
    function hapus() {
        document.getElementById("id_kriteria").value = "";
        document.getElementById("nama_sub").value = "";
        document.getElementById("bobot_sb").value = "";

    }
</script>