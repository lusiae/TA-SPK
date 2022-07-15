<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Tambah Data Akun | SPK Bidikmisi</title>
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
                    <li class="breadcrumb-item active">Tambah Data Akun</li>
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
                            Tambah Data Akun
                        </h3>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $validation =  \Config\Services::validation(); ?>
                                <form action="<?= site_url('admin') ?>" method="post" autocomplete="off">
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
                                        <input type="hidden" name="id_Sadmin" id="id_Sadmin" class="form-control" value="<?php echo randomString(5); ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid'
                                                                                                                            : ''; ?>" value="<?= old('nama_lengkap') ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_lengkap') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username_Sadmin">Username</label>
                                        <input type="email" name="username_Sadmin" id="username_Sadmin" class="form-control <?= ($validation->hasError('username_Sadmin')) ? 'is-invalid'
                                                                                                                                : ''; ?>" value="<?= old('username_Sadmin') ?>" placeholder="dimana@gmail.com">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username_Sadmin') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="akses">Akses</label>
                                        <select id="akses" class="form-control <?= ($validation->hasError('akses')) ? 'is-invalid'
                                                                                    : ''; ?>" value="<?= old('akses') ?>" name="akses" onChange="document.getElementById('form_id').submit();">
                                            <option value="">--Pilih Akses--</option>
                                            <option <?php if (!empty($cari)) {
                                                        echo $cari == 'Super Administrator' ? 'selected' : '';
                                                    } ?> value="Super Administrator">Super Administrator</option>
                                            <option <?php if (!empty($cari)) {
                                                        echo $cari == 'Admin' ? 'selected' : '';
                                                    } ?> value="Admin">Admin</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('akses') ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid'
                                                                                                                : ''; ?>" value="<?= old('password') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="konpassword">Konfirmasi Password</label>
                                    <input type="text" name="konpassword" id="konpassword" class="form-control <?= ($validation->hasError('konpassword')) ? 'is-invalid'
                                                                                                                    : ''; ?>" value="<?= old('konpassword') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('konpassword') ?>
                                    </div>
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