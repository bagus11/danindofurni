<section id="hero">
    <?php foreach ($profile as $profile) : ?>
    <div class="hero-container">
      <h3><strong>Detail Product</strong></h3>
      <h2><?= $profile->slogan?></h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  <?php endforeach?>
    </section>
    <?php if ($detail_barang->report_id > 0) : ?>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="<?php echo base_url('upload/product/'.$detail_barang->image_1)?>" class="product-image" alt="testing" style="width:120vw;height:30vw;">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="<?php echo base_url('upload/product/'.$detail_barang->image_1)?>" style="width:120vw;" alt="testing"></div>
               <!-- Img 2 -->
                <?php if($detail_barang->image_2 ==null):?>
                  <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_2)?>" style="width:120vw;" alt="testing" style="display: none;></div>
                <?php else :?>
                <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_2)?>" style="width:120vw;" alt="testing"></div>
                <?php endif;?>
              
                <!-- img 3 -->
                <?php if($detail_barang->image_3 ==null):?>
                  <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_3)?>" alt="testing" style="display: none;></div>
                 <?php else :?>
                  <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_3)?>" alt="testing" ></div>
                  <?php endif;?>

                  <!-- img 4 -->
                <?php if($detail_barang->image_4 === null):?>
                  <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_4)?>" alt="testing" hidden></div>
                  <?php else :?>
                      <div class="product-image-thumb" ><img src="<?php echo base_url('upload/product/'.$detail_barang->image_4)?>" alt="testing"></div>
                  <?php endif;?>
             
             
              </div>
              <br>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $detail_barang->nama?></h3>
              <p><?= $detail_barang->deskripsi?></p>
              <hr>

              <h4 class="mt-3"><small>Ukuran Product (m)</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-md">Panjang</span>
                  <br>
                  <?= $detail_barang->panjang?>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-md">Lebar</span>
                  <br>
                  <?= $detail_barang->lebar?>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-md">Tinggi</span>
                  <br>
                  <?= $detail_barang->tinggi?>
                </label>
              
              </div>

              <!--<div class="bg-danger py-2 px-3 mt-4">-->
              <!--  <h3 class="mb-0" style="text-align:center;">-->
              <!--  Rp.<?= number_format("$detail_barang->harga",2,",",".")?>-->
              <!--  </h3>-->
                
              <!--</div>-->

            
              <div class="mt-4">
              <button class="btn btn-success" onclick=" window.open('<?= $profile->link_wa?>')">
                <i class="fas fa-phone-square-alt"></i>
                  Hubungi Penjual
                </button>
                  <br>
              </div>

              <?php else : ?>
                <br>
                    <br>
                    <br>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                        </div>
                    </div>
                    <br>
                <br>
                <?php endif; ?>
            </div>
          </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
