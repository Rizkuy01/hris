<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <!-- Button trigger modal -->
            <div class="mb-3">
                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Employee</a>
            </div>

            <table class="table table-striped dt-responsive nowrap" id="table-employe" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->name; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info">details</a> -->
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#detailModal">details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/index'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="Add employee name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Add email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Add phone number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Add address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Add last degree">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Add position">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active Account
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- details Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailModalLabel"><?= $user->username  ?></h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <label class="small">username</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="<?= $user->username  ?>" disabled>
                    </div>
                    <label class="small">email</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="<?= $user->email; ?>" disabled>
                    </div>
                    <label class="small">phone number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Add phone number">
                    </div>
                    <label class="small">address</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Add address">
                    </div>
                    <label class="small">degree</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Add last degree">
                    </div>
                    <label class="small">position</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Add position">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked disabled>
                            <label class="form-check-label" for="is_active">
                                Account active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $('#table-employe').DataTable();
</script>

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script> -->
<?= $this->endSection(); ?>