<?= $this->extend('layout/karyawan_layout'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Persediaan</h1>
  <nav>
  </nav>
</div>

<div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns"><div class="datatable-top">
    <div class="datatable-dropdown">
      <button type="button" class="btn btn-primary">+ Tambah User</button>
        </div>
    <div class="datatable-search">
            <input class="datatable-input" placeholder="Search..." type="search" name="search" title="Search within table">
    </div>
</div>
<div class="datatable-container"><table class="table datatable datatable-table"><thead><tr><th data-sortable="true" style="width: 26.88296639629201%;"><button class="datatable-sorter">
                      <b>N</b>ame
                    </button></th><th data-sortable="true" style="width: 9.154113557358054%;">
                    <button class="datatable-sorter">Ext.</button></th><th data-sortable="true" style="width: 28.50521436848204%;">
                    <button class="datatable-sorter">City</button></th><th data-format="YYYY/DD/MM" data-sortable="true" data-type="date" style="width: 16.917728852838934%;">
                    <button class="datatable-sorter">Start Date</button></th><th data-sortable="true" class="red" style="width: 18.53997682502897%;">
                    <button class="datatable-sorter">Completion</button></th></tr></thead>
                    <tbody>
                      <tr data-index="0">
                        <td>Aya</td>
                        <td>9958</td><td>Curicó</td>
                        <td>2005/02/11</td>
                        <td class="green">37%</td>
                      </tr>
                    </tbody>
                    </table>
</div>
    <div class="datatable-bottom">
    <div class="datatable-info">Showing 1 to 10 of 100 entries</div>
    <nav class="datatable-pagination"><ul class="datatable-pagination-list"><li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">‹</button></li><li class="datatable-pagination-list-item datatable-active"><button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">1</button></li><li class="datatable-pagination-list-item"><button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2">2</button></li><li class="datatable-pagination-list-item"><button data-page="3" class="datatable-pagination-list-item-link" aria-label="Page 3">3</button></li><li class="datatable-pagination-list-item"><button data-page="4" class="datatable-pagination-list-item-link" aria-label="Page 4">4</button></li><li class="datatable-pagination-list-item"><button data-page="5" class="datatable-pagination-list-item-link" aria-label="Page 5">5</button></li><li class="datatable-pagination-list-item"><button data-page="6" class="datatable-pagination-list-item-link" aria-label="Page 6">6</button></li><li class="datatable-pagination-list-item"><button data-page="7" class="datatable-pagination-list-item-link" aria-label="Page 7">7</button></li><li class="datatable-pagination-list-item datatable-ellipsis datatable-disabled"><button class="datatable-pagination-list-item-link">…</button></li><li class="datatable-pagination-list-item"><button data-page="10" class="datatable-pagination-list-item-link" aria-label="Page 10">10</button></li><li class="datatable-pagination-list-item"><button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2">›</button></li></ul></nav>
</div>
</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>

</main>
<?= $this->endSection(); ?>
