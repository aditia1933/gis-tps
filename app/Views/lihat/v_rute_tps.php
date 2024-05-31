<div class="col-sm-12 blog-sidebar">
          <div class="p-1 mb-1 bg-white rounded text-dark">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <center><h10 class="font-weight-bold"><i class="fas fa-route" style="color: #757d8a;"> Rute Lokasi TPS</i></h10></center>
        </div>
<div class="card-body bg-dark">
        <div class="row">
            <div class="col-sm-3 blog-sidebar">
          <div class="p-1 mb-1 bg-white rounded text-dark">
            <img src="<?= base_url('foto/' . $lokasi['foto_lokasi'])?>" width="100%" height="200px">
            <br><br>
                    <tr>
                        <th>Nama Lokasi</th>
                        <th whith="30px">:</th>
                        <td><?= $lokasi['nama_lokasi'] ?></td>
                    </tr>
                    <br>
                    <tr>
                        <th>Alamat Lokasi</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['alamat_lokasi'] ?></td>
                    </tr>
                    <br>
                    <tr>
                        <th>Jenis</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['jenis'] ?></td>
                    </tr>
                    <br>
                    <tr>
                        <th>Jumlah</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['jumlah'] ?></td>
                    </tr>
                    <br>
                    <tr>
                        <th>Kondisi</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['kondisi'] ?></td>
                    </tr><br><br><br><br>
                    
                    <a href="<?= base_url('Lokasi/persebaranTPSS')?>" class="btn btn-success btn-block"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		            <span class="text">Kembali</span>
	                </a>
                    </h6>
            </div></div>

            <div class="col-sm-9 blog-sidebar">
          <div class="p-1 mb-1 bg-white rounded text-dark">
                <div id="map" style="width: 100%; height: 87vh;"></div>
            </div>
        </div></div></div>
</div></div></div>
<script>
var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });


    var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        attribution: '© Google Maps',
        maxZoom: 20,
    });


    var peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });


    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        maxZoom: 18,
        id: 'mapbox/outdoors-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q'
    });


    var peta5 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });


    var peta6 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });


    var peta7 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://carto.com/attributions">CARTO</a>'
    });


    var peta8 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Map data &copy; <a href="https://www.arcgis.com/">ArcGIS</a>'
    });


    var peta9 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
    });


    var peta10 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
    });

  var map = L.map('map', {
		center: [-6.1388511740695675, 106.18212802264757],
		zoom: 8,
		layers: [peta5]
	});

    const baseLayers = {
        'Mapbox': peta1,
        'Google': peta2,
        'Sattelite': peta3,
        'Outdoor': peta4,
        'OSM': peta5,
        'Dark': peta6,
        'Carto': peta7,
        'Esri': peta8,
        'Hybrid': peta9,
        'Teranin': peta10,
	};

    const layerControl = L.control.layers(baseLayers,null,{
        collapsed: true
    }).addTo(map);

    

    //costem rute user
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function (position) {
            var routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude), //lokasi asal
                    L.latLng(<?= $lokasi['latitude']?>, <?= $lokasi['longitude']?>) /// lokasi tujjuan
            ]
            }).addTo(map);
            //mengambil jarak
            routingControl.on('routesfound', function(e) {
                var routes = e.routes;
                var summary = e.routes[0].summary;
                var totalDistance = summary.totalDistance;
                //kirim elemen jarak ke elemen infut
                animasiCar(routes[0]);
            //membuat animasi perjalanan
            function animasiCar (route) {
                var iconMobil = L.icon({
                    iconUrl : '<?= base_url('marker/truk.png')?>',
                    iconSize: [20, 30], //untuk size gambar
            });
            var mobil = L.marker([route.coordinates[0].lat, route.coordinates[0].lng], {
                icon: iconMobil
            }).addTo(map);

            var index = 0;
            var maxIndex = route.coordinates.length - 1;

            function animate() {
                mobil.setLatLng([route.coordinates[index].lat, route.coordinates[index].lng ]);
                index++;
                if (index > maxIndex) {
                    index = 0;
                }
                setTimeout(animate, 300);
            }
            animate();
            }
});
            
        });
    }else {
        alert('Rute Tidak Ditemukan !!!')
    }

    //costem rute    
</script>