
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user fa-sm"> Data User</i></h1>
    <a href="<?= base_url('Auth/inputProfil')?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
</div><hr>

<div class="row">
    <div class="col-12">
    <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
        <div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data User</h6>
    </div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                 foreach ($profil as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td><?= $value['nip'] ?></td>
                        <td><?= $value['nama_adm'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['password'] ?></td>
                        <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="100px"></td>
                        <td><center>
                        <div class="my-2"></div>
                                    <a href="<?= base_url('Auth/detailProfil/' . $value['id_adm'])?>" class="btn btn-success" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-eye fa-sm"></i>
                                    </a>

                        <div class="my-2"></div>
                        <a href="<?= base_url('Auth/editProfil/' . $value['id_adm'])?>" class="btn btn-warning" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-edit fa-sm"></i>
                                        </span>
                                    </a>
                                    
                        <div class="my-2"></div>
                                    <a href="<?= base_url('Auth/deleteProfil/' . $value['id_adm'])?>" class="btn btn-danger" onclick="return confirm ('Yakin Untuk Menghapus Data ??')" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-trash-alt fa-sm"></i>
                                        </span>
                                    </a>
                        </td></center>
                    </tr>
               <?php } ?>
            </tbody>
        </table></div></div></div></div>
    </div>
</div></div></div><br>