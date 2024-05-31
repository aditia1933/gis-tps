<div class="row">
<div class="col-sm-12 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark">
          <div class="card card-outline card-primary">

    <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <div class="card-header py-3"><center>
        <h6 class="m-0 font-weight-bold"><i class="fas fa-route" style="color: #757d8a;"> Data Lokasi TPS Kecamatan Cipocok Jaya</i></h6></center>
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
                    <th>Action</th>
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
                        <td>
                        <center>
                                    <a href="<?= base_url('Lokasi/Detail/' . $value['id_lokasi'])?>" class="btn btn-primary" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-eye fa-sm"> Detail TPS</i>
                                    </a></center>
                        </td>
                    </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>
    </div></div>
</div>
<br>
<div class="hero-box  bg-white rounded text-dark hero-box-smaller ">
        <div class="container">
            <div class="row wow bounceInUp animated animated" data-wow-duration="0.9s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.2s;">
                <br>
                <br>
                <div class="col-md-5">
                        <div id="mapid"  style="height: 300px; width: 100%;">
                            <!-- Ici s'affichera la carte -->
                        </div>
                        <script>

                            var cilowong = L.layerGroup();

                            L.marker([-6.112410408649957, 106.14165819019546]).addTo(cilowong)
                                .bindPopup('<a href="https://www.google.com/maps/dir/?api=1&destination=-6.112387777530127,106.14165547958123" target="_blank" style="color: deepskyblue">Lihat Lokasi</a>').openPopup();

                            var street =
                                    L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
                                        maxZoom: 20,
                                        minZoom: 2,
                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                    }),

                                satelite = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3']
                                });

                            var mymap = L.map('mapid', {
                                center: [-6.112410408649957, 106.14165819019546],
                                zoom: 12,
                                layers: [street, cilowong]
                            });

                            var baseLayers = {
                                "Map": street,
                                "Satellite": satelite
                            };

                            var overlays = {
                                "TPAS Cilowong": cilowong,

                            };

                            L.control.layers(baseLayers, overlays).addTo(mymap);

                            var mark ;



                            var popup = L.popup();

                            function onMapClick(e) {
                                if (mark != undefined) {
                                    mymap.removeLayer(mark);
                                }
                                var lat = e.latlng;
                                var lat1 = e.latlng.lat;
                                var lng = e.latlng.lng;
                                mark = L.marker(lat).addTo(mymap);
                                document.getElementById("lat").value= lat1;
                                document.getElementById("lng").value= lng;
                            }

                            mymap.on('click', onMapClick);

                        </script>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5"><br><br><br>
                <center><h3><strong>Hubungi Kami</strong></h3><br></center>
                <ul class="footer-contact">
            
                <center>
                Kepandean, Jl. Letnan Jidun No.5, Kota Serang, Banten 42115 <i class="fas fa-phone fa-sm"></i>
                    (0254) 221-764
                </center>
            
        </ul>
                </div>
            </div>

        </div>
    </div>
    </table></div></div></div>