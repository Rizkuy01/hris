<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p>Welcome! </p>
    <!-- <a class="card text-white bg-success mb-3 rounded-lg" style="max-width: 18rem;" onclick="<?= base_url("absensi/index") ?>" cursor="pointer">
        <div class="card-header text-white bg-success mb-3">Absensi Karyawan</div>
        <div class="card-body">
            <h5 class="card-title">Success card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </a> -->
</div>

<?= $this->endSection(); ?>