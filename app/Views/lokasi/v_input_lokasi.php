<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h10 class="h3 mb-0 text-gray-800"><i class="fas fa-map-marked-alt fa-sm" style="color: #b1b8c3;"> Tambah Lokasi TPS</i></h10>

<a href="<?= base_url('Lokasi/index')?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>
</div>
<div class="col-sm-14 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark">
<div class="col-md-14">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-plus"></i> Tambah Data Lokasi</h6>
        </div>
<div class="row">
    <div class="col-sm-7">
        <div id="map" style="width: 100%; height: 90vh;"></div>
    </div>

    <div class="col-sm-5">
        <div class="row=1">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php $errors = validation_errors()?>
            <?php echo form_open_multipart('Lokasi/insertData')?>

            <div class="form-group">
                <label>Nama Lokasi TPS</label>
                <input class="form-control " name="nama_lokasi">
                <p class="text-danger"><?= isset($errors['nama_lokasi']) == isset($errors['nama_lokasi'])? validation_show_error('nama_lokasi') : '' ?></p>
            </div>

            <div class="form-group">
                <label> Alamat Lokasi TPS</label>
                <input class="form-control" name="alamat_lokasi">
                <p class="text-danger"><?= isset($errors['alamat_lokasi']) == isset($errors['alamat_lokasi'])? validation_show_error('alamat_lokasi') : '' ?></p>
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label> Jenis TPS</label>
                <input class="form-control" name="jenis">
                <p class="text-danger"><?= isset($errors['jenis']) == isset($errors['jenis'])? validation_show_error('jenis') : '' ?></p>
            </div>

            <div class="form-group col-md-4">
                <label> Jumlah Unit</label>
                <input class="form-control" name="jumlah">
                <p class="text-danger"><?= isset($errors['jumlah']) == isset($errors['jumlah'])? validation_show_error('jumlah') : '' ?></p>
            </div>

            <div class="form-group col-md-4">
                <label> kondisi </label>
                <input class="form-control" name="kondisi">
                <p class="text-danger"><?= isset($errors['kondisi']) == isset($errors['kondisi'])? validation_show_error('kondisi') : '' ?></p>
            </div>
            </div>

            <div class="form-row ">
            <div class="form-group col-md-6">
                <label> Latitude</label>
                <input class="form-control" name="latitude" id="Latitude">
                <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude'])? validation_show_error('latitude') : '' ?></p>
            </div>

            <div class="form-group col-md-6">
                <label> Longitude</label>
                <input class="form-control" name="longitude" id="Longitude">
                <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude'])? validation_show_error('longitude') : '' ?></p>
            </div>
            </div>

            <div class="form-group">
                <label> Foto Lokasi</label>
                <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
                <p class="text-danger"><?= isset($errors['foto_lokasi']) == isset($errors['foto_lokasi'])? validation_show_error('foto_lokasi') : '' ?></p>
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
		zoom: 14,
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

    var curLocation = [-6.1388511740695675, 106.18212802264757];
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
</script></div></div></div></div>