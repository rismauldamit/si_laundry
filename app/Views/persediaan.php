<?= $this->extend('layout/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Persediaan</h1>
    <nav>
    </nav>
  </div>
  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Persediaan Barang</h5>

        <!-- Floating Labels Form -->
        <form class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
              <label for="floatingName">Kode Barang</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
              <label for="floatingEmail">Kode Pengguna</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Nama Barang</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
              <label for="floatingCity">Tanggal Barang</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
              <label for="floatingCity">Jumlah Barang</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
              <label for="floatingCity">Harga Barang</label>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-info">Simpan</button>
            <button type="reset" class="btn btn-warning">Kembali</button>
          </div>
        </form><!-- End floating Labels Form -->

      </div>
    </div>
  </div>
</main>
<?= $this->endSection(); ?>