<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="content col-lg-4">
        <form action="<?= base_url('user/add_user'); ?>" method="post" id="add_form">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="fullname" placeholder="Add username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Add email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="role" name="role" placeholder="Add role">
                </div>
            </div>
            <div class="footer">
                <a href="<?= base_url('admin/index'); ?>" type="button" class="btn btn-secondary">Go back</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>