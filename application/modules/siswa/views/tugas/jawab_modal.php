<button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $row->id_tug_essay_jawaban  ?>">
  Jawab
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?= $row->id_tug_essay_jawaban  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalsdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalsdropLabel"><?= 'Jawaban Soal Nomor ' . $row->no_soal ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('siswa/tugas/submitEssay/' . $row->id_tug_essay_jawaban); ?>" method="POST">
          <input type="hidden" name="id_tug_tugas" value="<?= $row->id_tug_tugas; ?>">
          <textarea name="jawaban<?= $row->id_tug_essay_jawaban; ?>" id="editorJawab<?= $row->id_tug_essay_jawaban; ?>" cols="30" rows="10">
          <?= $row->jawaban; ?>
        </textarea>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editorJawab<?= $row->id_tug_essay_jawaban; ?>");
</script>