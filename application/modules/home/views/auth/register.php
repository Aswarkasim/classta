<div class="container my-5">
  <div class="row">
    <div class="offset-4 col-md-4">
      <h1 class="h3 mb-3 mt-3 fw-normal text-center"><b>Silakan Register</b></h1>
      <p class="text-center text-muted">Buat hari mudah, mulai hari ini.</p>
      <?php
      echo validation_errors('<div class="text-danger">', '</div>');
      if (isset($error)) {
        echo $error;
      }

      ?>

      <form action="<?= base_url('home/auth/register'); ?>" method="POST">
        <div class="form-gorup mt-3">
          <label for="">Username</label>
          <input type="text" placeholder="Username" name="username" class="form-control py-2">
        </div>

        <div class="form-gorup mt-3">
          <label for="">Email</label>
          <input type="email" placeholder="Email" name="email" class="form-control py-2">
        </div>

        <div class="form-gorup mt-3">
          <label for="">Password</label>
          <input type="password" placeholder="Password" name="password" class="form-control py-2">
        </div>

        <div class="form-gorup mt-3">
          <label for="">Konfirmasi</label>
          <input type="password" placeholder="Konfirmasi" name="re_password" class="form-control py-2">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Register <i class="fa fa-angle-right"></i></button>

          <p class="mt-2">Sudah punya akun? silakan <a href="<?= base_url('home/auth'); ?>">Login</a></p>

        </div>
      </form>
    </div>
  </div>
</div>