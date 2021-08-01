<div class="container">
  <div class="row py-3">

    <div class="col-md-3">
      <div class="shadow rounded">
        <center>
          <img src="<?= base_url('assets/img/avatar.jpg'); ?>" width="40%" class="rounded-circle overflow-hidden shadow-sm my-3 p-2" alt="">
          <h5><b>Aswar Kasim</b></h5>
        </center>

        <!-- Button trigger modal -->

        <?php
        include('foto.php');
        include('password.php') ?>

      </div>



    </div>

    <div class="col-md-9 shadow rounded p-3">
      <div class="row">
        <div class="col-md-6">
          <span class="text-muted">Data Pribadi</span>
          <hr class="text-muted">

          <div class="form-group mt-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="" id="" class="form-control" placeholder="Username" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Nama Lengkap</label>
            <input type="text" name="" id="" class="form-control" placeholder="Nama Lengkap" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Tanggal Lahir</label>
            <input type="date" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Gender</label>
            <select name="gender" class="form-control" id="">
              <option value="">Gender</option>
              <option value="">Laki-laki</option>
              <option value="">Perempuan</option>
            </select>
          </div>


          <div class="form-group mt-3">
            <label for="" class="form-label">Agama</label>
            <input type="text" name="" id="" class="form-control" placeholder="Agama" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Alamat</label>
            <input type="text" name="" id="" class="form-control" placeholder="Alamat" aria-describedby="helpId">
          </div>




        </div>
        <div class="col-md-6">
          <span class="text-muted mt-4">Sosial Media</span>
          <hr class="text-muted">

          <div class="form-group mt-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="" id="" class="form-control" placeholder="Email" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">No. Hp</label>
            <input type="text" name="" id="" class="form-control" placeholder="No. Hp" aria-describedby="helpId">
          </div>


          <div class="form-group mt-3">
            <label for="" class="form-label">WhatsApp</label>
            <input type="text" name="" id="" class="form-control" placeholder="WhatsApp" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Instagram</label>
            <input type="text" name="" id="" class="form-control" placeholder="Instagram" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Facebook</label>
            <input type="text" name="" id="" class="form-control" placeholder="Facebook" aria-describedby="helpId">
          </div>

          <div class="form-group mt-3">
            <label for="" class="form-label">Twitter</label>
            <input type="text" name="" id="" class="form-control" placeholder="Twitter" aria-describedby="helpId">
          </div>

        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>


      </div>

    </div>


  </div>
</div>