<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>User</h1>

    <?= $this->include('component/message'); ?>

    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Data User</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">
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
              <th scope="col">Level/Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listuser as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['username']; ?></td>
                <td><i>Password Disembunyikan</i></td>
                <td><?= $item['role']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $index; ?>">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $index; ?>">Hapus</button>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusModal<?= $index; ?>" tabindex="-1" aria-labelledby="hapusModal<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
                        <!-- Mengubah Jadi Method Delete -->
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusModal<?= $index; ?>Label">Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Yakin Hapus Data ? <?= $item['username']; ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Ya</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir Modal Hapus -->

                  <!-- Awal dari Modal Edit -->
                  <div class="modal fade" id="editModal<?= $index; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel<?= $index; ?>">Edit User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="<?= $item['username']; ?>" name="username" class="form-control" id="username">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>

                            <!-- Input Password tanpa Value Karena Password Sudah DiHash -->
                            <input type="password" name="password" class="form-control" id="password">
                          </div>
                          <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" value="<?= $item['role']; ?>" name="role" class="form-control" id="role">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir dari Modal Edit -->

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <!-- Modal Tambah Transaksi -->
        <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('/user'); ?>" class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input name="username" type="text" class="form-control" id="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Level/Role</label>
                  <select name="role" class="form-select" aria-label="Default select example">
                    <option value="karyawan">Karyawan</option>
                    <option value="admin">Admin</option>
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
        <!-- Akhir Modal Tambah Transaksi -->
      </div>
    </div>
</main>
<?= $this->endSection(); ?>