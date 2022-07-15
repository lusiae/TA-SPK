<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>

<title> Data Kriteria | SPK Bidikmisi</title>
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
                    <div class="card-body table-responsive">
                        <?php if (session()->akses ==  'Super Administrator') : ?>
                            <a href=" <?= site_url('kriteria/new') ?>" button type="button" class="btn btn-primary btn-block float-left" style="width: 150px;" margin-bottom="100px">
                                <i class="fa-solid fa-plus"></i></i> Tambah Data</button></a>
                            <p></p>
                        <?php endif; ?>

                        <table class="table table-hover table table-bordered table-striped table-sm" id="dtTabel">
                            <thead align="center">
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Nama Kriteria</th>
                                    <th width="100px">Bobot</th>
                                    <?php if (session()->akses ==  'Super Administrator') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            <tbody align="center">

                                <?php $i = 1;
                                foreach ($kriteria as $row => $value) : ?>
                                    <tr>
                                        <td> <?= $row + 1 ?></td>
                                        <td> <?= $value->nama_kriteria ?></td>
                                        <td><?= $value->bobot ?></td>
                                        <?php if (session()->akses ==  'Super Administrator') : ?>
                                            <td align="center" width="160px">
                                                <a href="<?= site_url('kriteria/edit/' . $value->id_kriteria) ?>" id="btn-edit" title="Edit Data" class="btn btn-sm btn-warning pt-0 pb-0"><i class="fa fa-edit"></i></a>
                                                <button type="submit" id="btnDelete" onclick="hapusEvent<?= $i ?>()" class="btn btn-sm btn-danger pt-0 pb-0">
                                                    <i class="fa fa-trash"></i> </button>


                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" id="hapusEvent<?= $i ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapus">Hapus Data Kriteria</h5>
                                                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="<?= site_url('kriteria/delete/' . $value->id_kriteria) ?>" method="post">
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
                                            const id = $(event.currentTarget).data('id_kriteria')
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