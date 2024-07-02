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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">
            + Tambah
          </button>
        </div>
        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Barang</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listpersediaan as $index => $item) : ?>
              <tr>
                <th scope="row"><?= $index + 1; ?></th>
                <td><?= $item['tanggal']; ?></td>
                <td><?= $item['jumlah']; ?></td>
                <td><?= $item['harga_satuan']; ?></td>
                <td><?= $item['nama_barang']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit">Ubah</button>
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

                  <!-- Awal dari Modal Edit -->
                  <div class="modal fade" id="modaledit<?= $index; ?>" tabindex="-1" aria-labelledby="modaleditLabel<?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('/persediaan'); ?>" class="modal-content" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id_persediaan" value="<?= $item['id_persediaan']; ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modaleditLabel<?= $index; ?>">Edit Persediaan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" value="<?= $item['tanggal']; ?>" name="tanggal" class="form-control" id="tanggal">
                          </div>
                          <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" value="<?= $item['jumlah']; ?>" name="jumlah" class="form-control" id="jumlah">
                          </div>
                          <div class="mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" value="<?= $item['harga_satuan']; ?>" name="harga_satuan" class="form-control" id="harga_satuan">
                          </div>
                          <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" value="<?= $item['nama_barang']; ?>" name="nama_barang" class="form-control" id="nama_barang">
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
            <form action="<?= base_url('/persediaan'); ?>" class="modal-content" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Persediaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="tanggal" class="form-label">tanggal</label>
                  <input name="tanggal" type="date" class="form-control" id="tanggal">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">jumlah</label>
                  <input name="jumlah" type="number" class="form-control" id="jumlah">
                </div>
                <div class="mb-3">
                  <label for="harga_satuan" class="form-label">harga satuan</label>
                  <input name="harga_satuan" type="number" class="form-control" id="harga_satuan">
                </div>
                <div class="mb-3">
                  <label for="nama_barang" class="form-label">nama barang</label>
                  <input name="nama_barang" type="text" class="form-control" id="nama_barang">
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