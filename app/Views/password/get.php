<?= $this->extend('layout/default') ?>
<?= $this->section('tittle') ?>

<title> Ubah Password | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header ">
    <div class="container-fluid mb-0">
        <div class="row mb-2">
            <div class="col-sm-6 ">
                <h1 class="m-0">Ubah Password</h1>
            </div>


            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Ubah Password</li>
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
                        <h3 class="card-title">Ubah Password</h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <?php $validation =  \Config\Services::validation(); ?>
                            <form action="<?= site_url('password/update') ?>/<?= userLogin()->id_Sadmin ?>" method="post" autocomplete="off">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id_admin" id="id_admin" class="form-control " disabled value="<?= userLogin()->id_Sadmin ?>">

                                <input type="hidden" name="password_asli" id="password_asli" class="form-control " disabled value="<?= userLogin()->password ?>">

                                <div class="form-group">
                                    <label>Username:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                        </div>
                                        <input type="text" name="username_Sadmin" id="username_Sadmin" class="form-control " disabled value="<?= userLogin()->username_Sadmin ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password Lama:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid'
                                                                                        : ''; ?>" value="<?= old('password_lama') ?>" name="password_lama">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_lama') ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid'
                                                                                    : ''; ?>" value="<?= old('password_baru') ?>" name="password_baru">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_baru') ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control  <?= ($validation->hasError('passwordKonf')) ? 'is-invalid'
                                                                                    : ''; ?>" value="<?= old('passwordKonf') ?>" name="passwordKonf">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('passwordKonf') ?>
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
</div>


<!-- /.content -->
<?= $this->endSection() ?>

<script type="text/javascript">
    function hapus() {
        document.getElementById("passwordKonf").value = "";
        document.getElementById("password_baru").value = "";
        document.getElementById("password_lama").value = "";
    }
</script>