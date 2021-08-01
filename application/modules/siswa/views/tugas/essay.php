<a href="<?= base_url('siswa/tugas'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

<div class="accordion" id="accordionExample">
  <?php foreach ($jawaban as $row) { ?>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $row->id_tug_essay_jawaban; ?>" aria-expanded="true" aria-controls="collapseOne<?= $row->id_tug_essay_jawaban; ?>">
          <?= $row->soal; ?>
        </button>
      </h2>
      <div id="collapseOne<?= $row->id_tug_essay_jawaban; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p><?= $row->jawaban; ?></p>
          <?php include('jawab_modal.php') ?>
        </div>
      </div>
    </div>
  <?php } ?>
</div>