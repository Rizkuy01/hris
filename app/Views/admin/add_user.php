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
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show col-lg-4" role="alert">
            <h4>Data Submited!</h4>
            </hr />
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="content col-lg-4">
        <form action="<?= base_url('user/add_user'); ?>" method="post" id="add_form">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Add Fullname" value="<?= set_value('fullname') ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Add username" value="<?= set_value('username') ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Add email" value="<?= set_value('email') ?>" autocomplete="off">
                </div>
            </div>
            <div class="footer">
                <a href="<?= base_url('admin/index'); ?>" type="button" class="btn btn-secondary">Go back</a>
                <button type="submit" class="btn btn-primary" onclick="resetForm()">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById("add_form").reset();
    }
</script>
<?= $this->endSection(); ?>