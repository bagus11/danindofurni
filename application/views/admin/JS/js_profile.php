<script>
    // $('#visi_misi').summernote();
    // $('#profile').summernote();

    $('#form_identitas').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/ProfileController/simpan_identitas_perusahaan') ?>';
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                $('#btn_simpan_identitas').html('Sedang Menyimpan ....');
                $('#btn_simpan_identitas').prop('disabled', true);
            },
            success: function(res) {
                $('#btn_simpan_identitas').html('Simpan');
                $('#btn_simpan_identitas').prop('disabled', false);
                $('#csrf_token_identitas').val(res.token);
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
                if (res.validate.success) {
                    $.each(res.validate, (key, val) => {
                        var is_invalid = key.replace('_error', '');
                        var id_invalid_form = el = $('[id="' + is_invalid + '"]');
                        id_invalid_form.addClass(val.length > 0 ? 'is-invalid' : '');
                        el = $('[id="' + key + '"]');
                        el.html(val);
                    });
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil disimpan!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            },
            error: function() {
                $('#btn_simpan_identitas').html('Simpan');
                $('#btn_simpan_identitas').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR!',
                    text: 'Terjadi kesalahan, Data gagal disimpan!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            }
        });
    });
    // END