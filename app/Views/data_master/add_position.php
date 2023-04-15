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
        <form action="<?= base_url('data_master/add_position'); ?>" method="post" id="add_positionform">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Add position" value="<?= set_value('name') ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <select name="division" id="division" class="form-control" value="<?= set_value('division') ?>">
                        <option value="">Divisi</option>
                        <?php foreach ($divisi as $div) : ?>
                            <option value=" <?= $div->id; ?>"><?= $div->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="footer">
                <a href="<?= base_url('data_master/position'); ?>" type="button" class="btn btn-secondary">Go back</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>