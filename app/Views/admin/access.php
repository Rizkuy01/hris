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
                    <?php foreach ($permission as $p) : ?>
                        <tr>
                            <td><?= $p->description; ?></td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="access<?= $p->id; ?>" <?= check_access($group_id, $p->id); ?> data-group="<?= $group_id; ?>" data-permission="<?= $p->id; ?>">
                                    <label class="custom-control-label" for="access<?= $p->id; ?>"></label>
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

<script>
    $('.custom-control-input').on('click', function() {
        const groupId = $(this).data('group');
        const permissionId = $(this).data('permission');

        console.log(groupId, permissionId);
        $.ajax({
            url: "<?= base_url('change-access'); ?>",
            type: 'post',
            data: {
                groupId: groupId,
                permissionId: permissionId
            },
            success: function(data) {
                // document.location.href = "<?= base_url('admin/access/'); ?>" + permissionId;
                console.log(data)
            }
        });
    });
</script>
<?= $this->endSection(); ?>