<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <!-- Button trigger modal -->
            <div class="mb-3">
                <a href="<?= base_url('admin/employee'); ?>" type="button" class="btn btn-secondary">Go back</a>
                <a href="#" type="button" class="btn btn-warning" data-toggle='modal' data-target='#editEmployeeModal'>Edit</a>
            </div>

            <div class="card mb-3" style="max-width: 1200px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <li class="list-group-item">
                            <label class="small ml-4">ID</label>
                            <span class="badge badge-<?= ($user->name == 'Admin') ? 'success' : 'primary' ?>">
                                <?= $user->id_employee; ?>
                            </span>
                        </li>
                        <img src="<?= base_url('/img/' . $user->img); ?>" class="img-fluid rounded-start mt-4 ml-4" alt="<?= $user->name ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="modal-body">
                            <label class="small">name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="<?= $user->name  ?>" disabled>
                            </div>
                            <label class="small">email</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="<?= $user->email; ?>" disabled>
                            </div>
                            <label class="small">birth</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="birth" name="birth" placeholder="<?= $user->birth_place; ?>, <?= $user->birth_date ?>" disabled>
                            </div>
                            <label class="small">phone number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="<?= $user->no_tlp ?>" disabled>
                            </div>
                            <label class="small">address</label>
                            <div class="form-group">
                                <textarea class="form-control" id="address" name="address" placeholder="<?= $user->address ?>" disabled></textarea>
                            </div>
                            <label class="small">gender</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="gender" name="gender" placeholder="<?= $user->gender ?>" disabled></input>
                            </div>
                            <label class="small">religion</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="religion" name="religion" placeholder="<?= $user->religion ?>" disabled></input>
                            </div>
                            <label class="small">degree</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="degree" name="degree" placeholder="<?= $user->degree ?>" disabled>
                            </div>
                            <label class="small">divisi</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="divisi" name="divisi" placeholder="<?= $user->divisi ?>" disabled>
                            </div>
                            <label class="small">position</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="position" name="position" placeholder="<?= $user->position ?>" disabled>
                            </div>
                            <li class="list-group-item">
                                <small><a href="<?= base_url('admin/employee') ?>">&laquo; back to employee list</a></small>
                            </li>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editEmployeeModalLabel"><?= $user->name  ?></h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <label class="small">ID</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" placeholder="<?= $user->id_employee ?>">
                    </div>
                    <label class="small">username</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="<?= $user->name  ?>">
                    </div>
                    <label class="small">email</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="<?= $user->email; ?>">
                    </div>
                    <label class="small">phone number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="<?= $user->no_tlp ?>">
                    </div>
                    <label class="small">address</label>
                    <div class="form-group">
                        <textarea class="form-control" id="address" name="address" placeholder="<?= $user->address ?>"></textarea>
                    </div>
                    <label class="small">degree</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="<?= $user->degree ?>">
                    </div>
                    <label class="small">position</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="position" name="position" placeholder="<?= $user->position ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
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
<?= $this->endSection(); ?>