<div class="row justify-content-center">
    <div class="col-sm-9 blog-sidebar"> <!-- Increase column width to 10 -->
        <div class="container-fluid">
            <div class="col-sm-12 blog-sidebar">
                <div class="p-2 mb-1 bg-white rounded text-dark">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <center>
                            <div class="card-header">
                                <h10 class="font-weight-bold"><i class="fas fa-user fa-sm-center"> Form Buku Tamu</i></h10>
                            </div></center>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <?php $errors = validation_errors() ?>
                                    <?php echo form_open_multipart('Pengunjung/insertData') ?>

                                    <div class="form-group">
                                        <label> Nama</label>
                                        <input class="form-control" name="nama_tamu">
                                        <p class="text-danger"><?= isset($errors['nama_tamu']) ? validation_show_error('nama_tamu') : '' ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label> Email</label>
                                        <input class="form-control" name="email">
                                        <p class="text-danger"><?= isset($errors['email']) ? validation_show_error('email') : '' ?></p>
                                    </div>

                                    <!-- Rest of your form inputs -->

                                    <div class="form-group">
                                        <label> Pesan</label>
                                        <input class="form-control" name="pesan">
                                        <p class="text-danger"><?= isset($errors['pesan']) ? validation_show_error('pesan') : '' ?></p>
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
                                    <?php echo form_close() ?>

                                    <!-- Success Notification -->
                                    <?php if (isset($success_message)) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $success_message; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
