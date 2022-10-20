
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <?php foreach ($profile as $profile) : ?>
      <h3>Welcome to <strong>DanindoFurni</strong></h3>
      <h1>We're Furniture Shop</h1>
      <h2><?= $profile->slogan ?></h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>About Us</h2>
          <h3>Danindo <span>Furniture</span></h3>
        </div>
        <div class="section-body">
            <?= $profile->deskripsi?>
        </div>
        

        <div class="row content">
          <div class="col-lg-6">
            <h3>Visi</h3  >
            <p>
              <?= $profile->visi ?>
            </p>
            <!-- <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul> -->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
          <h3>Misi</h3>
            <p>
             <?= $profile->misi ?>
            </p>
            <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
          </div>
        </div>

      </div>
      
    </section><!-- End About Section -->
    <?php endforeach; ?>
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Jenis <span>Product</span></h3>
          <p>
            <?= $profile->intro_jenis ?>
          </p>
        </div>

        <div class="row">
        <?php
        $no = 1;
        foreach ($jenis_product as $hasil) {
          ?>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="<?= $hasil->icon ?>"></i></div>
              <h4 class="title"><a ><?= $hasil->jenis_product ?></a></h4>
              <p class="description"><?= $hasil->deskripsi ?></p>
            </div>
          </div>
          <?php 
        } ?>

        </div>
      </div>
    
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3><?= $profile->nama ?></h3>
          <p><?= $profile->slogan ?></p>
          <a class="cta-btn" href="#">Kembali ke Atas</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Product</h2>
          <h3>Product <span>Terbaru</span></h3>
          <p>
          <?= $profile->intro_product ?>
          </p>
        </div>

 

        <div class="row portfolio-container" style="height:100%" >
        <?php
        $no = 1;
        foreach ($product as $product) {
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app" >
            <img src="<?php echo base_url('upload/product/' . $product->image_1) ?>" class="img-fluid" alt="Nature" width="400" height="300" style="max-height:300px; min-height:300px">
            <div class="portfolio-info">
              <h4 style="text-align:center"><?= $product->nama ?></h4>
            
              <!-- <a href="<?php echo base_url('upload/product/' . $product->image_1) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $product->nama ?>"><i class="bx bx-plus"></i></a> -->
              <a href="<?php echo base_url('home_controller/detail_barang/' . $product->report_id); ?>" class="details-link" title="More Details"><i class="fas fa-eye">
              </i></a>

            </div>
          </div>
          <?php 
        } ?>


        </div>
        <div class="text-center"><a class="btn btn-danger" href="<?php echo base_url() ?>product_controller" role="button">More Product</a></div>
      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
          <h3>Team <span>Kami</span></h3>
          <p>
          <?= $profile->intro_team ?>
          </p>
        </div>

        <div class="row">
        <?php $no = 1;
        foreach ($karyawan as $karyawan) { ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?= base_url('upload/profile/') . $karyawan->image ?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="<?= $karyawan->link_twitter ?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?= $karyawan->link_facebook ?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?= $karyawan->link_instagram ?>"><i class="bi bi-instagram"></i></a>
                  <a href="<?= $karyawan->link_linked ?>"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4> <?= $karyawan->nama_karyawan ?></h4>
                <span><?= $karyawan->jabatan ?></span>
              </div>
            </div>
          </div>
          <?php 
        } ?>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
                      
        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          <p>
          <?= $profile->intro_contact ?>
          </p>
        </div>
                    
        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="<?= $profile->link_google ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?= $profile->lokasi ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?= $profile->email ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?= $profile->no_hp ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
          <?php echo $this->session->flashdata('msg'); ?>
            <form  method="POST" action="<?php echo base_url('contact'); ?>" role="form" class="php-email-form">
            
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  <input type="hidden" class="form-control" name="email_to" id="email_to" value="<?= $profile->email ?>">
                  <?php echo form_error('name', '<span class="text-danger">', '</span>'); ?>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
                <?php echo form_error('message', '<span class="text-danger">', '</span>'); ?>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button name="submit_email" type="submit">Send Message</button></div>
     
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


