<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-2">

            <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table-rekap" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama</th>
                        <th scope="col">posisi</th>
                        <th scope="col">divisi</th>
                        <th scope="col">lokasi</th>
                        <th scope="col">foto</th>
                        <th scope="col">waktu absen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($absen as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->position; ?></td>
                            <td><?= $a->divisi; ?></td>
                            <td><a href="<?= $a->lokasi; ?>" target="_blank"><?= $a->lokasi; ?></a></td>
                            <td><img src="<?= $a->foto; ?>" alt="Foto"></td>
                            <td><?= $a->waktu; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $('#table-rekap').DataTable();
</script>




<?= $this->endSection(); ?>