<?php $this->extend('layout/template'); ?>
<?php $this->Section('content'); ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-md-12">

<div class="card card-primary">
    <div class="card-header py-2 bg-light d-flex">
        <h5 class="card-title font-weight-bold mr-auto">Laporan Penjualan Harian</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-10 input-group">
                        <input type="date" name="tgl" id="tgl" class="form-control">
                        <span class="input-group-append">
                            <button onclick="ViewTabelLaporan()" class="btn btn-primary">
                                <i class="fa fa-file"> View Laporan</i>
                            </button>
                            <button onclick="PrintLaporan()" class="btn btn-success">
                                <i class="fa fa-print"> Print Laporan</i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <hr>
                <div class="Tabel">

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

        </div>
    </div>
</div>
    <div class="clearfix"></div>
    <?php $this->endSection('content'); ?>
    