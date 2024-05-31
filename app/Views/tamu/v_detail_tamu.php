<div class="col-sm-12 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark"><div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <center><h10 class="font-weight-bold"><i class="fas fa-map-marker-alt fa-sm" style="color: #757e8a;"> DETAIL PROFIL ADMIN</i></h10></center>
        </div>
        
            <div class="col-sm-6">
            <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th whith="30px">:</th>
                        <td><?= $tamu['nama_tamu'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th width="30px">:</th>
                        <td><?= $tamu['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th width="30px">:</th>
                        <td><?= $tamu['alamat_tamu'] ?></td>
                    </tr>
                    <tr>
                        <th>Pesan</th>
                        <th width="30px">:</th>
                        <td><?= $tamu['pesan'] ?></td>
                    </tr>
                </table>
                <a href="<?= base_url('')?>" class="btn btn-success">
                    <span class="icon text-white-50">
                    <i class="fas fa-undo-alt fa-sm"> Kemabali</i> 
                    </span> </a>
            </div>
        </div>
            
            </div>
        </div>

    </div>
    </div>
</div></div></div>