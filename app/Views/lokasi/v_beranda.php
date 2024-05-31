<main role="main">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="<?= base_url('gambar/logo1.jpg')?>" width="1150px" height="350px"  alt="First slide">
            <div class="container">
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="<?= base_url('gambar/logo2.jpg')?>" width="1150px" height="350px" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="<?= base_url('gambar/logo3.jpg')?>" width="1150px" height="350px" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <main role="main">
  <!-- Your existing carousel code... -->

  <!-- Berita section -->
  <br>
  <center><h1>BERITA</h1></center><hr>

  <div class="container marketing">
    <div class="row">
      <?php
      $koneksi = mysqli_connect('localhost', 'root', '', 'webgis');
      $sql = mysqli_query($koneksi, "SELECT * FROM tbl_berita");
      $no = 1;
      $num_char = 100; // Assuming you want to show 100 characters of the card text
while ($berita = mysqli_fetch_array($sql)) {
    if ($no <= 6) {
        $text = $berita['isi'];
        
        if (strlen($text) > $num_char) {
            $char = $text[$num_char - 1];
            while ($char != ' ' && $num_char > 0) {
                $char = $text[--$num_char];
            }
        }
      ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="<?= base_url('foto/' . $berita['foto_berita']) ?>" width="100%" height="300px">
              <div class="card-body">
                <h5 class="featurette-heading"><?= $berita['judul_berita'] ?></h5>
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Add data-news-content attribute to store the full content of the news -->
                  <button type="button" class="btn btn-dark btn-block view-button" data-news-content="<?= htmlspecialchars($berita['isi']) ?>" data-news-title="<?= htmlspecialchars($berita['judul_berita']) ?>">View</button>
                </div>
              </div>
            </div>
          </div>
      <?php
          $no++;
        }
      }
      ?>
    </div>
  </div>
</main>

<!-- Bootstrap Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsModalLabel">News Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
      <!-- Display the image and the full content of the news article -->
      <div class="row">
        <div class="col-md-4">
          <img id="newsImage" src="" alt="News Image" class="img-fluid mb-3">
        </div>
        <div class="col-md-8">
          <p id="newsContent"></p>
          <div id="hashtags">
            <span class="hashtag">#kotaserang</span>
            <span class="hashtag">#ajekendor</span>
            <span class="hashtag">#dinaslingkunganhidupkotaserang</span>
            <span class="hashtag">#mulaidarikita</span>
            <span class="hashtag">#sampah</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* ... Your existing styles ... */

  /* Custom CSS for hashtags */
  #hashtags {
    margin-top: 10px;
  }

  .hashtag {
    margin-right: 10px;
    color: #007bff; /* Blue color for hashtags, you can adjust this */
    font-weight: bold;
  }
</style>

<!-- Add custom CSS for modal images -->
<style>
  #newsImage {
    max-width: 100%; /* Make the image fit within the container */
    height: 200px; /* Maintain the aspect ratio */
  }
</style>

<!-- JavaScript block for handling the View action -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".view-button").forEach(function (button) {
    button.addEventListener("click", function () {
      var newsContent = this.getAttribute("data-news-content");
      var newsImage = this.closest(".card").querySelector("img").getAttribute("src");
      var newsTitle = this.getAttribute("data-news-title");

      // Set the full content, image, and title in the modal
      document.getElementById("newsContent").textContent = newsContent;
      document.getElementById("newsImage").setAttribute("src", newsImage);
      document.getElementById("newsModalLabel").textContent = newsTitle;

      // Show the modal
      $('#newsModal').modal('show');
    });
  });
});

</script>





            
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        

        
        <!-- /END THE FEATURETTES -->
        

      </div><!-- /.container -->
</main>

<br>
<div class="hero-box  bg-white rounded text-dark hero-box-smaller ">
        <div class="container">
            <div class="row wow bounceInUp animated animated" data-wow-duration="0.9s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.2s;">
                <br>
                <br>
                <div class="col-md-5 blog-sidebar">
                  
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