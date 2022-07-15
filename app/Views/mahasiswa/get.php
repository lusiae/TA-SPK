<?= $this->extend('layout/default') ?>
<?= $this->section('tittle') ?>

<title> Data Mahasiswa | SPK Bidikmisi</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="content-header ">
    <div class="container-fluid mb-0">
        <div class="row mb-2">
            <div class="col-sm-6 ">
                <h1 class="m-0">Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Mahasiswa</li>
                </ol>
            </div>
        </div>

        <!-- notifikasi -->
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
    </div>
</div>

<!-- <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div> -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Data Mahasiswa / Alternatif</h3>
                    </div>
                    <div class="card-body table-responsive ">


                        <a href=" <?= site_url('mahasiswa/add') ?>" button type="button" class="btn btn-primary btn-block float-left" style="width: 150px;">
                            <i class="fa-solid fa-plus"></i></i> Tambah Data</button></a>

                        <p></p>



                        <table class="table table-hover table table-bordered table-striped table-sm" id="dtTabel">
                            <thead align="center">
                                <tr>
                                    <th width="50px">No</th>
                                    <th width="100px">NPM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th width="210px">Program Studi</th>
                                    <th width="100px">Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i = 1;
                                foreach ($alternatif as $row => $value) : ?>
                                    <tr>
                                        <td align="center"> <?= $row + 1 ?></td>
                                        <td> <?= $value->npm ?></td>
                                        <td><?= $value->nama_mahasiswa ?></td>
                                        <td><?= $value->program_studi ?></td>
                                        <td align="center"><?= $value->tahun ?></td>
                                        <td align="center" width="160px">
                                            <a href="<?= site_url('mahasiswa/detail/' . $value->id_alternatif) ?>" title="Rincian Data" class=" btn btn-sm btn-info pt-0 pb-0"><i class="fa fa-eye"></i></a>
                                            <a href="<?= site_url('mahasiswa/edit/' . $value->id_alternatif) ?>" title="Edit Data" class="btn btn-sm btn-warning pt-0 pb-0"><i class="fa fa-edit"></i></a>

                                            <button type="submit" id="btnDelete" onclick="hapusEvent<?= $i ?>()" class="btn btn-sm btn-danger pt-0 pb-0">
                                                <i class="fa fa-trash"></i> </button>



                                        </td>
                                    </tr>


                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" id="hapusEvent<?= $i ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapus">Hapus Data Mahasiswa</h5>
                                                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="<?= site_url('mahasiswa/' . $value->id_alternatif) ?>" method="post">
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
                                            const id = $(event.currentTarget).data('id_alternatif')

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

<!-- Button trigger modal -->


<?= $this->endSection() ?>