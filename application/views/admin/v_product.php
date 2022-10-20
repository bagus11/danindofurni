<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('kaji-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Product
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_add_product"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Judul</th>
                            <th>Harga</th>
                            <th>Panjang</th>
                            <th>Lebar</th>
                            <th>Tinggi</th>
                            <th>Deskripsi Singkat</th>
                            <th>Gambar_1</th>
                            <th>Gambar_2</th>
                            <th>Gambar_3</th>
                            <th>Gambar_4</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $products) : ?>
                        <tr>
                            <td><?= $products->jenis_product ?></td>
                            <td><?= $products->nama ?></td>
                            <td><?= $products->harga ?></td>
                            <td><?= $products->panjang ?></td>
                            <td><?= $products->lebar ?></td>
                            <td><?= $products->tinggi ?></td>
                            <td><?= $products->deskripsi ?></td>
                            <td>
                                <img width="100px" src="<?= base_url('upload/product/' . $products->image_1) ?>"alt="<?=$products->image_1?>">
                            </td>
                            <td>
                                <img width="100px" src="<?= base_url('upload/product/' . $products->image_2) ?>"alt="<?=$products->image_2?>">
                            </td>
                            <td>
                                <img width="100px" src="<?= base_url('upload/product/' . $products->image_3) ?>"alt="<?=$products->image_3?>">
                            </td>
                            <td>
                                <img width="100px" src="<?= base_url('upload/product/' . $products->image_4) ?>"alt="<?=$products->image_4?>">
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success btn_edit_product" id="btn_edit_product"
                                    data-id="<?= $products->report_id ?>" data-bs-toggle="modal" data-bs-target="#modal_edit_product<?= $products->report_id ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger btn_hapus_product" id="btn_hapus_product"
                                    data-id="<?= $products->report_id ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/products/add_product') ?>
<?php $this->load->view('admin/modal/products/edit_product') ?>
<!-- <td>
    <?php
                                        // $imageArray[] = explode('|', $products->image_1);
                                        echo count(explode('|', $products->image_1));

                                        for ($i=0; $i < (count(explode('|', $products->image_1)) - 1); $i++) { 
                                            ?>
                                                <img class="img-fluid" src="<?= base_url('/upload/product/'.explode('|', $products->image_1)[$i])?>" alt="">
                                            <?php
                                        }
                                    ?>
    <?php if ($products->image_1 == null || $products->image_1 == '') : ?>
    <button class="btn btn-sm btn-secondary btn_upload_banner" data-id="<?= $products->report_id ?>"><i
            class="fas fa-image"></i> Upload</button>
    <?php else : ?>
    <img width="100px" src="<?= base_url('upload/product/' . $products->image_1) ?>"
        alt="<?=$products->image_1?>"><br><br>
    <button class="btn btn-sm btn-danger btn_hapus_banner" data-id="<?= $products->report_id ?>"
        data-image1_filename="<?= $products->image_1 ?>"><i class="fas fa-trash"></i> Hapus</button>
    <?php endif; ?>
</td> -->