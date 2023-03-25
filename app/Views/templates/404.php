<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="container-fluid">
        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">Maybe this page is under development mode</p>
            <a href="<?= base_url('dashboard'); ?>">&larr; Back to Dashboard</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>