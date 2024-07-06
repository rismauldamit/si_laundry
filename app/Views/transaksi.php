<?= $this->extend('layout/karyawan_layout'); ?>
<!-- Menggunakan layout karyawan_layout sebagai template utama -->

<?= $this->section('content'); ?>
<!-- Memulai bagian konten yang akan dimasukkan ke dalam layout -->

<main id="main" class="main">
  <!-- Tag utama untuk bagian konten utama -->
  <div class="pagetitle">
    <!-- Div untuk judul halaman -->
    <h1>Transaksi</h1>
    <!-- Menampilkan judul halaman "Transaksi" -->
    <?= $this->include('component/message'); ?>
    <!-- Menyertakan komponen pesan untuk menampilkan notifikasi -->

    <div class="card mt-2">
      <!-- Membuat kartu dengan margin atas -->
      <div class="card-body">
        <!-- Isi dari kartu -->
        <div class="d-flex justify-content-between align-items-center">
          <!-- Flexbox untuk mengatur elemen secara horizontal dengan ruang di antara mereka -->
          <h5 class="card-title">Tabel Data Transaksi</h5>
          <!-- Menampilkan judul kartu "Tabel Data Transaksi" -->
          <div class="d-flex gap-2">
            <!-- Flexbox dengan jarak antar elemen -->
            <a href="/laporan-print" class="btn btn-success">
              <!-- Tombol untuk mencetak laporan -->
              Print Laporan
            </a>
            <a href="/transaksi/tambah_transaksi" class="btn btn-primary">
              <!-- Tombol untuk menambah transaksi baru -->
              + Tambah
            </a>
          </div>
        </div>
        <!-- Table with stripped rows -->
        <table class="table">
          <!-- Membuat tabel -->
          <thead>
            <!-- Bagian header tabel -->
            <tr>
              <!-- Baris header tabel -->
              <th scope="col">No</th>
              <!-- Kolom untuk nomor -->
              <th scope="col">Nama</th>
              <!-- Kolom untuk nama -->
              <th scope="col">Alamat</th>
              <!-- Kolom untuk alamat -->
              <th scope="col">Barang</th>
              <!-- Kolom untuk barang -->
              <th scope="col">Jumlah/Harga</th>
              <!-- Kolom untuk jumlah dan harga -->
              <th scope="col">Total Harga</th>
              <!-- Kolom untuk total harga -->
              <th scope="col">Aksi</th>
              <!-- Kolom untuk aksi -->
            </tr>
          </thead>
          <tbody>
            <!-- Menampilkan data Transaksi -->
            <?php foreach ($list_transaksi as $index => $transaksi) : ?>
            <!-- Loop untuk iterasi melalui setiap transaksi dalam $list_transaksi -->

              <!-- Menghitung jumlah data barang untuk Rowspan -->
              <?php $jumlahBarang = sizeof($transaksi['barang']); ?>
              <!-- Menghitung jumlah barang dalam transaksi untuk digunakan dalam rowspan -->

              <!-- Menampilkan Data Barang -->
              <?php foreach ($transaksi['barang'] as $barangIndex => $barang) : ?>
              <!-- Loop melalui setiap barang dalam transaksi -->

                <?php if ($barangIndex === 0) : ?>
                <!-- Jika barang adalah yang pertama dalam daftar -->
                  <tr>
                    <!-- Membuat baris baru -->
                    <!-- Data transaksi -->
                    <th scope="row" rowspan="<?= $jumlahBarang; ?>"><?= $index + 1; ?></th>
                    <!-- Menampilkan nomor transaksi dengan rowspan -->
                    <td rowspan="<?= $jumlahBarang; ?>"><?= $transaksi['nama']; ?></td>
                    <!-- Menampilkan nama dengan rowspan -->
                    <td rowspan="<?= $jumlahBarang; ?>"><?= $transaksi['alamat']; ?></td>
                    <!-- Menampilkan alamat dengan rowspan -->

                    <!-- Data Barang -->
                    <td style="font-size: 12px;"><?= $barang['nama_jenis']; ?></td>
                    <!-- Menampilkan jenis barang -->
                    <td style="font-size: 12px;" class="d-flex justify-content-between">
                      <!-- Menampilkan jumlah dan harga barang dengan format flexbox -->
                      <div><?= $barang['jumlah'] . " " . $barang['satuan']; ?></div>
                      <!-- Menampilkan jumlah barang dan satuannya -->
                      <div><?= IDR($barang['harga_barang']); ?></div>
                      <!-- Menampilkan harga barang dalam format IDR -->
                    </td>
                    <td rowspan="<?= $jumlahBarang; ?>"><?= IDR($transaksi['total_harga']); ?></td>
                    <!-- Menampilkan total harga dengan rowspan -->
                    <td rowspan="<?= $jumlahBarang; ?>">
                      <!-- Menampilkan tombol aksi dengan rowspan -->
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $index; ?>">Hapus</button>
                      <!-- Tombol untuk menghapus transaksi, membuka modal konfirmasi -->

                      <div class="modal fade" id="hapusModal<?= $index; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $index; ?>" aria-hidden="true">
                        <!-- Modal konfirmasi penghapusan -->
                        <div class="modal-dialog">
                          <form action="<?= base_url('/transaksi'); ?>" class="modal-content" method="POST">
                            <!-- Mengubah Jadi Method Delete -->
                            <input type="hidden" name="_method" value="DELETE">
                            <!-- Input tersembunyi untuk metode DELETE -->
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <!-- Input tersembunyi untuk id transaksi -->

                            <div class="modal-header">
                              <h5 class="modal-title" id="hapusModalLabel<?= $index; ?>">Hapus Data</h5>
                              <!-- Header modal dengan judul "Hapus Data" -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              <!-- Tombol untuk menutup modal -->
                            </div>
                            <div class="modal-body">
                              <p>Yakin Hapus Data? <?= $transaksi['nama']; ?></p>
                              <!-- Pesan konfirmasi penghapusan -->
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Ya</button>
                              <!-- Tombol untuk mengkonfirmasi penghapusan -->
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <!-- Tombol untuk membatalkan penghapusan -->
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- Akhir Modal Hapus -->
                    </td>
                  </tr>
                <?php else : ?>
                <!-- Jika barang bukan yang pertama -->
                  <tr>
                    <!-- Data Barang -->
                    <td style="font-size: 12px;"><?= $barang['nama_jenis']; ?></td>
                    <!-- Menampilkan jenis barang -->
                    <td style="font-size: 12px;" class="d-flex justify-content-between">
                      <!-- Menampilkan jumlah dan harga barang dengan format flexbox -->
                      <div><?= $barang['jumlah'] . " " . $barang['satuan']; ?></div>
                      <!-- Menampilkan jumlah barang dan satuannya -->
                      <div><?= IDR($barang['harga_barang']); ?></div>
                      <!-- Menampilkan harga barang dalam format IDR -->
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
<!-- Mengakhiri bagian konten -->
