

<div class="container">

    <div class="row mb-3">
        <div class="col mb-3">
            <div class="card">
                <?php foreach ($profile as $profiles) : ?>
                    <img class="card-img-top img-fluid" src="<?=base_url('/upload/profile/' . $profiles->logo)?>" alt="Logo DanindoFurni">
                <?php endforeach; ?>
                <div class="card-body">
                    <div class="card-title">
                        <h5>Logo Perusahaan</h5>
                        <form action="<?=base_url('kaji-admin-login/logo')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo $profiles->id?>">
                            <input type="hidden" name="oldFoto" id="oldFoto" value="<?= $profiles->logo ?>">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="logo" id="logo">
                                <div class="form-text">Maksimal 2MB</div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Simpan Logo">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-mb-3">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Profile Perusahaan
                    </h4>
                    <a href="<?=base_url('profile')?>"></a>
                </div>
                <div class="card-body">
                    <?php foreach ($profile as $profiles) : ?>
                    <form action="<?=base_url('kaji-admin-login/update')?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?php echo $profiles->id?>">
                        <div class="form-group mb-3">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $profiles->nama?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Deskripsi Perusahaan</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"><?php echo $profiles->deskripsi?></textarea>
                        </div>

                        <div class="row">
                        <div class="col form-group mb-3">
                            <label for="">Visi Perusahaan</label>
                            <!-- <input type="text" name="visi" id="visi" class="form-control" value="<?php echo $profiles->visi?>"> -->
                            <textarea class="form-control" name="visi" id="visi" cols="30" rows="7"><?php echo $profiles->visi?></textarea>
                        </div>
                        <div class="col form-group mb-3">
                            <label for="">Misi Perusahaan</label>
                            <!-- <input type="text" name="misi" id="misi" class="form-control" value="<?php echo $profiles->misi?>"> -->
                            <textarea class="form-control" name="misi" id="misi" cols="30" rows="7"><?php echo $profiles->misi?></textarea>
                        </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Slogan Perusahaan</label>
                            <input type="text" name="slogan" id="slogan" class="form-control" value="<?php echo $profiles->slogan?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email Perusahaan</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $profiles->email?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Lokasi Perusahaan</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?php echo $profiles->lokasi?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Google Maps Perusahaan</label>
                            <textarea class="form-control" name="maps" id="maps" cols="30" rows="5"><?php echo $profiles->link_google?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">No Hp Perusahaan</label>
                            <input type="text" name="nohp" id="nohp" class="form-control" value="<?php echo $profiles->no_hp?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Link WhatsApp Perusahaan</label>
                            <input type="text" name="wa" id="wa" class="form-control" value="<?php echo $profiles->link_wa?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Link Instagram Perusahaan</label>
                            <input type="text" name="ig" id="ig" class="form-control" value="<?php echo $profiles->link_instagram?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Link Facebook Perusahaan</label>
                            <input type="text" name="fb" id="fb" class="form-control" value="<?php echo $profiles->link_facebook?>">
                        </div>

                        <input class="btn btn-primary" type="submit" value="Simpan Data">
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>