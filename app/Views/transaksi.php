<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Transaksi</h1>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Transaksi</h5>
          <a href="/transaksi/tambah_transaksi" class="btn btn-primary" >
            + Tambah
          </a>
        </div>
        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat </th>
              <th scope="col">Barang</th>
              <th scope="col">Jumlah/Harga</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>

    <!-- Modal Tambah Transaksi -->
  </div>
  <!-- End Table with stripped rows -->

</main>
<?= $this->endSection(); ?>