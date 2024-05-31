<!DOCTYPE html>
<html>
<head>
    <title>My CI4 Program</title>
    <!-- Add any other CSS or meta tags if needed -->
    <style>
        .jumbotron {
            /* Set the background image */
            background-image: url('<?= base_url('gambar/logo6.jpeg')?>');
            /* Set background size and positioning */
            background-size: cover;
            background-position: center;
            /* Set the desired height of the jumbotron */
            min-height: 300px;
            /* Add other styling as needed */
            padding: 3rem;
            color: white;
        }

        /* Center the text inside the jumbotron */
        .jumbotron center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }

        .jumbotron h1 {
            font-weight: bold;
            font-size: 2.5rem;
            /* Add other heading styles if desired */
        }

        .jumbotron h2 {
            font-weight: bold;
            font-size: 2rem;
            /* Add other heading styles if desired */
        }

        .jumbotron p {
            font-size: 1.5rem;
            /* Add other paragraph styles if desired */
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <center>
            <!-- Content inside the jumbotron -->
            <br>
            <h1>DINAS LINGKUNGAN HIDUP</h1>
            <h2>KOTA SERANG</h2>
            <br>
            <p>(Visi & Misi)</p>
        </center>
    </div>
</body>
</html>

<main role="main" class="container">
      <div class="row">
        <div class="col-md-9 blog-main">
           
          <aside class="col-md-12 blog-sidebar">
          <div class="p-3 mb-3 bg-white rounded text-dark">
          <h1 style="text-align: center;"><strong>Visi</strong></h1>
          <h1 style="text-align: center;"><em>&ldquo;Bersama Menjaga Kualitas Lingkungan Hidup Kota Serang&rdquo;</em></h1>
          <h1 style="text-align: center;">&nbsp;</h1>
          <h1 style="text-align: center;"><strong>Misi</strong></h1><br>
          <p style="text-align: left;">1. Meningkatkan kapasitas dan akuntabilitas BLHD,</p>
          <p style="text-align: left;">2. Meningkatkan kualitas lingkungan hidup dan pengelolaan sumberdaya alam,</p>
          <p style="text-align: left;">3. Meningkatkan kemampuan, kesadaran, kepedulian, dan partisipasi para pemangku kepentingan terhadap fungsi lingkungan hidup</p>  
        
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->
        
        <!-- /.blog-main -->
</main>
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
    <br>