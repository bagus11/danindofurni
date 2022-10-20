
<?php foreach($product as $products) : ?>
<div class="modal fade" id="modal_edit_product<?= $products->report_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?=base_url('/kaji-admin-login/ubah-product')?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" id="id" name="id" value="<?= $products->report_id ?>">
                    <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Nama Product</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan nama product" value="<?= $products->nama ?>">
                        <span id="nama_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="jenis" id="jenis">
                                <?php foreach ($jenis as $jen) : ?>
                                    <option value="<?= $jen->id ?>"><?= $jen->jenis_product ?></option>
                                <?php endforeach; ?>
                        </select>
                        <span id="kategori_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Product</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            placeholder="Masukkan harga Product" value="<?= $products->harga ?>">
                        <span id="jabatan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Panjang Product</label>
                        <input type="number" class="form-control" name="panjang" id="panjang" value="<?= $products->panjang ?>" placeholder="Masukkan panjang product">
                        <span id="ig_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lebar Product</label>
                        <input type="number" class="form-control" name="lebar" id="lebar" value="<?= $products->lebar ?>" placeholder="Masukkan lebar product">
                        <span id="fb_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi Product</label>
                        <input type="number" class="form-control" name="tinggi" id="tinggi"
                            placeholder="Masukkan twitter Karyawan" value="<?= $products->tinggi ?>">
                        <span id="twitter_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Product</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                            placeholder="Masukkan linkedIn Karyawan" value="<?= $products->deskripsi ?>">
                        <span id="linked_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 1</label>
                        <input type="hidden" id="old_image1" name="old_image1" value="<?= $products->image_1 ?>">
                        <img width="100px" src="<?= base_url('upload/product/' . $products->image_1) ?>"alt="<?=$products->image_1?>">
                        <input type="file" class="form-control" name="image_1" id="image_1"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 2</label>
                        <input type="hidden" id="old_image2" name="old_image2" value="<?= $products->image_2 ?>">
                        <img width="100px" src="<?= base_url('upload/product/' . $products->image_2) ?>"alt="<?=$products->image_2?>">
                        <input type="file" class="form-control" name="image_2" id="image_2"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 3</label>
                        <input type="hidden" id="old_image3" name="old_image3" value="<?= $products->image_3 ?>">
                        <img width="100px" src="<?= base_url('upload/product/' . $products->image_3) ?>"alt="<?=$products->image_3?>">
                        <input type="file" class="form-control" name="image_3" id="image_3"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 4</label>
                        <input type="hidden" id="old_image4" name="old_image4" value="<?= $products->image_4 ?>">
                        <img width="100px" src="<?= base_url('upload/product/' . $products->image_4) ?>"alt="<?=$products->image_4?>">
                        <input type="file" class="form-control" name="image_4" id="image_4"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btn_add_karyawan" class="btn btn-primary">Save changes</button>
                </div>
            </form>
    </div>
  </div>
</div>
<?php endforeach ?>