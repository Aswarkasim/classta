<table class="table table-striped">
  <tr>
    <th>No</th>
    <th>Modul</th>
    <th>Status</th>
  </tr>

  <?php $no = 1;
  foreach ($modul as $row) { ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><a href="<?= base_url('siswa/modul/detail/' . $row->id_modul) ?>" class="link"><b><?= $row->nama_modul; ?></b></a></td>
      <td>
        <?= $row->is_active == 1 ? '<span class="text-success">Aktif</span>' : '<span class="text-danger">Tidak Aktif</span>'; ?>
      </td>
    </tr>
  <?php } ?>
</table>


<div class="row">
  <div class="col-md-12">
    <div class="text-center">
      <?= $pagination ?>
    </div>
  </div>
</div>