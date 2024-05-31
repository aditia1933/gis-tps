<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-map-marked-alt fa-sm" style="color: #b1b8c3;"> Pemetaan Lokasi TPS</i></h1>

</div><hr>

<div id="map" style="width: 100%; height: 67vh;"></div>

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

//icon marker
// icon marker
const sampah = L.icon({
    iconUrl: '<?= base_url('marker/sampahhh.png')?>',
    iconSize: [15, 25], // ukuran untuk icon marker
});

// Pemetaan Lokasi
<?php foreach ($lokasi as $key => $value) {?>
L.marker([<?= $value['latitude']?>, <?= $value['longitude']?>], {
    icon: sampah
})
    .bindPopup(`
        <div style="display: flex; align-items: center;">
            <img src="<?= base_url('foto/' .$value['foto_lokasi']) ?>" width="80%" height="80px">
            <div style="margin-left: 10px;">
                <b style="font-size: 10px"><?= $value['nama_lokasi']?></b><br>
                <span style="font-size: 10px">
                    Alamat: <span style="font-size: 8px"><?= $value['alamat_lokasi']?></span><br>
                    Jenis TPS: <span style="font-size: 8px"><?= $value['jenis']?></span><br>
                    Jumlah TPS: <span style="font-size: 8px"><?= $value['jumlah']?></span><br>
                    Kondisi: <span style="font-size: 8px"><?= $value['kondisi']?></span>
                </span>
            </div>
        </div>
    `)
    .addTo(map);
<?php } ?>


</script></div></div><br>

