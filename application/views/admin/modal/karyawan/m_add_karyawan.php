<div class="modal fade" id="modal_add_karyawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="form_add_karyawan" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan nama Karyawan">
                        <span id="nama_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan Karyawan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan"
                            placeholder="Masukkan jabatan Karyawan">
                        <span id="jabatan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link IG Karyawan</label>
                        <input type="text" class="form-control" name="ig" id="ig" placeholder="Masukkan ig Karyawan">
                        <span id="ig_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link FB Karyawan</label>
                        <input type="text" class="form-control" name="fb" id="fb" placeholder="Masukkan fb Karyawan">
                        <span id="fb_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Twitter Karyawan</label>
                        <input type="text" class="form-control" name="twitter" id="twitter"
                            placeholder="Masukkan twitter Karyawan">
                        <span id="twitter_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link LinkedIN Karyawan</label>
                        <input type="text" class="form-control" name="linked" id="linked"
                            placeholder="Masukkan linkedIn Karyawan">
                        <span id="linked_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Karyawan</label>
                        <input type="file" class="form-control" name="ft_karyawan" id="ft_karyawan"
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

<!-- <div class="modal fade" id="modal_add_karyawan">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Karyawan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            
            <div class="modal-body">
                <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama Karyawan">
                        <span id="nama_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan Karyawan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan jabatan Karyawan">
                        <span id="jabatan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link IG Karyawan</label>
                        <input type="text" class="form-control" name="ig" id="ig" placeholder="Masukkan ig Karyawan">
                        <span id="ig_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link FB Karyawan</label>
                        <input type="text" class="form-control" name="fb" id="fb" placeholder="Masukkan fb Karyawan">
                        <span id="fb_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Twitter Karyawan</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Masukkan twitter Karyawan">
                        <span id="twitter_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link LinkedIN Karyawan</label>
                        <input type="text" class="form-control" name="linked" id="linked" placeholder="Masukkan linkedIn Karyawan">
                        <span id="linked_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Karyawan</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan foto Karyawan">
                        <span id="foto_error" class="text-danger"></span>
                    </div>
            </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Simpan Data">
            </div>
            
        </div>
    </div>
</div> -->