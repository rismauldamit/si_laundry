<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Jenis Laundry</h1>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Jenis Laundry</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahJenisLaundry">
            + Tambah
          </button>
        </div>
        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Satuan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list_jenis_laundry as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['nama_jenis']; ?></td>
                <td><?= $item['harga']; ?></td>
                <td><?= $item['satuan']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditJenisLaundry<?= $index; ?>">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusJenisLaundry<?= $index; ?>">Hapus</button>

                  <!-- Modal Edit Jenis Laundry -->
                  <div class="modal fade" id="ModalEditJenisLaundry<?= $index; ?>" tabindex="-1" aria-labelledby="ModalEditJenisLaundry<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/jenis_laundry'); ?>" class="modal-content" method="POST">
                        <!-- METHOD PUT -->
                        <input type="hidden" name="_method" value="PUT">

                        <!-- ID PRIMARY KEY Jenis Laundry -->
                        <input type="hidden" name="id_jenis_laundry" value="<?= $item['id_jenis_laundry']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalEditJenisLaundry<?= $index; ?>Label">Edit Jenis Laundry</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Nama -->
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input value="<?= $item['nama_jenis']; ?>" type="text" class="form-control" id="nama" name="nama_jenis">
                          </div>
                          <!-- Harga -->
                          <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input value="<?= $item['harga']; ?>" type="text" class="form-control" id="harga" name="harga">
                          </div>
                          <!-- Satuan -->
                          <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input value="<?= $item['satuan']; ?>" type="text" class="form-control" id="satuan" name="satuan">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <!-- Modal Hapus Jenis Laundry -->
                  <div class="modal fade  " id="ModalHapusJenisLaundry<?= $index; ?>" tabindex="-1" aria-labelledby="ModalHapusJenisLaundry<?= $index; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/jenis_laundry'); ?>" class="modal-content" method="POST">
                        <!-- METHOD DELETE -->
                        <input type="hidden" name="_method" value="DELETE">

                        <!-- ID PRIMARY KEY Jenis Laundry -->
                        <input type="hidden" name="id_jenis_laundry" value="<?= $item['id_jenis_laundry']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalHapusJenisLaundry<?= $index; ?>Label">Hapus Jenis Laundry</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
              </tr>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
  </div>

  <!-- Modal Tambah Jenis Laundry -->
  <div class="modal fade" id="ModalTambahJenisLaundry" tabindex="-1" aria-labelledby="ModalTambahJenisLaundryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambahJenisLaundryLabel">Tambah Jenis Laundry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Nama -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama_jenis">
          </div>
          <!-- Harga -->
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga">
          </div>
          <!-- Satuan -->
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>