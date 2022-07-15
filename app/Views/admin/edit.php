<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Edit Data Akun | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Akun</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Akun</li>
                    <li class="breadcrumb-item active">Edit Data Akun</li>
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
                            <a href=" <?= site_url('admin') ?>">
                                <i class="fas fa-arrow-left"></i></a>
                            Edit Data Akun
                        </h3>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $validation =  \Config\Services::validation(); ?>
                                <form action="<?= site_url('admin/update/' . $admin->id_Sadmin) ?>" method="post" autocomplete="off">
                                    <?= csrf_field() ?>

                                    <div class="form-group mb-0">
                                        <input type="hidden" name="id_Sadmin" id="id_Sadmin" class="form-control" value="<?php echo  $admin->id_Sadmin; ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid'
                                                                                                                            : ''; ?>" value="<?= old('nama_lengkap', $admin->nama_lengkap) ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_lengkap') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username_Sadmin">Username</label>
                                        <input type="text" name="username_Sadmin" id="username_Sadmin" class="form-control <?= ($validation->hasError('username_Sadmin')) ? 'is-invalid'
                                                                                                                                : ''; ?>" value="<?= old('username_Sadmin', $admin->username_Sadmin) ?>" placeholder="dimana@gmail.com">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username_Sadmin') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="akses">Akses</label>
                                        <select name="akses" id="akses" class="form-control" required>
                                            <?php $jks = ['Super Administrator', 'Admin']; ?>
                                            <?php foreach ($jks as $jk) : ?>
                                                <option value="<?= $jk ?>" <?= $jk ==  $admin->akses ? 'selected' : '' ?>><?= $jk ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label for="konpassword">Konfirmasi Password</label>
                                    <input type="password" name="konpassword" id="konpassword" class="form-control ">

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
        document.getElementById("konpassword").value = "";
        document.getElementById("password").value = "";
        document.getElementById("akses").value = "";
        document.getElementById("username_Sadmin").value = "";
        document.getElementById("nama_lengkap").value = "";

    }
</script>