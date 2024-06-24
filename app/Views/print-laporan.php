<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table tr td,
    th {
        border: 1px solid #000;
        padding: 5px;
    }
</style>

<body>

    <div>
        <h2 style="text-align: center; margin: 0;">LAPORAN TRANSAKSI</h2>
        <h3 style="text-align: center; margin: -4 0 10 0;">Mama Laundry</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Barang</th>
                <th>Jumlah/Harga</th>
                <th>Total Harga</th>
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
                            <td style="font-size: 12px;">
                                <span><?= $barang['jumlah'] . " " . $barang['satuan']; ?> x</span>
                                <span><?= IDR($barang['harga_barang']); ?></span>
                            </td>
                            <td rowspan="<?= $jumlahBarang; ?>"><?= IDR($transaksi['total_harga']); ?></td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <!-- Data Barang -->
                            <td style="font-size: 12px;"><?= $barang['nama_jenis']; ?></td>
                            <td style="font-size: 12px;">
                                <span><?= $barang['jumlah'] . " " . $barang['satuan']; ?> x</span>
                                <span><?= IDR($barang['harga_barang']); ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>


            <?php endforeach; ?>
            <tr>
                <td colspan="5">Total :</td>
                <td><?= IDR($total_pendapatan); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>