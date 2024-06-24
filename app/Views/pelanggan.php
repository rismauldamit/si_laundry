<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pelanggan</h1>
    <?= $this->include('component/message'); ?>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Pelanggan</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah">
            + Tambah
          </button>
        </div>
        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Telepon</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listpelanggan as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['nama']; ?></td>
                <td><?= $item['telp']; ?></td>
                <td><?= $item['alamat']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $index; ?>">Hapus</button>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusmodal<?= $index; ?>" tabindex="-1" aria-labelledby="hapusmodalLabel<?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
                        <!-- Mengubah Menjadi Method Hapus -->
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_pelanggan" value="<?= $item['id_pelanggan']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusmodalLabel<?= $index; ?>">Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Yakin Hapus Data <?= $item['nama']; ?> ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Ya</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir dari Model Hapus -->

                  <!-- Awal dari Model Edit -->
                  <div class="modal fade" id="modaledit <?= $index; ?>" tabindex="-1" aria-labelledby="modaleditLabel <?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_pelanggan" value="<?= $item['id_pelanggan']; ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modaleditLabel <?= $index; ?>">Tambah Pelanggan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                          </div>
                          <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" name="telp" class="form-control" id="telp">
                          </div>
                          <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir dari Model Edit -->
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <!-- Awal Model Tambah -->
        <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                  <label for="telp" class="form-label">Telepon</label>
                  <input type="text" name="telp" class="form-control" id="telp">
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Akhir Model Tambah -->
      </div>
    </div>
  </div>
  <!-- End Table with stripped rows -->
</main>
<?= $this->endSection(); ?>