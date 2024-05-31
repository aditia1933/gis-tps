<div id="map" style="width: 100%; height: 100vh;"></div>


<script>
    const map = L.map('map').setView([-6.140922250976229, 106.17234434010496], 14);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
</script>