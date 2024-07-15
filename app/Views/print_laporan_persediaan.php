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
        <h2 style="text-align: center; margin: 0;">LAPORAN PENGELUARAN</h2>
        <h3 style="text-align: center; margin: -4 0 10 0;">Mama Laundry</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_pengeluaran= 0 ?>
            <?php foreach ($list_persediaan as $index => $persediaan) : ?>
                <tr>
                    <th scope="row"><?= $index + 1; ?></th>
                    <td><?= $persediaan['nama_barang']; ?></td>
                    <td><?= $persediaan['harga_barang']; ?></td>
                    <td><?= $persediaan['jumlah']; ?></td>
                    <td><?= IDR($persediaan['jumlah'] * $persediaan['harga_barang']); ?></td>
                    <?php $total_pengeluaran += $persediaan['jumlah'] * $persediaan['harga_barang']  ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Total :</td>
                <td><?= IDR($total_pengeluaran); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>