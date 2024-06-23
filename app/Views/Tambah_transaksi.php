<?= $this->extend('layout/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Form Elements</h5>

                <!-- General Form Elements -->
                <form action="/transaksi/tambah_transaksi" method="POST">
                    <div class="mb-3">
                        <label for="inputText" class="col-form-label">Pelanggan</label>
                        <select name="id_pelanggan" class="form-select" aria-label="Default select example">
                            <?php foreach ($list_pelanggan as $item) : ?>
                                <option value="<?= $item["id_pelanggan"]; ?>"><?= $item["nama"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div id="container-inputs">
                        <!-- anak 0 -->
                        <div class="row ">
                            <div class="mb-3 col-6">
                                <label for="inputPassword" class="col-form-label">Barang</label>
                                <select name="barang[0][id_jenis_laundry]" class="form-select" aria-label="Default select example">
                                    <?php foreach ($list_jenis_barang as $item) : ?>
                                        <option value="<?= $item['id_jenis_laundry']; ?>"><?= $item['nama_jenis'] . " / " . $item['harga']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class=" mb-3 col-6">
                                <label for="inputNumber" class="col-form-label">Jumlah</label>
                                <input type="number" min="1" value="1" class="form-control" name="barang[0][jumlah]">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button id="btn-tambah" type="button" class="btn btn-secondary btn-sm">Tambah Barang</button>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>
</main>


<script>
    const containerInputs = document.querySelector('#container-inputs');
    const buttonTambah = document.querySelector('#btn-tambah');


    buttonTambah.addEventListener('click', () => {
        const length = containerInputs.children.length;
        const div = document.createElement('div');
        div.classList.add('row');
        div.innerHTML = `
         <div class="mb-3 col-6">
                                <label for="inputPassword" class="col-form-label">Barang</label>
                                <select name="barang[${length}][id_jenis_laundry]" class="form-select" aria-label="Default select example">
                                    <?php foreach ($list_jenis_barang as $item) : ?>
                                        <option value="<?= $item['id_jenis_laundry']; ?>"><?= $item['nama_jenis']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class=" mb-3 col-6">
                                <label for="inputNumber" class="col-form-label">Jumlah</label>
                                <input type="number" value="1" min="1" class="form-control" name="barang[${length}][jumlah]">
                            </div>
        `;
        containerInputs.appendChild(div);
    });
</script>
<?= $this->endSection(); ?>