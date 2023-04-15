<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <!-- Button trigger modal -->
            <div class="mb-3">
                <a href="/data_master/add_position" type="button" class="btn btn-primary">Add New Position</a>
            </div>

            <table class="table table-striped table-bordered dt-responsive nowrap" id="table-position" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">division</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($posisi as $pos) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $pos->title; ?></td>
                            <td><?= $pos->division; ?></td>
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
    $('#table-position').DataTable();
</script>

<?= $this->endSection(); ?>