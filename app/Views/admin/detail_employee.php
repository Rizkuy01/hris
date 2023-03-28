<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 1200px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <li class="list-group-item">
                            <label class="small ml-4">ID</label>
                            <span class="badge badge-<?= ($user->name == 'Admin') ? 'success' : 'warning' ?>">
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
<?= $this->endSection(); ?>