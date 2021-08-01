<a href="<?= base_url('guru/modul'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

<h4><b>Tambah Modul</b></h4>


<?php

if ($this->uri->segment(3) == 'add') {
  echo form_open_multipart(base_url('guru/modul/add'));
} else {
  echo form_open_multipart(base_url('guru/modul/edit/' . $modul->id_modul));
}

?>
<form method="post">
  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Nama Modul</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <input type="text" class="form-control" name="nama_modul" value="<?= isset($modul) ? $modul->nama_modul : set_value('nama_modul'); ?>" placeholder="Nama Modul">
      </div>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">File Modul</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <?php
        if (isset($error)) {
          echo "<span class='text-danger'>";
          echo $error;
          echo "</span>";
        }
        ?>
        <input type="file" class="form-control" name="file_modul" value="" placeholder="Nama Modul">
        <small>* Hanya menerima file berformat pdf</small>
      </div>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-3">
      <label for="" class="pull-right">Deskripsi/Pengantar</label>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <textarea name="deskripsi" class="form-control" id="editor" cols="30" rows="10"><?= isset($modul) ? $modul->deskripsi : set_value('deskripsi'); ?></textarea>
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