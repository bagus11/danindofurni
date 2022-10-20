<script>
    var base_url                     = $('#base_url').val();    
    $('#btn_tambah_jenis').on('click', function(e) {
        $('#modal_add_jenis').modal('show');
    });
    
    //TAMBAH DATA JENIS
    $('#form_tambah_jenis').on('submit', function(e) {
        e.preventDefault();
        // var data = $(this).serialize();
        var icon = $('#icon').val();
        var jenis = $('#jenis').val();
        var deskripsi = $('#deskripsi').val();
        var csrf_token = $('#csrf_token').val();

        var formData = new FormData();

        formData.append("icon", icon);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        formData.append("jenis", jenis);
        formData.append("deskripsi", deskripsi);

        var url = '<?= base_url('kaji-admin-login/simpan-jenis-product') ?>';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function(res) {
                $('#csrf_token').val(res.token);
                console.log(res);
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, Gagal menyimpan data!',
                    allowOutsideClick: false
                })
            }
        })
    });

    //HAPUS DATA JENIS
    $('#datatablesSimple').on('click', '.btn_hapus_icon', function(e) {
        var id = $(this).data('id');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'id': id,
            "<?= $this->security->get_csrf_token_name(); ?>": csrf_token
        }
        var url = '<?= base_url('kaji-admin-login/hapus-jenis-product') ?>';
        Swal.fire({
            title: 'Apa anda ingin menghapus banner ini ?',
            showCancelButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: data,
                    success: function(res) {
                        console.log(res.status_code)
                        // if (res.status_code === 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: res.messages,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = window.location.href;
                                }
                            })
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan, gagal menghapus data!',
                            allowOutsideClick: false
                        })
                    }
                })
            }
        })
    });

    //Get Data in modal update
    $('#datatablesSimple').on('click', '.btn_form_ubah_jenis', function(e) {
        var id = $(this).data('id');
        var jenis = $(this).data('jenis');
        var deskripsi = $(this).data('deskripsi');
        var icon = $(this).data('icon');
        

        $('#jenis_ubah').val(jenis);
        $('#deskripsi_ubah').val(deskripsi);
        $('#ikon').val(icon);
        $('#id').val(id);

        $('#modal_ubah_kategori').modal('show');
    });

    //UPDATE DATA JENIS
    $('#form_ubah_jenis').on('submit', function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        var url = '<?= base_url('kaji-admin-login/ubah-jenis-product') ?>';

        console.log(data)

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(res) {
                $('#csrf_token_ubah').val(res.token);
                console.log(res);
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, Gagal menyimpan data!'
                })
            }
        })
    })
</script>