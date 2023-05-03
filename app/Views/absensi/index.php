<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>



<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Absensi</h1>

    <div class="content col-lg-4">
        <form action="<?= base_url('index/absensi'); ?>" method="post" id="employee_attendance">
            <div class="body">
                <!-- form nama -->
                <label>Nama:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name..." value="" autocomplite="off">
                </div>
                <!-- form posisi -->
                <label>Posisi:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Current Position" value="" autocomplite="off">
                </div>
                <!-- form divisi -->
                <label>Divisi:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="divisi" name="divisi" placeholder="Current Division" value="" autocomplite="off">
                </div>
                <label for="lokasi">Lokasi:</label>
                <!-- menentukan koordinat lokasi -->
                <div id="lokasi-label">Klik tombol "Ambil Lokasi" untuk mendapatkan kooordinat lokasi anda.</div>
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
                <button type="button" onclick="coordinate()">Ambil Lokasi</button><br>

                <!-- memvisualisasikan lokasi -->
                <label for="lokasi">Maps : </label>
                <div id="map-box" style="display:none">
                    <div id="map" style="height: 400px;"></div>
                </div>


            </div>
            <div class="footer">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>

</div>

<script>
    // fungsi menentukan koordinat
    function coordinate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;

        // Membuat URL Google Maps dari latitude dan longitude
        var mapUrl = "https://www.google.com/maps/search/?api=1&query=" + position.coords.latitude + "," + position.coords.longitude;

        // Menampilkan hasil lokasi pada label
        var lokasiLabel = document.getElementById("lokasi-label");
        lokasiLabel.innerHTML = "Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude + " (<a href='" + mapUrl + "' target='_blank'>Lihat di Google Maps</a>)";
    }


    // Menampilkan peta pada halaman
    function initMap(latitude, longitude) {
        var lokasi = {
            lat: latitude,
            lng: longitude
        };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: lokasi,
        });
        var marker = new google.maps.Marker({
            position: lokasi,
            map: map,
        });
    }

    // Fungsi untuk menampilkan peta pada halaman dan menandai lokasi pengguna
    function tampilkanMap(latitude, longitude) {
        var mapBox = document.getElementById("map-box");
        mapBox.style.display = "block";
        initMap(latitude, longitude);
    }

    // Mendapatkan lokasi pengguna dan menampilkan peta
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                tampilkanMap(latitude, longitude);
            });
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }
    }

    function submitForm() {
        // Mendapatkan nilai lokasi dari input
        var location = document.getElementById("lokasi-label").value;

        // Mendapatkan nilai kamera dari input
        var camera = document.getElementById("camera").files[0];

        // Membuat objek FormData untuk mengirim data
        var formData = new FormData();
        formData.append("location", location);
        formData.append("camera", camera);

        // Mengirim data menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index/absensi");
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Menampilkan pesan sukses jika data berhasil dikirim ke server
                alert("Data berhasil dikirim ke server!");
            } else {
                // Menampilkan pesan error jika terdapat kesalahan pada server
                alert("Terjadi kesalahan pada server!");
            }
        };
        xhr.send(formData);
    }

    // Memanggil fungsi getLocation saat halaman dimuat
    getLocation();
</script>

<?= $this->endSection(); ?>