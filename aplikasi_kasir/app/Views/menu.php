<?php $this->extend('layout/template'); ?>

<?php $this->Section('content'); ?>
<div class="content">
    <div class="animated fadeIn">
        <button type="button" class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah data</button>

        <div class="row">
        <?php $no = 1;
foreach ($ListMenu as $key => $row) {
    ?> 
                <div class="col-sm-4 mx-auto m-2">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center"><?= $row["nama_menu"]; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="rounded" src="/images/menu/<?= $row["gambar"]; ?>" style="width:200px; height:200px; ">
                            </div>

                            <table class="table table-striped table-responsive-sm">
                                <tbody>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td class="card-text"><?= $row['nama_kategori']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td class="card-text">Rp. <?= number_format($row['harga'], 0) ?></td>

                                    </tr>

                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#modalEdit_<?= $row['id_menu'] ?>"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modalHapus_<?= $row['id_menu'] ?>"><i class="fa fa-trash"></i></button>


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?> 
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel"><b>Form Menu</b></h4>
            </div>
            <?php echo form_open("menu/simpan"); ?>
            <div class="modal-body">
                <p>Silahkan masukan data menu pada form di bawah ini</p>
                <div class="form-group">
                        <label class=" form-control-label">ID Menu</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-code"></i></div>
                            <input class="form-control" name="id_menu" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Nama Menu</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-book"></i></div>
                            <input class="form-control" name="nama_menu" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Nama Kategori</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-list"></i></div>
                            <select name="nama_kategori" class="form-control" required>
                                <option value="#">-- Pilih Salah Satu --</option>
                                <?php foreach ($ListKategori as $row) : ?>
                                    <option value="<?= $row['nama_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Harga</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-money"></i></div>
                            <input class="form-control" name="harga" id="harga" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" required>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                    </div>
                    <?php echo form_close(); ?>
           
        </div>
    </div>
</div>
<!-- /Modal Tambah -->

<!-- Modal Edit -->
<?php foreach ($ListMenu as $key => $detailMenu) { ?>
                         <div class="modal fade" id="modalEdit_<?= $detailMenu['id_menu'] ?>">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel"><b>Form Menu</b></h4>
                                </div>
                                    <div class="modal-body">
                                    <?php echo form_open("menu/update"); ?>
                                            <div class="form-group">
                                                <label class=" form-control-label">Menu</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                                            <input type="hidden" class="form-control" name="id_menu" value="<?= $detailMenu ['id_menu'] ?>">
                                                            <input class="form-control" name="nama_menu" value="<?= $detailMenu ['nama_menu'] ?>">
                                                    </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class=" form-control-label">Nama Kategori</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                                            <select name="nama_kategori" class="form-control">
                                                                <option value="#">-- Pilih Salah Satu --</option>
                                                                <?php
                                                                foreach ($ListKategori as $key =>$k) { ?>
                                                                    <option value="<?= $k['nama_kategori'] ?>" <?= $detailMenu['nama_kategori'] == $k['nama_kategori'] ? 'Selected' : '' ?>> <?= $k['nama_kategori'] ?></option>
                                                               <?php } ?>
                                                            ?>
                                                            </select>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <label class=" form-control-label">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                            <input class="form-control" name="harga" id="harga" value="<?= $detailMenu ['harga'] ?>">
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                            <input type="hidden" class="form-control" name="gambar" value="<?= $detailMenu ['gambar'] ?>">
                                            </div>
                                            </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                                    </div>
                                   <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                            <!-- /Modal Edit -->

                            <!-- Modal Hapus -->
<?php foreach ($ListMenu as $key => $detailMenu) { ?>
                         <div class="modal fade" id="modalHapus_<?= $detailMenu['id_menu'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Menu</h5>
                                </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/menu/hapus">
                                            <div class="form-group">
                                                            <input type="hidden" class="form-control" name="nama_menu" value="<?= $detailMenu['nama_menu'] ?>">
                                                            <p>Apakah anda ingin menghapus <b><?= $detailMenu ['nama_menu'] ?>?</b></p>
                                                </div>

                                                    <div class="form-actions form-group">
                                                        <a href="/menu/hapus/<?= $detailMenu['nama_menu'] ?>" class="btn btn-primary btn-sm">Hapus</a>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>



<?php $this->endSection('content'); ?>