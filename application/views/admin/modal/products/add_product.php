<div class="modal fade" id="modal_add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?=base_url('/kaji-admin-login/simpan-product')?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Nama Product</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan nama product">
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
                            placeholder="Masukkan harga Product">
                        <span id="jabatan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Panjang Product</label>
                        <input type="number" class="form-control" name="panjang" id="panjang" placeholder="Masukkan panjang product">
                        <span id="ig_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lebar Product</label>
                        <input type="number" class="form-control" name="lebar" id="lebar" placeholder="Masukkan lebar product">
                        <span id="fb_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi Product</label>
                        <input type="number" class="form-control" name="tinggi" id="tinggi"
                            placeholder="Masukkan twitter Karyawan">
                        <span id="twitter_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Product</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                            placeholder="Masukkan linkedIn Karyawan">
                        <span id="linked_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 1</label>
                        <input type="file" class="form-control" name="image_1" id="image_1"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 2</label>
                        <input type="file" class="form-control" name="image_2" id="image_2"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 3</label>
                        <input type="file" class="form-control" name="image_3" id="image_3"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image 4</label>
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