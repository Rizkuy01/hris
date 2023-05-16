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
                <!-- id employee -->
                <label for="id_employee">id employee:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="id_employee" name="id_employee" placeholder="Add id employee" value="<?= set_value('id_employee') ?>" autocomplite="off">
                </div>
                <!-- employee name -->
                <label for="name">fullname:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Add employee name" value="<?= set_value('name') ?>" autocomplite="off">
                </div>
                <!-- emplpoyee email -->
                <label for="email">email:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Add email" value="<?= set_value('email') ?>" autocomplite="off">
                </div>
                <!-- start work -->
                <label for="start_working">start working:</label>
                <div class="form-group">
                    <input type="date" class="form-control" id="start_working" name="start_working" placeholder="work start date" value="<?= set_value('start_working') ?>" autocomplite="off">
                </div>
                <!-- birth -->
                <label for="birth">birth:</label>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Add birth place" value="<?= set_value('birth_place') ?>" autocomplite="off">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Add date of birth" value="<?= set_value('birth_date') ?>" autocomplite="off">
                    </div>
                </div>
                <!-- phone number -->
                <label for="no_tlp">phone number:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Add phone number" value="<?= set_value('no_tlp') ?>" autocomplite="off">
                </div>
                <!-- employee address -->
                <label for="address">address:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Add address" value="<?= set_value('address') ?>" autocomplite="off">
                </div>
                <!-- employee gender -->
                <label for="gender">gender:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Add gender" value="<?= set_value('gender') ?>" autocomplite="off">
                </div>
                <!-- employee religion -->
                <label for="religion">religion:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Add employee religion" value="<?= set_value('religion') ?>" autocomplite="off">
                </div>
                <!-- employee last degree -->
                <label for="degree">degree:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="degree" name="degree" placeholder="Add last degree" value="<?= set_value('degree') ?>" autocomplite="off">
                </div>
                <!-- division -->
                <label for="divisi">divisi:</label>
                <div class="form-group">
                    <select name="divisi" id="divisi" class="form-control" value="<?= set_value('divisi') ?>">
                        <option value="">Divisi</option>
                        <?php foreach ($divisi as $div) : ?>
                            <option value=" <?= $div->name; ?>"><?= $div->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- position -->
                <label for="position">position:</label>
                <div class="form-group">
                    <select name="position" id="position" class="form-control" value="<?= set_value('position') ?>">
                        <option value="">Position</option>
                        <?php foreach ($posisi as $pos) : ?>
                            <option value=" <?= $pos->title; ?>"><?= $pos->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- employee status -->
                <label for="mirage">status:</label>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="mirage" id="mirage" class="form-control">
                            <option value="">menikah</option>
                            <option value="">Belum menikah</option>
                        </select>
                    </div>
                    <!-- tanggugan -->
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tanggungan" name="tanggungan" placeholder="Jumlah tanggungan" value="<?= set_value('tanggungan') ?>" autocomplite="off">
                    </div>
                </div>
            </div>
            <div class="footer">
                <a href="<?= base_url('admin/employee'); ?>" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>