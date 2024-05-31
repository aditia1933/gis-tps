<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <center><h10 class="font-weight-bold"><i class="fas fa-map-marker-alt fa-sm" style="color: #757e8a;"> DETAIL LOKASI TPS</i></h10></center>
        </div>
        
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>

            <div class="col-sm-6">
            <img src="<?= base_url('foto/' . $lokasi['foto_lokasi'])?>" width="100%" height="300px">
            </div>
            
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lokasi</th>
                        <th whith="30px">:</th>
                        <td><?= $lokasi['nama_lokasi'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Lokasi</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['alamat_lokasi'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['jenis'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['jumlah'] ?></td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['kondisi'] ?></td>
                    </tr>
                    <tr>
                        <th>Titik Koordinat</th>
                        <th width="30px">:</th>
                        <td><?= $lokasi['latitude'] ?> , <?= $lokasi['longitude'] ?></td>
                    </tr>
                </table>
                <a href="<?= base_url('Lokasi/dataTPS')?>" class="btn btn-dark">
                    <span class="icon text-white-50">
                    <i class="fas fa-arrow-alt-circle-left fa-sm"> Kembali</i>
                    </span>
            </a>
            </div>
        </div>

    </div>
    </div>
</div>

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
		center: [-6.139472407629569, 106.17318219206167],
		zoom: 13,
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

    //get Coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");

    var curLocation = [<?= $lokasi['latitude']?>, <?= $lokasi['longitude']?>];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    //mengambil koordinat saat marker di pindahkan/digeser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation,
        }).bindPopup(position).update();
        $("#Latitude").val(posotion.lat);
        $("#Longitude").val(posotion.lng);
    });

    //Mengambil saat coordinat di Klik
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
            }else{
                marker.setLatLng(e.latlng);
            }
            latInput.value = lat;
            lngInput.value = lng;
            posisi.value = lat + ',' + lng;
    });
    map.addLayer(marker);

    

</script>