<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card m-3 border-primary" style="max-width: 640px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/' . user()->user_image); ?>" class="img-fluid rounded-start mt-4 ml-4" alt="<?= user()->fullname ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= user()->username; ?></h4>
                                </li>
                                <?php if (user()->fullname) : ?>
                                    <h5 class="list-group-item"><?= user()->fullname; ?></h3>
                                    <?php endif; ?>
                                    <h6 class="list-group-item"><?= user()->email; ?></h6>

                                    <ul class="list-group list-group-horizontal">
                                        <h6 class="list-group-item"><?= user()->position; ?></h6>
                                        <h6 class="list-group-item"><?= user()->divisi; ?></h6>
                                    </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>