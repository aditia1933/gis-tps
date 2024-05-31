
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h10 class="h3 mb-0 text-gray-800"><i class="fas fa-map-marked-alt fa-sm" style="color: #b1b8c3;"> Data Lokasi TPS</i></h10>

    <a href="<?= base_url('Lokasi/inputLokasi')?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

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
        <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data Lokasi TPS</h6>
    </div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat Lokasi</th>
                    <th>Jenis TPS</th>
                    <th>Jumlah TPS</th>
                    <th>Kondisi</th>
                    <th>Koordinat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                 foreach ($lokasi as $key => $value) { ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td><?= $value['nama_lokasi'] ?></td>
                        <td><?= $value['alamat_lokasi'] ?></td>
                        <td><?= $value['jenis'] ?></td>
                        <td><?= $value['jumlah'] ?></td>
                        <td><?= $value['kondisi'] ?></td>
                        <td><?= $value['latitude'] ?>, <?= $value['longitude'] ?></td>
                        <td><img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" width="100px"></td>
                        <td><center>
                            <div class="my-2"></div>
                                    <a href="<?= base_url('Lokasi/editLokasi/' . $value['id_lokasi'])?>" class="btn btn-warning" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-edit fa-sm"></i>
                                        </span>
                                    </a>
                            <div class="my-2"></div>
                                    <a href="<?= base_url('Lokasi/deleteLokasi/' . $value['id_lokasi'])?>" class="btn btn-danger" onclick="return confirm ('Yakin Untuk Menghapus Data ??')" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="far fa-trash-alt fa-sm"></i>
                                        </span>
                                    </a>
                        </td></center>
                    </tr>
               <?php } ?>
            </tbody>
        </table></div></div></div>
    </div>
</div><br>