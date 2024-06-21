<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>User</h1>
    <?= $this->include('components/_message'); ?>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel User</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
            + Tambah
          </button>
        </div>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list_user as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['username']; ?></td>
                <td><i>Password Disembunyikan</i></td>
                <td><?= $item['role']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditPelanggan<?= $index; ?>">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusPelanggan<?= $index; ?>">Hapus</button>

                  <!-- Modal Edit Pelanggan -->
                  <div class="modal fade" id="ModalEditPelanggan<?= $index; ?>" tabindex="-1" aria-labelledby="ModalEditPelanggan<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
                        <!-- METHOD PUT -->
                        <input type="hidden" name="_method" value="PUT">

                        <!-- ID PRIMARY KEY Pelanggan -->
                        <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalEditPelanggan<?= $index; ?>Label">Edit User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Username -->
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input value="<?= $item['username']; ?>" type="text" class="form-control" id="username" name="username">
                          </div>
                          <!-- Password -->
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                          </div>
                          <!-- Role -->
                          <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                              <option selected>Pilih Role</option>
                              <option value="admin" <?= $item['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                              <option value="karyawan" <?= $item['role'] === 'karyawan' ? 'selected' : ''; ?>>Karyawan</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <!-- Modal Konfirmasi Hapus -->
                  <div class="modal fade" id="ModalHapusPelanggan<?= $index; ?>" tabindex="-1" aria-labelledby="ModalHapusPelanggan<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalHapusPelanggan<?= $index; ?>Label">Hapus User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah Anda yakin ingin menghapus <br> user <span class="fw-bold"><?= $item['username']; ?></span> ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
  </div>
  <!-- End Table with stripped rows -->

  </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambahLabel">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Username -->
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <!-- Role -->
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
              <option selected>Pilih Role</option>
              <option value="admin">Admin</option>
              <option value="karyawan">Karyawan</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  </div>

</main>
<?= $this->endSection(); ?>