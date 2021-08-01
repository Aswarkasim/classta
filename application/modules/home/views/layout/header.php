<?php

$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
$uri =  $this->uri->segment(1); ?>

<nav class="navbar navbar-expand-lg" aria-label="Ninth navbar example">
  <div class="container-xl">

    <a href="<?= base_url(); ?>" class="d-flex align-items-center mb-2 mb-lg-0 pr-5">
      <img src="<?= base_url('assets/img/logo.png'); ?>" width="100px" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07XL">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Tentang</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Layanan</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Tim</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Kontak</a></li>
      </ul>
      <form>
        <a href="<?= base_url('home/auth/register'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Register</a>
        <a href="<?= base_url('home/auth'); ?>" class="btn btn-orange"><i class="fa fa-sign-in"></i> Login</a>
      </form>
    </div>
  </div>
</nav>


<!-- 
<header class="p-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="<?= base_url(); ?>" class="d-flex align-items-center mb-2 mb-lg-0 pr-5">
        <img src="<?= base_url('assets/img/logo.png'); ?>" width="100px" alt="">
      </a>


      <ul class="nav col-12 col-lg-auto me-lg-auto float-right mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Tentang</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Layanan</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Tim</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Kontak</a></li>
      </ul>

      <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">

        <a href="<?= base_url('home/auth/register'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Register</a>
        <a href="<?= base_url('home/auth'); ?>" class="btn btn-orange"><i class="fa fa-sign-in"></i> Login</a>
      </div>




    </div>
  </div>
</header> -->