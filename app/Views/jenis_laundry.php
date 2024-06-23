<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Jenis Laundry</h1>
    <?= $this->include('component/message'); ?>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Jenis Laundry</h5>
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
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listJenisLaundry as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['nama_jenis']; ?></td>
                <td><?= $item['satuan']; ?></td>
                <td><?= $item['harga']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm">Ubah</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusmodal">Hapus</button>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusmodal" tabindex="-1" aria-labelledby="hapusmodalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/jenis_laundry'); ?>" class="modal-content" method="POST">
                        <!-- Mengubah Menjadi Method Hapus -->
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_jenis_laundry" value="<?= $item['id_jenis_laundry']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusmodalLabel">Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Yakin Hapus Data ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Ya</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir dari Model Hapus -->
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <!-- Awal Model Tambah -->

        <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('/jenis_laundry'); ?>" class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Jenis Laundry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama_jenis" class="form-label">Nama</label>
                  <input type="text" name="nama_jenis" class="form-control" id="nama_jenis">
                </div>
                <div class="mb-3">
                  <label for="satuan" class="form-label">Satuan</label>
                  <input type="text" name="satuan" class="form-control" id="satuan">
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" name="harga" class="form-control" id="harga">
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