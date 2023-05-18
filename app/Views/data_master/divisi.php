<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">

            <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table-divisi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($divisi as $div) : ?>
                        <tr>
                            <td><?= $div->id; ?></td>
                            <td><?= $div->name; ?></td>
                            <td><?= $div->email; ?></td>
                        </tr>
                        <?php $i++ ?>
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
    $('#table-divisi').DataTable();
</script>

<?= $this->endSection(); ?>