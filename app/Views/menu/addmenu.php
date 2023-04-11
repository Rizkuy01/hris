<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>

<!-- //error validation -->
<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
        <h4>Form Validation</h4>
        </hr />
        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="content col-lg-4">
    <form action="<?= base_url('menu/addmenu'); ?>" method="post">
        <div class="body">
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Add new menu" value="<?= set_value('title') ?>" autocomplite="off">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Add new menu url" value="<?= set_value('url') ?>" autocomplite="off">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Add new menu icon" value="<?= set_value('icon') ?>" autocomplite="off">
            </div>
        </div>
        <div class="footer">
            <a href="<?= base_url('menu/menu'); ?>" type="button" class="btn btn-secondary">Close</a>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>