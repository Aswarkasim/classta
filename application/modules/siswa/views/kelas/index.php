<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="shadow-sm p-3 mb-5 bg-body rounded">
        <div class="text-center">
          <h3><b>Kelas Saya</b></h3>
        </div>

        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalCariKelas">
          <i class="fa fa-search"></i> Cari Kelas
        </button>

        <div class="row">

          <?php foreach ($kelas as $row) { ?>
            <div class="col-md-3 mt-3">




              <div class="shadow-sm  bg-body rounded card overflow-hidden">
                <img src="<?= $row->cover != '' ? base_url($row->cover) : base_url('assets/img/thumb_orange.jpg'); ?>" class="img-fluid " alt="...">
                <div class="p-3 mb-1">
                  <h5><b><?= $row->nama_kelas; ?></b></h5>


                  <a href="<?= base_url('siswa/kelas/set_kelas/' . $row->id_kelas); ?>" class="btn btn-primary btn-block">Masuk</a>
                </div>

              </div>
            </div>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>
</div>





<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ModalCariKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= base_url('siswa/kelas/cari'); ?>" method="POST">
          <div class="form-group">
            <div class="mb-4 row">
              <label for="namaKelas" class="col-sm-4 col-form-label">Masukkan ID Kelas</label>
              <div class="col-sm-8">
                <input type="text" name="id_kelas" class="form-control" required id="namaKelas">
              </div>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>

      </form>
    </div>
  </div>
</div>