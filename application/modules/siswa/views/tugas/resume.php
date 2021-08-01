<a href="<?= base_url('siswa/tugas'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

<h5><strong>Soal</strong></h5>
<p><?= $tugas->nama_tugas; ?></p>
<p><?= $tugas->soal; ?></p>
<?php
echo form_open_multipart(base_url('siswa/tugas/submitResume/' . $tugas->id_tug_resume_jawaban));


?>





<h5><strong>Form Kirim</strong></h5>


<?php if ($tugas->dokumen == '') { ?>
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
      <div class="form-group">
        <?php
        echo validation_errors('<span class="text-danger">', '</span><br>');
        if (isset($error)) {
          echo '<span class="text-danger">' . $error . '</span><br>';
        }
        ?>
      </div>
    </div>
  </div>

  <form method="post">
    <input type="hidden" name="id_tug_tugas" value="<?= $tugas->id_tug_tugas; ?>">
    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Upload</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <input type="file" class="form-control" name="dokumen" required>
          <small class="text-danger">* Hanya menerima format .pdf</small>
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Deskripsi (Optional )</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <textarea name="deskripsi" class="form-control" id="editor" cols="30" rows="10"><?= isset($tugas) ? $tugas->deskripsi : set_value('deskripsi'); ?></textarea>
        </div>
      </div>
    </div>

    <br>
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-9">
        <button type="submit" class="btn btn-primary px-5">Buat</button>
      </div>
    </div>
  </form>

<?php echo form_close();
} else { ?>

  <a href="<?= base_url('siswa/tugas/downloadResume/' . $tugas->id_tug_resume_jawaban); ?>"><i class=" fa fa-download"></i> Dokumen Resume</a><br>
  <a href="<?= base_url('siswa/tugas/deleteResume/' . $tugas->id_tug_resume_jawaban); ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i> Hapus dan kirim ulang</a>
<?php } ?>


<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>