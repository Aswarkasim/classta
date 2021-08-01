<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="shadow-sm p-3 mb-5 bg-body rounded">
        <div class="text-center">
          <h3><b>List Kelas</b></h3>
        </div>

        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahKelas">
          <i class="fa fa-plus"></i> Buat Kelas
        </button>

        <div class="row">

          <?php foreach ($kelas as $row) { ?>
            <div class="col-md-3 mt-3">




              <div class="shadow-sm  bg-body rounded card overflow-hidden">
                <img src="<?= $row->cover != '' ? base_url($row->cover) : base_url('assets/img/thumb_orange.jpg'); ?>" class="img-fluid " alt="...">
                <div class="p-3 mb-1">
                  <h5><b><?= $row->nama_kelas; ?></b></h5>

                  <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Pilihan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#"><i class="fa fa-edit"></i> Ubah Nama</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Non Aktifkan</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Hapus</a></li>
                    </ul>
                  </div>

                  <a href="<?= base_url('guru/kelas/set_kelas/' . $row->id_kelas); ?>" class="btn btn-primary btn-block">Buka</a>
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
<div class="modal fade" id="ModalTambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= base_url('guru/kelas/add'); ?>" method="POST">
          <div class="form-group">
            <div class="mb-4 row">
              <label for="namaKelas" class="col-sm-2 col-form-label">Nama Kelas</label>
              <div class="col-sm-10">
                <input type="text" name="nama_kelas" class="form-control" required id="namaKelas">
              </div>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Buat</button>
      </div>

      </form>
    </div>
  </div>
</div>