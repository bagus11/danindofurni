
 <?php foreach ($karyawan as $karyawans) : ?>
    <div class="modal fade" id="exampleModal<?= $karyawans->id ?>" tabindex="-1" aria-labelledby="exampleModal<?= $karyawans->id ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal<?= $karyawans->id ?>Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form_edit_karyawan<?= $karyawans->id ?>" action='<?= base_url('/kaji-admin-login/edit-karyawan')?>' enctype="multipart/form-data"method="post">
                <div class="modal-body">
                    <input type="hidden" id="csrf_token<?= $karyawans->id ?>" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <input type="hiddle" name="id" id="id<?= $karyawans->id ?>" value="<?= $karyawans->id ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" id="nama<?= $karyawans->id ?>" value="<?= $karyawans->nama_karyawan ?>"
                            placeholder="Masukkan nama Karyawan">
                        <span id="nama_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan Karyawan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan<?= $karyawans->id ?>" value="<?= $karyawans->jabatan ?>"
                            placeholder="Masukkan jabatan Karyawan">
                        <span id="jabatan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link IG Karyawan</label>
                        <input type="text" class="form-control" name="ig" id="ig<?= $karyawans->id ?>" value="<?= $karyawans->link_instagram ?>" placeholder="Masukkan ig Karyawan">
                        <span id="ig_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link FB Karyawan</label>
                        <input type="text" class="form-control" name="fb" id="fb<?= $karyawans->id ?>" value="<?= $karyawans->link_facebook ?>" placeholder="Masukkan fb Karyawan">
                        <span id="fb_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Twitter Karyawan</label>
                        <input type="text" class="form-control" name="twitter" id="twitter<?= $karyawans->id ?>" value="<?= $karyawans->link_twitter ?>"
                            placeholder="Masukkan twitter Karyawan">
                        <span id="twitter_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link LinkedIN Karyawan</label>
                        <input type="text" class="form-control" name="linked" id="linked<?= $karyawans->id ?>" value="<?= $karyawans->link_linked ?>"
                            placeholder="Masukkan linkedIn Karyawan">
                        <span id="linked_error" class="text-danger"></span>
                    </div>
                    <div>
                        <img src="<?= base_url('/upload/profile/'.$karyawans->image) ?>" alt="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Karyawan</label>
                        <input type="hidden" name="oldFoto" id="oldFoto<?= $karyawans->id ?>" value="<?= $karyawans->image ?>">
                        <input type="file" class="form-control" name="foto" id="foto<?= $karyawans->id ?>"
                            placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btn_add_karyawan<?= $karyawans->id ?>" class="btn btn-primary">Save changes</button>
                </div>
            </form>
    </div>
  </div>
</div>

<?php endforeach ?>