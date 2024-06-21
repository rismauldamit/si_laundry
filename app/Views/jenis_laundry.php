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
              <th scope="col">Harga</th>
              <th scope="col">Satuan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>firoh</td>
              <td>Designer</td>
              <td>28</td>
              <td><button type="button" class="btn btn-warning btn-sm">Ubah</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
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