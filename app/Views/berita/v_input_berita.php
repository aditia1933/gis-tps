<div class="row">
<div class="col-sm-12 blog-sidebar">
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-file fa-sm"></i> Tambah Berita</h1>

	<a href="<?= base_url('Berita/dataBerita')?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="col-sm-14 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark">
<div class="col-md-14">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-plus"></i> Tambah Data Berita</h6>
        </div><br>

    <div class="row">
        <div class="col-sm-12">
            <?php $errors = validation_errors()?>
        <?php echo form_open_multipart('Berita/insertData')?>
            <div class="form-row">
            <div class="form-group col-md-4">
                <label> Judul Berita</label>
                <input class="form-control" name="judul_berita">
                <p class="text-danger"><?= isset($errors['judul_berita']) == isset($errors['judul_berita'])? validation_show_error('judul_berita') : '' ?></p>
            </div>

            <div class="form-group col-md-4">
                <label> Isi Berita</label>
                <input class="form-control" name="isi">
                <p class="text-danger"><?= isset($errors['isi']) == isset($errors['isi'])? validation_show_error('isi') : '' ?></p>
            </div>

            <div class="form-group col-md-4">
                <label>Foto Berita</label>
                <input type="file" class="form-control" name="foto_berita" accept="image/*">
                <p class="text-danger"><?= isset($errors['foto_berita']) == isset($errors['foto_berita'])? validation_show_error('foto_berita') : '' ?></p>
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
        </div></div></div>
        
    </div></div></div></div></div></div></div></div>
    
    