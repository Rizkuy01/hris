<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- //error validation -->
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show col-lg-4" role="alert">
            <h4>Form Validation</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- //success validation -->
    <?php
    if (session()->getFlashData('success')) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>

    <div class="content col-lg-4">
        <form action="<?= base_url('user/add_user'); ?>" method="post" id="add_userform">
            <div class="body">
                <!-- fullname -->
                <div class="form-group">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Add Fullname" value="<?= set_value('fullname') ?>" autocomplete="off">
                </div>
                <!-- username -->
                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Add username" value="<?= set_value('username') ?>" autocomplete="off">
                </div> -->
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="exampleInputUsername" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>
                <!-- email -->
                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Add email" value="<?= set_value('email') ?>" autocomplete="off">
                </div> -->
                <div class="form-group">
                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" name="email">
                    <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                </div>
                <!-- divisi -->
                <div class="form-group">
                    <select name="divisi" id="divisi" class="form-control" value="<?= set_value('divisi') ?>">
                        <option value="">Divisi</option>
                        <?php foreach ($divisi as $div) : ?>
                            <option value=" <?= $div->name; ?>"><?= $div->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- posisi -->
                <div class="form-group">
                    <select name="position" id="position" class="form-control" value="<?= set_value('position') ?>">
                        <option value="">Position</option>
                        <?php foreach ($posisi as $pos) : ?>
                            <option value=" <?= $pos->title; ?>"><?= $pos->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- password -->
                <!-- <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password_hash" name="password_hash" value="<?= set_value('password_hash') ?>" placeholder="Password">
                    </div>
                </div> -->
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password_hash" id="exampleInputPassword" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="exampleRepeatPassword" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>
                </div>

            </div>

            <div class="footer">
                <a href="<?= base_url('admin/index'); ?>" type="button" class="btn btn-secondary">Go back</a>
                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                <button type="submit" class="btn btn-primary btn-user">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>