<a href="<?= base_url('guru/tugas'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

<h4><b>Buat Tugas Diskusi</b></h4>


<?php

if ($this->uri->segment(3) == 'add') {
  echo form_open_multipart(base_url('guru/tugas/add'));
} else {
  echo form_open_multipart(base_url('guru/tugas/edit/' . $tugas->id_tug_tugas));
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
      <label for="" class="pull-right">Nama Tugas</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <input type="text" class="form-control" name="nama_tugas" value="<?= isset($tugas) ? $tugas->nama_tugas : set_value('nama_tugas'); ?>" placeholder="Tugas">
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
        <input type="datetime-local" class="form-control" name="batas_waktu" value="<?= isset($tugas) ? $tugas->batas_waktu : set_value('batas_waktu'); ?>">
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Lampiran</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <input type="file" class="form-control" name="lampiran" placeholder="Lampiran">
        <small class="text-danger">* Hanya menerima format .pdf</small>
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
          <input class="form-check-input" value="1" <?php if (isset($tugas)) {
                                                      if ($tugas->is_active) {
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

<?php echo form_close() ?>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>