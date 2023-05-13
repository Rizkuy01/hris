<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Welcome, <?= user()->username; ?>!</h1>

    <div class="row p-2">
        <!-- mini profile -->
        <div class="row-lg-8 mx-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/' . user()->user_image); ?>" class="img-fluid rounded-start mt-4 ml-4" alt="<?= user()->fullname ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= user()->fullname; ?></h4>
                                </li>
                                <li class="list-group-item"><?= user()->email; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- worktime countdown -->
        <div class="row-lg-8 mx-3">
            <div class="card pb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>Worktime</h4>
                                    <h4 id="countdown" style="color: red;"></h4>
                                    <!-- <button onclick="resetCountdown()">Reset Countdown</button> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="chart-container"></div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
        <script src="script.js"></script>

    </div>

</div>

<!-- countdown script -->
<script>
    // Get the current date and set the end time to 17:00:00
    var endDate = new Date();
    endDate.setHours(17, 0, 0, 0);

    // Initialize the countdown timer
    var countdown;

    function startCountdown() {
        countdown = setInterval(function() {
            // Get the current date and time
            var now = new Date().getTime();

            // Check if the end time has been reached
            if (now >= endDate.getTime()) {
                clearInterval(countdown);
                document.getElementById("countdown").innerHTML = "TIME TO GO HOME!";
            } else {
                // Calculate the time remaining until the end time
                var distance = endDate.getTime() - now;
                var hours = Math.floor(distance / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the remaining time to the element with id="countdown"
                document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
            }
        }, 1000);
    }

    function resetCountdown() {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "";
        endDate.setDate(endDate.getDate() + 1);
        endDate.setHours(17, 0, 0, 0);
        startCountdown();
    }

    // notifikasi waktu habis
    function showNotification() {
        if (Notification.permission === "granted") {
            var notification = new Notification("TIME TO GO HOME!", {
                body: "Waktu sudah menunjukkan pukul 17:00.",
                icon: "cg-logo.webp" // Ganti dengan URL ikon notifikasi Anda
            });
        } else if (Notification.permission !== "denied") {
            Notification.requestPermission().then(function(permission) {
                if (permission === "granted") {
                    var notification = new Notification("TIME TO GO HOME!", {
                        body: "Waktu sudah menunjukkan pukul 17:00.",
                        icon: "cg-logo.webp" // Ganti dengan URL ikon notifikasi Anda
                    });
                }
            });
        }
    }

    // Start the countdown when the page loads
    window.onload = startCountdown;
</script>

<?= $this->endSection(); ?>