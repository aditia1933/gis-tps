<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Edit User</h1>

	<a href="<?= base_url('Auth/profil')?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="col-sm-14 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark">
<div class="col-md-14">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h10 class="font-weight-bold"><i class="fas fa-user fa-sm"> Edit Data User</i></h10>
        </div><br>

    <div class="row">
        <div class="col-sm-12">
        
            <?php $errors = validation_errors()?>
            <?php echo form_open_multipart('Auth/updateData/' . $profil['id_adm'])?>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label> NIP</label>
                <input class="form-control " name="nip" value="<?= $profil['nip']?>" >
                <p class="text-danger"><?= isset($errors['nip']) == isset($errors['nip'])? validation_show_error('nip') : '' ?></p>
            </div>

            <div class="form-group col-md-3">
                <label> Nama</label>
                <input class="form-control " name="nama_adm" value="<?= $profil['nama_adm']?>" >
                <p class="text-danger"><?= isset($errors['nama_adm']) == isset($errors['nama_adm'])? validation_show_error('nama_adm') : '' ?></p>
            </div>

            <div class="form-group col-md-3">
                <label> Email</label>
                <input class="form-control " name="email" value="<?= $profil['email']?>" >
                <p class="text-danger"><?= isset($errors['email']) == isset($errors['email'])? validation_show_error('email') : '' ?></p>
            </div>

            <div class="form-group col-md-3">
                <label> Password</label>
                <input class="form-control " name="password" value="<?= $profil['password']?>" >
                <p class="text-danger"><?= isset($errors['password']) == isset($errors['password'])? validation_show_error('password') : '' ?></p>
            </div>

            <div class="form-group col-md-3">
                <label> Foto</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <p class="text-danger"><?= isset($errors['foto']) == isset($errors['foto'])? validation_show_error('foto') : '' ?></p>
                <img src="<?= base_url('foto/' . $profil['foto'])?>" width="50px">
            </div>

            </div>
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-save fa-sm"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
            <button type="reset" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-undo-alt fa-sm"></i>
                </span>
                <span class="text">Reset</span>
            </button>
            <?php echo form_close()?>
    </div>
        </div>
        
    </div></div></div></div></div></div></div>