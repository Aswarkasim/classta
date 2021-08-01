<table class="table table-striped">
  <tr>
    <th>No</th>
    <th>Nama Tugas</th>
    <th>Status</th>
  </tr>

  <?php $no = 1;
  foreach ($tugas as $row) { ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><a href="<?= base_url('siswa/tugas/detail/' . $row->id_tug_tugas); ?>" class="link"><b><?= $row->nama_tugas; ?></b></a></td>
      <td>
        <?= $row->is_active == 1 ? '<span class="text-success">Proses..</span>' : '<span class="text-danger">Selesai</span>'; ?>
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