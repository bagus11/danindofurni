  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <?php foreach ($profile as $profile) : ?>
              <img style="width:250px;margin-left:-30px;margin-top:-50px"src="<?php echo base_url('upload/profile/'.$profile->logo)?>" alt="">
            <!-- <h3><?= $profile->nama?></h3> -->
            <!-- <p>
             <?= $profile->lokasi?> <br>
            </p> -->
            <br>
            <strong>Phone:</strong> <?= $profile->no_hp?><br>
            <strong>Email:</strong>  <?= $profile->email?><br>
          </div>
      

          <div class="col-lg-6 col-md-6 footer-links">
            <h4> Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>

            </ul>
          </div>



          <div class="col-lg-3 col-md-6 footer-newsletter" style="float:right">
              <p style="font-size:16px">
                <strong>
                  Lokasi
                </strong><br>
                <?= $profile->lokasi?>
              </p>
            <!-- <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p> -->
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-2">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>bagus.oetomo11@gmail.com</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">

        <a href="<?=$profile->link_facebook?>" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="<?=$profile->link_instagram?>" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="<?= $profile->link_wa?>" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
        <?php endforeach; ?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <script src="<?= base_url().'assets/vendor/glightbox/js/glightbox.min.js'?>"></script>
  <script src="<?= base_url().'assets/vendor/isotope-layout/isotope.pkgd.min.js'?>"></script>
  <script src="<?= base_url().'assets/vendor/swiper/swiper-bundle.min.js'?>"></script>
  <!-- <script src="<?= base_url().'assets/vendor/php-email-form/validate.js'?>"></script> -->

  <!-- Template Main JS File -->
  <script src="<?= base_url().'assets/js/main.js'?>"></script>
  <!-- AdminLTE -->
    
<!-- jQuery -->
<script src="<?=base_url().'assets/admin_theme/plugins/jquery/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/admin_theme/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/admin_theme/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/admin_theme/dist/js/demo.js'?>"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
  <!-- End AdminLTE -->

</body>

</html>