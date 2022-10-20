<script>
    var base_url                     = $('#base_url').val();    
    $('#btn_tambah_product').on('click', function(e) {
        $('#modal_add_product').modal('show');
    });

    $('#form_tambah_product').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = '<?= base_url('kaji-admin-login/simpan-product') ?>';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(res) {
                $('#csrf_token').val(res.token);
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


    //HAPUS PRODUCTS
    $('#datatablesSimple').on('click', '#btn_hapus_product', function(e) {
        console.log('hit')
        var id = $(this).data('id');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'report_id': id,
            "<?= $this->security->get_csrf_token_name(); ?>": csrf_token
        }
        var url = '<?= base_url('kaji-admin-login/hapus-product') ?>';
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

    <?php if($this->session->flashdata('success')){ ?>
        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '<?php echo $this->session->flashdata('success'); ?>',
                        allowOutsideClick: false
                    })  
    <?php } ?>
    // //Update Data Product
    // $('#btn_tambah_product').on('click', function(e) {
    //     $('#modal_add_product').modal('show');
    // });
    
</script>