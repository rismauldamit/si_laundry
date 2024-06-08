<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Persediaan</h1>
    <div class="card mt-2">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Tabel Data Persediaan</h5>
          <button type="button" class="btn btn-primary">+ Tambah</button>
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
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td>Designer</td>
              <td>28</td>
              <td><button type="button" class="btn btn-warning btn-sm">Ubah</button>
              <button type="button" class="btn btn-danger btn-sm">Hapus</button>
            </td>
            </tr>
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
  </div>
  <!-- End Table with stripped rows -->

  </div>
  </div>

  </div>

</main>
<?= $this->endSection(); ?>