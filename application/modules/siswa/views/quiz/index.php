<small class="text-danger">Batas Waktu : <?= format_indo($quiz->batas_waktu) . ' || Sisa Quota ' . $quiz->quota . ' Orang'; ?></small>

<h5><b><?= $quiz->nama_quiz; ?></b></h5>
<p><?= $quiz->deskripsi; ?></p>

<?php
if (isset($cek)) {
  echo '<strong>Jawaban : </strong><br>' . $cek->jawaban;
} ?>

<?php if ($cek == null) {
  if ($quiz->quota > 0) { ?>
    <form action="<?= base_url('siswa/quiz/kirimJawaban/' . $quiz->id_qz_quiz); ?>" method="POST">
      <div class="form-group">
        <label for=""><strong>Jawaban :</strong></label>
        <textarea name="jawaban" class="form-control" id="" cols="30" rows="10"></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-2 px-5">Kirim <i class="fa fa-send"></i></button>
    </form>

<?php } else {
    echo 'Kuota quiz telah habis. Tunggu quiz selanjutnya yah';
  }
} ?>