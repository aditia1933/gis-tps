<div class="col-sm-12 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark"><div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <center><h10 class="font-weight-bold"><i class="fas fa-map-marker-alt fa-sm" style="color: #757e8a;"> DETAIL PROFIL ADMIN</i></h10></center>
        </div>
        
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
            <img src="<?= base_url('foto/' . $profil['foto'])?>" width="100%" height="300px">
            </div>

            <div class="col-sm-6">
            <table class="table table-bordered">
                    <tr>
                        <th>NIP</th>
                        <th whith="30px">:</th>
                        <td><?= $profil['nip'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th whith="30px">:</th>
                        <td><?= $profil['nama_adm'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th width="30px">:</th>
                        <td><?= $profil['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <th width="30px">:</th>
                        <td><?= $profil['password'] ?></td>
                    </tr>
                </table>
                <a href="<?= base_url('Auth/profil')?>" class="btn btn-success">
                    <span class="icon text-white-50">
                    <i class="fas fa-undo-alt fa-sm"> Kembali</i> 
                    </span> </a>
            </div>
        </div>
            
            </div>
        </div>

    </div>
    </div>
</div></div></div>