<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= url_to('register') ?>" method="post" class="user">

                                    <!-- email address -->
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" name="email">
                                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                    </div>

                                    <!-- username -->
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="exampleInputUsername" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    </div>

                                    <!-- divisi -->
                                    <!-- <div class="form-group">
                                        <select name="Divisi" id="Divisi" class="form-control form-control-user" value="" placeholder="divisi">
                                            <option value="">Divisi</option>
                                            <option value="">Graha</option>
                                            <option value="">Cipta Digital</option>
                                            <option value="">Cipta Office Galuh</option>
                                            <option value="">Butik Undangan Cianjur</option>
                                            <option value="">Cipta Purwakarta</option>
                                            <option value="">Cipta Online</option>
                                            <option value="">Corporate</option>
                                        </select>
                                    </div> -->

                                    <!-- Posisi -->
                                    <!-- <div class="form-group">
                                        <select name="position" id="position" class="form-control form-control-user" value="">
                                            <option value="">Position</option>
                                            <option value="">HR</option>
                                            <option value="">IT</option>
                                            <option value="">Marketing</option>
                                            <option value="">Accounting</option>
                                            <option value="">Koki</option>
                                            <option value="">Admin</option>
                                            <option value="">Customer Service</option>
                                            <option value="">Operator Setting</option>
                                            <option value="">Operator Finishing</option>
                                            <option value="">Operator Gudang</option>
                                            <option value="">Operator Offset</option>
                                            <option value="">Operator A3</option>
                                            <option value="">Operator Large Format</option>
                                            <option value="">Account Manager</option>
                                            <option value="">Delivery</option>
                                            <option value="">Outsourcing</option>
                                        </select>
                                    </div> -->


                                    <!-- password -->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="exampleInputPassword" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="exampleRepeatPassword" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?= lang('Auth.register') ?>
                                    </button>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>