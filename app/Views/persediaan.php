<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Persediaan</h1>

    <?= $this->include('component/message'); ?>

    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Data Persediaan Laundry</h5>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">
              + Tambah
            </button>
            <a class="btn btn-success" href="/laporan-persedian-print">
              Laporan Pengeluaran
            </a>
          </div>
        </div>
        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Status</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listpersediaan as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['nama_barang']; ?></td>
                <td><?= $item['status']; ?></td>
                <td><?= $item['jumlah']; ?></td>
                <td><?= IDR($item['harga_barang'] * $item['jumlah']); ?></td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $index; ?>">Hapus</button>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusModal<?= $index; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" <?= $index; ?> aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/persediaan'); ?>" class="modal-content" method="POST">
                        <!-- Mengubah Jadi Method Delete -->
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_persediaan" value="<?= $item['id_persediaan']; ?>">

                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusModalLabel<?= $index; ?>">Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Yakin Hapus Data ?<?= $item['nama_barang']; ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Ya</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Akhir Modal Hapus -->

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <!-- Modal Tambah Transaksi -->
        <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('/persediaan'); ?>" class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Persediaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="inputText" class="col-form-label">Barang</label>
                  <select name="id_barang_persediaan" class="form-select" aria-label="Default select example">
                    <?php foreach ($listbarangpersediaan as $item) : ?>
                      <option value="<?= $item["id_barang_persediaan"]; ?>"><?= $item["nama_barang"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="inputText" class="col-form-label">Barang</label>
                  <select name="status" class="form-select" aria-label="Default select example">
                    <option value="masuk">Masuk</option>
                    <option value="keluar">Keluar</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input name="jumlah" type="number" class="form-control" id="jumlah">
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