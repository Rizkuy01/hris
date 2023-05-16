<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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

    <div class="content col-lg-6">
        <form action="<?= base_url('employee/add_employee'); ?>" method="post" id="add_employeeform">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" id="id_employee" name="id_employee" placeholder="Add id employee" value="<?= set_value('id_employee') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Add employee name" value="<?= set_value('name') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Add email" value="<?= user()->email ?>" autocomplite="off">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Add birth place" value="<?= set_value('birth_place') ?>" autocomplite="off">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Add date of birth" value="<?= set_value('birth_date') ?>" autocomplite="off">
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Add phone number" value="<?= set_value('no_tlp') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Add address" value="<?= set_value('address') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Add gender" value="<?= set_value('gender') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Add employee religion" value="<?= set_value('gender') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="degree" name="degree" placeholder="Add last degree" value="<?= set_value('degree') ?>" autocomplite="off">
                </div>
                <div class="form-group">
                    <select name="divisi" id="divisi" class="form-control" value="<?= set_value('divisi') ?>">
                        <option value="">Divisi</option>
                        <?php foreach ($divisi as $div) : ?>
                            <option value=" <?= $div->name; ?>"><?= $div->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="position" id="position" class="form-control" value="<?= set_value('position') ?>">
                        <option value="">Position</option>
                        <?php foreach ($posisi as $pos) : ?>
                            <option value=" <?= $pos->title; ?>"><?= $pos->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="footer">
                <a href="<?= base_url('admin/employee'); ?>" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- <script>
    document.getElementById("add_employeeform").addEventListener("submit", function() {
        // Menonaktifkan form setelah dikirim
        var form = document.getElementById("add_employeeform");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].disabled = true;
        }

        // Mengganti nilai input dengan value yang baru
        var idEmployee = document.getElementById("id_employee").value;
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        // Tambahkan kode ini untuk mengganti nilai input lainnya sesuai kebutuhan

        document.getElementById("id_employee").value = idEmployee;
        document.getElementById("name").value = name;
        document.getElementById("email").value = email;
        // Tambahkan kode ini untuk mengganti nilai input lainnya sesuai kebutuhan
    });
</script> -->

<?= $this->endSection(); ?>