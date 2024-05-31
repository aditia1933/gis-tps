
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-file fa-sm"> Data Berita</i></h1>

    <a href="<?= base_url('Berita/inputBerita')?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

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
        <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data Berita</h6>
    </div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
                <tr>
                    <th>No</th>
                    <th>Judul berita</th>
                    <th>Isi Berita</th>
                    <th>Foto Berita</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                 foreach ($berita as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td><?= $value['judul_berita'] ?></td>
                        <td><?= $value['isi'] ?></td>
                        <td><img src="<?= base_url('foto/' . $value['foto_berita']) ?>" width="100px"></td>
                        <td><center></center>
                        <div class="my-2"></div>
                        <a href="<?= base_url('Berita/editBerita/' . $value['id_berita'])?>" class="btn btn-warning" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-edit fa-sm"></i></span>
                                    </a>
                        <div class="my-2"></div>                       
                                    <a href="<?= base_url('Berita/deleteBerita/' . $value['id_berita'])?>" class="btn btn-danger" onclick="return confirm ('Yakin Untuk Menghapus Data ??')" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-trash-alt fa-sm"></i></span>
                                    </a>
                        </td></center>
                    </tr>
               <?php } ?>
            </tbody>
        </table></div></div></div></div>
    </div>
</div></div></div><br>