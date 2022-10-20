<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Karyawan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('kaji-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Karyawan
            </div>
            <div class="card-body">
                <!-- <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_karyawan" data-toggle="modal" data-target="#modal_add_karyawan"> <i class="fa fa-plus"></i> Tambah Data</button> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_add_karyawan">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Link Instagram</th>
                            <th>Link Facebook</th>
                            <th>Link Twitter</th>
                            <th>Link LinkedIN</th>
                            <th>Foto</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($karyawan as $karyawans) : ?>
                        <tr>
                            <td><?= $karyawans->id?></td>
                            <td><?= $karyawans->nama_karyawan?></td>
                            <td><?= $karyawans->jabatan?></td>
                            <td><?= $karyawans->link_instagram?></td>
                            <td><?= $karyawans->link_facebook?></td>
                            <td><?= $karyawans->link_twitter?></td>
                            <td><?= $karyawans->link_linked?></td>
                            <td><img class="img-fluid" src="<?=base_url('upload/profile/' . $karyawans->image)?>"
                                    alt="<?= $karyawans->image?>"></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success btn_form_ubah_jenis"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal<?= $karyawans->id ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- <button class="btn btn-sm btn-success btn_form_ubah_jenis" data-bs-toggle="modal" data-bs-target="#modal_edit_karyawan" data-id="<?= $karyawans->id ?>"><i class="fas fa-edit"></i></button> -->
                                <button class="btn btn-sm btn-danger btn_hapus_icon" data-id="<?= $karyawans->id ?>" data-image="<?= $karyawans->image ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php $this->load->view('admin/modal/karyawan/m_edit_karyawan') ?>
<?php $this->load->view('admin/modal/karyawan/m_add_karyawan') ?>