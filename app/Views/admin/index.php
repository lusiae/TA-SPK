<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Data Akun | SPK Bidikmisi</title>
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
                        <h3 class="card-title">Data Akun</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <a href=" <?= site_url('admin/new') ?>" button type="button" class="btn btn-primary btn-block float-left" style="width: 150px;" margin-bottom="100px">
                            <i class="fa-solid fa-plus"></i></i> Tambah Data </button></a>
                        <p></p>
                        <table class="table table-hover table table-bordered table-striped table-sm" id="dtTabel">
                            <thead align="center">
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th width="130px">Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            <tbody>

                                <?php $i = 1;
                                foreach ($admin as $row => $value) : ?>
                                    <tr>
                                        <td align="center"> <?= $row + 1 ?></td>
                                        <td><?= $value->username_Sadmin ?></td>
                                        <td> <?= $value->nama_lengkap ?></td>
                                        <td><?= $value->akses ?></td>
                                        <td align="center" width="160px">
                                            <a href="<?= site_url('admin/edit/' . $value->id_Sadmin) ?>" id="btn-edit" class="btn btn-sm btn-warning pt-0 pb-0"><i class="fa fa-edit"></i></a>
                                            <button type="submit" id="btnDelete" onclick="hapusEvent<?= $i ?>()" class="btn btn-sm btn-danger pt-0 pb-0">
                                                <i class="fa fa-trash"></i> </button>


                                        </td>
                                    </tr>
                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" id="hapusEvent<?= $i ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapus">Hapus Data Akun</h5>
                                                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="<?= site_url('admin/delete/' . $value->id_Sadmin) ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function hapusEvent<?= $i ?>() {
                                            $('#hapusEvent<?= $i ?>').modal('show')
                                            const id = $(event.currentTarget).data('id_Sadmin')

                                        }
                                    </script>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.content -->
<?= $this->endSection() ?>