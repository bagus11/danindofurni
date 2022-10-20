
<section id="hero">
  
    <div class="hero-container">
      <?php $no = 1;foreach($profile as $result_profile){  ?>
      <h3><strong>Our Product</strong></h3>
      <h1><?= $result_profile->nama?></h1>
      <h2><?= $result_profile->slogan?> </h2>
      <?php } ?>
    </div>
  
    </section>
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Product</h2>
          <h3>Check our <span>Product</span></h3>
          <p>Kami menyediakan product dengan bahan yang berkualitas tinggi dan beragam</p>
        </div>

        <div class="row" >
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <!-- <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li> -->
              <?php
                    $no = 1;
                    foreach($result_jenis as $jenis_product){ 
                ?>
                  <li data-filter=".filter-<?=$jenis_product->jenis_product?>"><?=$jenis_product->jenis_product?></li>

            <?php } ?>

            </ul>
          </div>
        </div>
    <div class="container">

        <div class="row portfolio-container" id="page">


        <?php $no = 1;
                    foreach($results as $product){ ?>
                    
          <div id="pagination" class="col-lg-4 col-md-6 portfolio-item filter-<?=$product->jenis_product?>" >
            <img src="<?php echo base_url('upload/product/'.$product->image_1)?>" class="img-fluid" alt="Nature" width="400" height="300" style="max-height:300px; min-height:300px">
            <div class="portfolio-info" >
              <h4 style="text-align:center"><?= $product->nama?></h4>
              <!--          <hr style="color:white;height:2px;border:none;width:60%;margin:auto;">-->
              <!--<p style="text-align:center;font-size:14px;font-weight:bold;">Rp.<?= number_format("$product->harga",2,",",".")?></p>-->
              <!-- <a href="<?php echo base_url('upload/product/'.$product->image_1)?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $product->nama?>"><i class="bx bx-plus"></i></a> -->
              <a href="<?php echo base_url('home_controller/detail_barang/'.$product->report_id);?>" class="details-link" title="More Details"><i style="height:50px;" class="fas fa-eye">
              </i></a>

            </div>
          </div>
          <?php } ?>
          
          
        </div>
        <div style=" float: right;" >
            <?= $this->pagination_bootstrap->render(); ?>
        </div>
    </div>

    <br>
</section>
    
