<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pelanggan</h1>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Pelanggan</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahPelanggan">
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
            <?php foreach ($list_pelanggan as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['nama']; ?></td>
                <td><?= $item['telp']; ?></td>
                <td><?= $item['alamat']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditPelanggan<?= $index; ?>">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusPelanggan<?= $index; ?>">Hapus</button>

                  <!-- Modal Edit Pelanggan -->
                  <div class="modal fade" id="ModalEditPelanggan<?= $index; ?>" tabindex="-1" aria-labelledby="ModalEditPelanggan<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
                        <!-- METHOD PUT -->
                        <input type="hidden" name="_method" value="PUT">

                        <!-- ID PRIMARY KEY Pelanggan -->
                        <input type="hidden" name="id_pelanggan" value="<?= $item['id_pelanggan']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalEditPelanggan<?= $index; ?>Label">Edit Pelanggan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Nama -->
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input value="<?= $item['nama']; ?>" type="text" class="form-control" id="nama" name="nama">
                          </div>
                          <!-- Alamat -->
                          <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input value="<?= $item['alamat']; ?>" type="text" class="form-control" id="alamat" name="alamat">
                          </div>
                          <!-- Telepon -->
                          <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input value="<?= $item['telp']; ?>" type="text" class="form-control" id="telp" name="telp">
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
                      <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_pelanggan" value="<?= $item['id_pelanggan']; ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalHapusPelanggan<?= $index; ?>Label">Hapus Pelanggan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah Anda yakin ingin menghapus <br> pelanggan <span class="fw-bold"><?= $item['nama']; ?></span> ?</p>
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

  <!-- Modal Tambah Pelanggan -->
  <div class="modal fade" id="ModalTambahPelanggan" tabindex="-1" aria-labelledby="ModalTambahPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="<?= base_url('/pelanggan'); ?>" class="modal-content" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambahPelangganLabel">Tambah Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Nama -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <!-- Alamat -->
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
          </div>
          <!-- Telepon -->
          <div class="mb-3">
            <label for="telp" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp">
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