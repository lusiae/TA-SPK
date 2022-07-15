<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item ">
        <a href="<?= site_url() ?>" class="nav-link <?= url_is('home') ? 'active' : '' ?>"><i class="nav-icon fa-solid fa-house"></i>
            <p> Beranda</p>
        </a>
    </li>


    <li class=" nav-item ">
        <a href="<?= site_url('mahasiswa') ?>" class="nav-link <?= url_is('mahasiswa') || url_is('mahasiswa.add') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-folder-minus"></i>
            <p> Data Mahasiswa</p>
        </a>
    </li>



    <li class="nav-item  <?= url_is('kriteria') || url_is('kriteria.new') || url_is('sbkriteria') || url_is('sbkriteria.new') ? 'menu-open' : '' ?>">
        <a href="#" class="nav-link  <?= url_is('kriteria') || url_is('kriteria.new') || url_is('sbkriteria') || url_is('sbkriteria.new') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-folder-tree"></i>
            <p>Kriteria<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= site_url('kriteria') ?>" class="nav-link <?= url_is('kriteria') || url_is('kriteria.new') ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kriteria</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('sbkriteria') ?>" class="nav-link <?= url_is('sbkriteria') || url_is('sbkriteria.new') ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub Kriteria</p>
                </a>
            </li>

        </ul>
    </li>

    <?php if (session()->akses ==  'Super Administrator') : ?>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
            <a href="<?= site_url('admin') ?>" class="nav-link  <?= url_is('admin') || url_is('admin.new') ? 'active' : '' ?>"><i class="nav-icon fa-solid fa-user-group"></i>
                <p>Data Akun</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('pembobotan') ?>" class="nav-link  <?= url_is('pembobotan') ? 'active' : '' ?>"><i class="nav-icon fa-solid fa-file-signature"></i>
                <p>Pembobotan</p>
            </a>
        </li>

    <?php endif; ?>

    <li class="nav-item">
        <a href="<?= site_url('pembobotan/hasil') ?>" class="nav-link <?= url_is('pembobotan/hasil') ? 'active' : '' ?>"><i class="nav-icon fa-solid fa-calculator"></i>
            <p>Perangkingan </p>

        </a>
    </li>
    <?php if (session()->akses ==  'Admin') : ?>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
            <a href="<?= site_url('password') ?>" class="nav-link <?= url_is('password') ? 'active' : '' ?>"><i class="nav-icon fas fa-user-lock"></i>
                <p>Ubah Password </p>

            </a>
        </li>
    <?php endif; ?>

    <li class="nav-item ">
        <a type="submit" id="btnDelete" onclick="keluarEvent()" class="nav-link"><i class=" nav-icon fa-solid fa-right-from-bracket"></i>
            <p> Keluar</p>
        </a>
    </li>
</ul>