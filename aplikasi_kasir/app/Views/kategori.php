<?php $this->extend('layout/template'); ?>
<?php $this->Section('content'); ?>
    <div class="content">
        <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Kategori</strong>
                            </div>
                            <div class="card-body">
                            <button type="button" class="mb-3 btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"> Tambah Data</i></button>
                                <table id="tables" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($ListKategori as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['id_kategori']; ?></td>
                                            <td><?= $row['nama_kategori']; ?></td>
                                            <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modalHapus_<?= $row['nama_kategori'] ?>"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                        </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div> 

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('kategori/simpan'); ?>
      <div class="modal-body">
      <p>Silahkan masukan data kategori pada form di bawah ini</p>
      <div class="form-group">
                <label class=" form-control-label">ID Kategori</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-code" ></i></div>
                            <input class="form-control" name="id_kategori"autocomplete="off">
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Nama Kategori</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-list"></i></div>
                            <input class="form-control" name="nama_kategori" autocomplete="off" required>
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Simpan Data</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?>
    </div>
    </form>
  </div>
</div>
<!-- /Modal Tambah -->

<!-- Modal Hapus -->
<?php foreach ($ListKategori as $key => $detailKategori) { ?>
                         <div class="modal fade" id="modalHapus_<?= $detailKategori['nama_kategori'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel"><b>Hapus Kategori</b></h4>
                                </div>
                                    <div class="modal-body">
                                    <?php echo form_open('kategori/hapus'); ?>
                                            <div class="form-group">
                                                            <input type="hidden" class="form-control" name="nama_kategori" value="<?= $detailKategori ['nama_kategori'] ?>">
                                                            <p>Apakah anda ingin menghapus <b><?= $detailKategori ['nama_kategori'] ?>?</b></p>
                                                </div>

                                                    <div class="form-actions form-group">
                                                        <a href="/kategori/hapus/<?= $detailKategori['nama_kategori'] ?>" class="btn btn-primary btn-sm">Hapus</a>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

    <?php $this->endSection('content'); ?>