<?php

$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
$uri =  $this->uri->segment(1); ?>

<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('msg_er') ?>"></div> -->
<header>
  <div class="px-5 py-2 bg-white text-dark border-bottom mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?= base_url(); ?>" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
          <img src="<?= base_url('assets/img/logo.png'); ?>" width="100px" alt="">
        </a>


        <?php if ($this->session->userdata('id_kelas')) { ?>
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-left mb-md-0">
            <li><a href="<?= base_url('guru/dashboard'); ?>" class="nav-link px-2 link-dark">Dashboard</a></li>
            <li><a href="<?= base_url('guru/modul'); ?>" class="nav-link px-2 link-dark">Belajar</a></li>
            <li><a href="<?= base_url('guru/paket'); ?>" class="nav-link px-2 link-dark">Ujian</a></li>
          </ul>
        <?php } ?>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">


          <div><?= $user->namalengkap; ?></div>
        </form>
        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
          <div class="dropdown text-end">

            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
              <img src="<?= base_url('assets/img/avatar.jpg'); ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" data-popper-placement="top-start" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);">
              <li><a class="dropdown-item" href="<?= base_url('user/profile'); ?>">Profil</a></li>
              <li><a class="dropdown-item" href="<?= base_url('guru/kelas'); ?>">Ubah Kelas</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= base_url('home/auth/logout'); ?>">Logout <i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </div>
  <!-- <div class="px-3 py-2 border-bottom mb-3">
    <div class="container d-flex flex-wrap justify-content-center">
      <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
      </form>

      <div class="text-end">
        <button type="button" class="btn btn-light text-dark me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
    </div>
  </div> -->
</header>