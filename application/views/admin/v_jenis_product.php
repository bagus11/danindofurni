<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jenis Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('kaji-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Product</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Jenis Product
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_jenis"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Deskripsi Singkat</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jenis as $jeniss) : ?>
                            <tr>
                                <td><?= $jeniss->jenis_product ?></td>
                                <td><?= $jeniss->deskripsi ?></td>
                                <td><?= $jeniss->icon ?></td>
                                <td class="text-center">
                                        <button class="btn btn-sm btn-success btn_form_ubah_jenis" data-id="<?= $jeniss->id ?>" data-jenis="<?= $jeniss->jenis_product ?>" data-deskripsi="<?= $jeniss->deskripsi ?>" data-icon="<?= $jeniss->icon ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger btn_hapus_icon" data-id="<?= $jeniss->id ?>" data-icon="<?= $jeniss->icon ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- <input type="hidden" class="form-control" id="base_url" name="base_url" value = "<?php echo base_url(); ?>"> -->
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/jenis_products/v_modal_add') ?>
<?php $this->load->view('admin/modal/jenis_products/v_modal_edit') ?>
<?php $this->load->view('admin/modal/jenis_products/v_modal_upload_banner') ?>