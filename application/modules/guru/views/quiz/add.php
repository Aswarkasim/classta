<a href="<?= base_url('guru/quiz'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

<h4><b>Buat Quiz</b></h4>


<?php

if ($this->uri->segment(3) == 'add') {
  echo form_open(base_url('guru/quiz/add'));
} else {
  echo form_open(base_url('guru/quiz/edit/' . $quiz->id_qz_quiz));
}



?>

<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-9">
    <div class="form-group">
      <?php echo validation_errors('<span class="text-danger">', '</span><br>') ?>
    </div>
  </div>
</div>

<form method="post">
  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Nama Quiz</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <input type="text" class="form-control" name="nama_quiz" value="<?= isset($quiz) ? $quiz->nama_quiz : set_value('nama_quiz'); ?>" placeholder="Quiz">
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Quota</label>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="number" class="form-control" name="quota" value="<?= isset($quiz) ? $quiz->quota : set_value('quota'); ?>" placeholder="Quota">
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Batas Waktu</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <input type="datetime-local" class="form-control" name="batas_waktu" value="<?= isset($quiz) ? $quiz->batas_waktu : set_value('batas_waktu'); ?>">
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Status</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <div class="form-check form-switch">
          <input class="form-check-input" value="1" <?php if (isset($quiz)) {
                                                      if ($quiz->is_active) {
                                                        echo 'checked';
                                                      }
                                                    } ?> name="is_active" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault"></label>
        </div>
      </div>
    </div>
  </div>




  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Deskripsi</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <textarea name="deskripsi" class="form-control" id="editor" cols="30" rows="10"><?= isset($quiz) ? $quiz->deskripsi : set_value('deskripsi'); ?></textarea>
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

<?php echo form_close() ?>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>