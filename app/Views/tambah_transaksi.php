<?= $this->extend('layout/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<!-- CODE HERE -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="mt-4">
                <h5 class="fw-bold">Form Tambah Transaksi</h5>
            </div>
            <form action="" class="mt-3" method="POST">
                <div class="mb-3">
                    <label for="pelanggan" class="form-label fw-bold">Pelanggan</label>
                    <select class="form-select" id="pelanggan" name="id_pelanggan">
                        <?php foreach ($list_pelanggan as $item) : ?>
                            <option value="<?= $item['id_pelanggan']; ?>"><?= $item['nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="d-flex fw-bold mt-2">
                    Daftar Barang
                </div>
                <div class="container-inputs">
                    <div class="row">
                        <div class="col">
                            <label for="barang" class="form-label">Jenis Barang</label>
                            <select class="form-select" id="barang" name="barang[0][id_jenis]">
                                <?php foreach ($list_jenis_laundry as $item) : ?>
                                    <option value="<?= $item['id_jenis_laundry']; ?>"><?= $item['nama_jenis'] . " (" . $item['satuan'] . ") - Rp." . $item['harga']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="barang[0][jumlah]">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-secondary tambah">+ Tambah Barang</button>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Transaksi</button>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- CODE HERE -->
<script>
    const containerInputs = document.querySelector('.container-inputs');
    const buttonTambah = document.querySelector('.btn-secondary.tambah');


    buttonTambah.addEventListener('click', () => {
        const length = containerInputs.children.length;
        const div = document.createElement('div');
        div.classList.add('row');
        div.classList.add('mt-3');
        div.innerHTML = `
            <div class="col">
                <label for="barang" class="form-label">Jenis Barang</label>
                    <select class="form-select" id="barang" name="barang[${length}][id_jenis]">
                        <?php foreach ($list_jenis_laundry as $item) : ?>
                            <option value="<?= $item['id_jenis_laundry']; ?>"><?= $item['nama_jenis'] . " (" . $item['satuan'] . ") - Rp" . $item['harga']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            <div class="col">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="barang[${length}][jumlah]">
            </div>
        `;
        containerInputs.appendChild(div);
    });
</script>
<?= $this->endSection(); ?>