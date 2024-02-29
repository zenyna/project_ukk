<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= base_url('dashboard') ?>"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                    </li>

                    <li class="menu-title">Master Data</li><!-- /.menu-title -->
                    <li>
                        <a href="<?= base_url('user') ?>"> <i class="menu-icon fa fa-users"></i>User </a>
                    </li>
                    <li>
                        <a href="<?= base_url('kategori') ?>"> <i class="menu-icon fa fa-list"></i>Kategori </a>
                    </li>
                    <li>
                        <a href="<?= base_url('menu') ?>"> <i class="menu-icon fa fa-book"></i>Menu </a>
                    </li>

                    <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                    <li>
                        <a href="<?= base_url('order') ?>"> <i class="menu-icon fa fa-shopping-cart"></i>Penjualan </a>
                    </li>

                    <li class="menu-title">Laporan</li><!-- /.menu-title -->
                    <li>
                        <a href="<?= base_url('laporan/harian') ?>"> <i class="menu-icon fa fa-file"></i>Laporan Harian </a>
                        <a href="<?= base_url('laporan/bulanan') ?>"> <i class="menu-icon fa fa-file"></i>Laporan Bulanan </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->