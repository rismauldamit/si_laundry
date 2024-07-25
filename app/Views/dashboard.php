<?= $this->extend('layout/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Selamat Datang, <?= session('username'); ?> anda login sebagai <?= session('role'); ?></h1>
  </div>
  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <a href="/transaksi">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Transaksi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-grid"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_transaksi; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </a>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <a href="/user">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_user; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </a>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
            <a href="/pelanggan">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Pelanggan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-group'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_pelanggan; ?></h6>
                    </div>
                  </div>

                </div>
              </div>
            </a>
          </div><!-- End Customers Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

      </div><!-- End Right side columns -->

    </div>
  </section>
</main>
<?= $this->endSection(); ?>