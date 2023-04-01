<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <table class="table table-hover" id="table-access" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <td><?= $r->description; ?></td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="access" checked>
                                    <label class="custom-control-label" for="access">Access</label>
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="<?= base_url('admin/role'); ?>" type="button" class="btn btn-secondary">Go back</a>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $('#table-access').DataTable();
</script>
<?= $this->endSection(); ?>