<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Transaksi</h1>
    <?= $this->include('component/message'); ?>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Transaksi</h5>
          <a href="/transaksi/tambah_transaksi" class="btn btn-primary">
            + Tambah
          </a>
        </div>
        <!-- Table with stripped rows -->
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Barang</th>
              <th scope="col">Jumlah/Harga</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Menampilkan data Transaksi -->
            <?php foreach ($list_transaksi as $index => $transaksi) : ?>

              <!-- Menghitung jumlah data barang untuk Rowspan -->
              <?php $jumlahBarang = sizeof($transaksi['barang']); ?>

              <!-- Menampilkan Data Barang -->
              <?php foreach ($transaksi['barang'] as $barangIndex => $barang) : ?>

                <?php if ($barangIndex === 0) : ?>
                  <tr>
                    <!-- Data transaksi -->
                    <th scope="row" rowspan="<?= $jumlahBarang; ?>"><?= $index + 1; ?></th>
                    <td rowspan="<?= $jumlahBarang; ?>"><?= $transaksi['nama']; ?></td>
                    <td rowspan="<?= $jumlahBarang; ?>"><?= $transaksi['alamat']; ?></td>

                    <!-- Data Barang -->
                    <td style="font-size: 12px;"><?= $barang['nama_jenis']; ?></td>
                    <td style="font-size: 12px;" class="d-flex justify-content-between">
                      <div><?= $barang['jumlah'] . " " . $barang['satuan']; ?></div>
                      <div><?= $barang['harga_barang']; ?></div>
                    </td>
                    <td rowspan="<?= $jumlahBarang; ?>"><?= $transaksi['total_harga']; ?></td>
                    <td rowspan="<?= $jumlahBarang; ?>">
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $index; ?>">Hapus</button>

                      <div class="modal fade" id="hapusModal<?= $index; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $index; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <form action="<?= base_url('/transaksi'); ?>" class="modal-content" method="POST">
                            <!-- Mengubah Jadi Method Delete -->
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">

                            <div class="modal-header">
                              <h5 class="modal-title" id="hapusModalLabel<?= $index; ?>">Hapus Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Yakin Hapus Data? <?= $transaksi['nama']; ?></p>
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
                <?php else : ?>
                  <tr>
                    <!-- Data Barang -->
                    <td style="font-size: 12px;"><?= $barang['nama_jenis']; ?></td>
                    <td style="font-size: 12px;" class="d-flex justify-content-between">
                      <div><?= $barang['jumlah'] . " " . $barang['satuan']; ?></div>
                      <div><?= $barang['harga_barang']; ?></div>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>


            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->
      </div>
    </div>
  </div>
</main>
<?= $this->endSection(); ?>