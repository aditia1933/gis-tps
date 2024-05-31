<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'webgis');

if (isset($_GET['id'])) {
    $id_artikel = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_berita WHERE id = '$id_artikel'");
    $artikel = mysqli_fetch_assoc($sql);
}
?>

<!-- Bagian HTML untuk menampilkan konten lengkap artikel -->
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="p-3 mb-3 bg-white rounded text-dark">
                <h1 style="text-align: center;"><strong><?= $artikel['judul_berita'] ?></strong></h1>
                <div style="text-align: justify;">
                    <?= $artikel['isi'] ?>
                </div>
            </div>
        </div>
    </div>
</main>