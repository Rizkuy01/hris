<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-business-time"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CIPTA HRIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- QUERY MENU -->
    <?php
    $queryMenu = "SELECT*
                    FROM `menu`"

    ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if (in_groups(['Admin'])) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Administrator Heading -->
        <div class="sidebar-heading">
            Administrator
        </div>

        <li class="nav-item">
            <a class="nav-link pb-0" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
                <i class="fas fa-users-cog"></i>
                <span>Admin</span>
            </a>
            <div id="collapseAdmin" class="collapse show mt-3" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="<?= base_url('admin'); ?>">
                        <i class="fas fa-user-check"></i>
                        <span class="ml-2">User List</span>
                    </a>

                    <a class="collapse-item" href="<?= base_url('admin/employee'); ?>">
                        <i class="fas fa-user"></i>
                        <span class="ml-2">Employee List</span>
                    </a>

                    <a class="collapse-item" href="<?= base_url('admin/role'); ?>">
                        <i class="fas fa-user-secret"></i>
                        <span class="ml-2">Role Access</span>
                    </a>

                    <div class="collapse-divider"></div>
                    <a class="collapse-item" href="<?= base_url('menu/menu'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span class="ml-2">Menu Management</span>
                    </a>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">Lorem ipsum</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Attendance Heading -->
    <div class="sidebar-heading">
        ABSENSI
    </div>

    <!-- Nav Item - absen hari ini -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('absensi'); ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Absensi</span></a>
    </li>

    <!-- Nav Item - Rekap absen -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('absensi/rekap'); ?>">
            <i class="fas fa-calendar-alt"></i>
            <span>Rekap Absensi</span></a>
    </li>

    <?php if (in_groups(['Admin'])) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Payroll Heading -->
        <div class="sidebar-heading">
            Payroll
        </div>

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-money-check-alt"></i>
                <span>Payroll (TBA)</span>
            </a>
            <div id="collapsePages" class="collapse hide" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Lorem ipsum dolor sit:</h6>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">Lorem ipsum</a>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">Lorem ipsum</a>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">Lorem ipsum</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Lorem ipsum dolor sit:</h6>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">lorem ipsum</a>
                    <a class="collapse-item" href="<?= base_url('templates/404'); ?>">Lorem ipsum</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Profile Heading -->
    <div class="sidebar-heading">
        PROFILE
    </div>

    <!-- Nav Item - My profile -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Edit profile -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('templates/404') ?>">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <?php if (in_groups(['Admin'])) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Data Master -->
        <div class="sidebar-heading">
            DATA MASTER
        </div>

        <!-- Nav Item - Divisi -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('data_master/divisi'); ?>">
                <i class="fas fa-street-view"></i>
                <span>Divisi</span></a>
        </li>

        <!-- Nav Item - Position -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('data_master/position') ?>">
                <i class="fas fa-id-card-alt"></i>
                <span>Position</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->