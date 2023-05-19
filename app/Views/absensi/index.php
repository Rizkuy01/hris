<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>



<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Absensi</h1>

    <!-- //error validation -->
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
            <h4>Form Validation</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="content col-lg-4">
        <form action="<?= base_url('absensi/index'); ?>" method="post" id="employee_attendance">
            <div class="body">

                <!-- form nama -->
                <label>Nama:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="your name..." value="<?= user()->fullname ?>" autocomplite="off">
                </div>

                <!-- form posisi -->
                <label>Posisi:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="position" name="position" placeholder="Current Position" value="<?= user()->position ?>" autocomplite="off">
                </div>

                <!-- form divisi -->
                <label>Divisi:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="divisi" name="divisi" placeholder="Current Division" value="<?= user()->divisi ?> " autocomplite="off">
                </div>

                <!-- menentukan koordinat lokasi -->
                <label for="lokasi">Lokasi:</label>
                <div id="lokasi-label">Klik tombol 'Ambil Lokasi' untuk mendapatkan lokasi anda.</div>
                <input type="text" id="latitude" name="latitude" placeholder="latitude">
                <input type="text" id="longitude" name="longitude" placeholder="longitude">
                <btn type="button" class="btn btn-pill btn-success ml-3 mb-1" onclick="coordinate()">Ambil Lokasi</btn><br>

                <!-- link google maps -->
                <div class="form-group">
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Link Google Maps" value="" autocomplite="off">
                </div>

                <!-- open camera -->
                <!-- <div class="custom-file">
                    <label for=" foto" class="custom-file-label">File foto</label>
                    <input type="file" id="foto" name="foto" accept="image/*" capture="camera" class="custom-file-input">
                </div> -->
                <button type="button" class="btn btn-primary mb-3" onclick="openCamera()">Ambil Foto</button>

                <!-- memvisualisasikan lokasi -->
                <div id="map-box" style="display:none">
                    <label for="lokasi" id="lokasi">Maps : </label>
                    <div id="map" style="height: 400px;"></div>
                </div>


            </div>
            <div class="footer">
                <button type="submit" class="btn btn-primary my-3 col-lg-12">Add</button>
            </div>
        </form>
    </div>

</div>

<script>
    // menentukan koordinat
    function coordinate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;

        var mapUrl = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude;

        var lokasiLabel = document.getElementById("lokasi-label");
        lokasiLabel.innerHTML = "Latitude: " + latitude + ", Longitude: " + longitude + " (<a href='" + mapUrl + "' target='_blank'>Lihat di Google Maps</a>)";

        var lokasiForm = document.getElementById("lokasi");
        lokasiForm.value = mapUrl;
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
            // "true" jika ingin marker bisa di drag
            draggable: false
        });
        // Menambahkan event listener untuk marker ketika di drag
        google.maps.event.addListener(marker, 'dragend', function(event) {
            // Menampilkan koordinat marker pada input lokasi
            var locationInput = document.getElementById("lokasi");
            locationInput.value = event.latLng.lat() + "," + event.latLng.lng();
        });
        // Menampilkan kotak visualisasi lokasi
        var locationInput = document.getElementById("lokasi");
        locationInput.readOnly = false;
        locationInput.style.display = "block";
        mapElement.style.display = "block";

        // Mendapatkan file yang diunggah saat tombol submit ditekan
        var submitButton = document.querySelector("button[type='submit']");
        submitButton.addEventListener("click", function() {
            var file = fileInput.files[0];

            // Lakukan sesuatu dengan file yang diunggah, misalnya mengirim ke server
            // Anda dapat mengakses file melalui objek 'file' di sini
            console.log("Nama file:", file.name);
            console.log("Tipe file:", file.type);
            console.log("Ukuran file:", file.size);
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
            navigator.geolocation.watchPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                tampilkanMap(latitude, longitude);
            });
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }
    }


    // Akses kamera
    function openCamera() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    var video = document.createElement('video');
                    video.srcObject = stream;
                    video.onloadedmetadata = function() {
                        video.play();
                    };

                    var captureButton = document.createElement('button');
                    captureButton.textContent = 'Ambil';
                    captureButton.onclick = function() {
                        var canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        var context = canvas.getContext('2d');
                        context.drawImage(video, 0, 0, canvas.width, canvas.height);

                        var fotoInput = document.getElementById('foto');
                        var foto = canvas.toDataURL('image/jpeg', 5.0);
                        fotoInput.value = foto;

                        video.srcObject = null;
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    };

                    var cancelButton = document.createElement('button');
                    cancelButton.textContent = 'Batal';
                    cancelButton.onclick = function() {
                        video.srcObject = null;
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    };

                    var videoContainer = document.createElement('div');
                    videoContainer.appendChild(video);
                    videoContainer.appendChild(captureButton);
                    videoContainer.appendChild(cancelButton);

                    var formGroup = document.getElementById('lokasi');
                    formGroup.appendChild(videoContainer);
                })
                .catch(function(error) {
                    console.error('Error accessing camera: ', error);
                });
        } else {
            console.error('Camera not supported');
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
                alert("Data berhasil dikirim ke server!");
            } else {
                alert("Terjadi kesalahan pada server!");
            }
        };
        xhr.send(formData);
    }

    // Memanggil fungsi getLocation saat halaman dimuat
    getLocation();
</script>

<?= $this->endSection(); ?>