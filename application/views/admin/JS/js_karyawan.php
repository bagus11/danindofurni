<script>

var base_url                     = $('#base_url').val();    
    // $('#btn_tambah_karyawan').on('click', function(e) {
    //     $('#exampleModal').modal('show');
    // });

    //INPUT DATA KARYAWAN
    $('#form_add_karyawan').on('submit', function(e) {
        e.preventDefault()
        // console.log('ajg')
        var data = $(this).serialize();
        var nama = $('#nama').val();
        var jabatan = $('#jabatan').val();
        var ig = $('#ig').val();
        var fb = $('#fb').val();
        var twitter = $('#twitter').val();
        var linked = $('#linked').val();
        var foto = $('#ft_karyawan').prop('files')[0];
        var csrf_token = $('#csrf_token').val();

        var formData = new FormData();

        formData.append("nama", nama);
      //  formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        formData.append("jabatan", jabatan);
        formData.append("ig", ig);
        formData.append("fb", fb);
        formData.append("twitter", twitter);
        formData.append("linked", linked);
        formData.append("ft_karyawan", foto);

        var url = '<?= base_url('kaji-admin-login/tambah-karyawan') ?>'

        console.log(url)

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (response) {
                console.log('tetew')
            },
            statusCode: {
                200: function (response) {
                    console.log(response,'response:')
                    $('#exampleModal').modal('toggle')
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
            500: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, Gagal menyimpan data!',
                    allowOutsideClick: false
                })
            }
            }
        })
    });

    // <?php foreach ($karyawan as $karyawans) : ?>

    //     $('#form_edit_karyawan'+ <?= $karyawans->id ?>).on('submit', function(e) {
    //         e.preventDefault()
    //         console.log('ajg'+ <?= $karyawans->id ?>)
    //         var data = $(this).serialize();
    //         var id = $('#id'+ <?= $karyawans->id ?>).val();
    //         var nama = $('#nama'+ <?= $karyawans->id ?>).val();
    //         var jabatan = $('#jabatan'+ <?= $karyawans->id ?>).val();
    //         var ig = $('#ig'+ <?= $karyawans->id ?>).val();
    //         var fb = $('#fb'+ <?= $karyawans->id ?>).val();
    //         var twitter = $('#twitter'+ <?= $karyawans->id ?>).val();
    //         var linked = $('#linked'+ <?= $karyawans->id ?>).val();
    //         var oldFoto = $('#oldFoto'+ <?= $karyawans->id ?>).val();
    //         var foto = $('#foto'+ <?= $karyawans->id ?>).prop('files')[0];
    //         var csrf_token = $('#csrf_token'+ <?= $karyawans->id ?>).val();
    //         // console.log($('#foto'+ <?= $karyawans->id ?>).val())
    //         // return false

    //         // if ($('#foto'+ <?= $karyawans->id ?>).val())
    //         // {
    //         //     var foto = $('#foto'+ <?= $karyawans->id ?>).prop('files')[0];
    //         // }

    //         var formData = new FormData();
    
    //         formData.append("id", id);
    //         formData.append("nama", nama);
    //         formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
    //         formData.append("jabatan", jabatan);
    //         formData.append("ig", ig);
    //         formData.append("fb", fb);
    //         formData.append("twitter", twitter);
    //         formData.append("linked", linked);
    //         formData.append("foto", foto);

    //         formData.append("oldFoto", oldFoto);

    //         var urls = '<?= base_url('/kaji-admin-login/edit-karyawan')?>'
    
    //         console.log(urls)
    
    //         $.ajax({
    //             url: urls,
    //             type: 'post',
    //             dataType: 'json',
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             data: formData,
    //             success: function () {
    //                 console.log('tetew')
    //             },
    //             statusCode: {
    //                 200: function (response) {
    //                     $('#exampleModal'+<?= $karyawans->id ?>).modal('toggle')
    //                     Swal.fire({
    //                     icon: 'success',
    //                     title: 'Success',
    //                     text: 'Data berhasil disimpan!',
    //                     allowOutsideClick: false
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         location.href = window.location.href;
    //                     }
    //                 })
    //             },
    //             500: function (response) {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Oops...',
    //                     text: 'terjadi kesalahan, Gagal menyimpan data!',
    //                     allowOutsideClick: false
    //                 })
    //             }
    //             }
    //         })
    //     });
    // <?php endforeach ?>

    <?php if($this->session->flashdata('success')){ ?>
        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '<?php echo $this->session->flashdata('success'); ?>',
                        allowOutsideClick: false
                    })  
    <?php } ?>
    

    //HAPUS DATA KARYAWAN
    $('#datatablesSimple').on('click', '.btn_hapus_icon', function(e) {
        var id = $(this).data('id');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'id': id,
            "<?= $this->security->get_csrf_token_name(); ?>": csrf_token
        }
        var url = '<?= base_url('kaji-admin-login/hapus-karyawan') ?>';
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
</script>