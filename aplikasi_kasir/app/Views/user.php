<?php $this->extend('layout/template'); ?>
<?php $this->Section('content'); ?>
    <div class="content">
        <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data User</strong>
                            </div>
                            <div class="card-body">
                            <button type="button" class="mb-3 btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"> Tambah Data</i></button>
                                <table id="tables" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($ListUser as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['id_user']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td class="text-center">
                                            <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#modalEdit_<?= $row['username'] ?>"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modalHapus_<?= $row['username'] ?>"><i class="fa fa-trash"></i></button>
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

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('user/simpan'); ?>
      <div class="modal-body">
        <p>Silahkan masukan data pengguna pada form di bawah ini</p>
            <div class="form-group">
                <label class=" form-control-label">ID User</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-code"></i></div>
                            <input class="form-control" name="id_user" autocomplete="off" autofocus required>
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Username</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control" name="username" autocomplete="off" required>
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input class="form-control" name="password" autocomplete="off" required>
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Nama User</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-group"></i></div>
                            <input class="form-control" name="nama" autocomplete="off" required>
                    </div>
            </div>

            <div class="form-group">
                <label for="select" class=" form-control-label">Level</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-list-ul"></i></div>
                            <select name="level" class="form-control" required><i class="fa fa-book"></i>
                                <option value="#">-- Pilih Salah Satu --</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Simpan Data</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- /Modal Tambah-->

<!-- Modal Edit-->
<?php foreach ($ListUser as $key => $detailUser) { ?>
<div class="modal fade" id="modalEdit_<?= $detailUser['username'] ?>">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Perubahan data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('user/update'); ?>
      <div class="modal-body">
            <div class="form-group">
                <label class=" form-control-label">ID User</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-code"></i></div>
                            <input class="form-control" name="id_user" autocomplete="off" value="<?= $detailUser ['id_user'] ?>">
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Username</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control" name="username" value="<?= $detailUser ['username'] ?>">
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input class="form-control" name="password" autocomplete="off" value="<?= $detailUser ['password'] ?>">
                    </div>
            </div>

            <div class="form-group">
                <label class=" form-control-label">Nama User</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-group"></i></div>
                            <input class="form-control" name="nama" autocomplete="off" value="<?= $detailUser ['nama'] ?>">
                    </div>
            </div>

            <div class="form-group">
                <label for="select" class=" form-control-label">Level</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-list-ul"></i></div>
                            <select name="level" class="form-control">
                                <option value="#">-- Pilih Salah Satu --</option>
                                <option <?=$detailUser['level']== 'admin' ? 'selected':null;?> value="admin">Admin</option>
                                <option <?=$detailUser['level']== 'kasir' ? 'selected':null;?> value="kasir">Kasir</option>
                            </select>
                    </div>
            </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Simpan Data</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php } ?>
<!-- /Modal Edit-->

<!-- Modal Hapus -->
<?php foreach ($ListUser as $key => $detailUser) { ?>
                         <div class="modal fade" id="modalHapus_<?= $detailUser['username'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus User</h5>
                                </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/user/hapus">
                                            <div class="form-group">
                                                            <input type="hidden" class="form-control" name="username" value="<?= $detailUser ['username'] ?>">
                                                            <p>Apakah anda ingin menghapus <b><?= $detailUser ['username'] ?>?</b></p>
                                                </div>

                                                    <div class="form-actions form-group">
                                                        <a href="/user/hapus/<?= $detailUser['username'] ?>" class="btn btn-primary btn-sm">Hapus</a>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

    <?php $this->endSection('content'); ?>
                            