<div class="container pb-5">
  <h3 class="text-center my-5"><b>Tim Kami</b></h3>

  <div class="row">
    <?php $delay = 500 ?>
    <?php for ($i = 0; $i < 4; $i++) { ?>
      <div class="col-md-3 p-1" data-aos="flip-left" data-aos-delay="<?= $delay += 500 ?>">
        <div class="m-2 shadow rounded">
          <div style="width: 100%; height:200px; overflow: hidden;">
            <img src="<?= base_url('assets/img/blank.jpg'); ?>" width="100%" class="" alt="">
          </div>
          <div class="p-2">
            Lorem Ipsum
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
</div>