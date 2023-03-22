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

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<?php if (in_groups('Admin')) : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - User List -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
        <i class="fas fa-user-tag"></i>
            <span>User List</span></a>
    </li>
    <!-- Nav Item - Employee List -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/employee'); ?>">
        <i class="fas fa-users"></i>
            <span>Employee List</span></a>
    </li>
<?php endif; ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    ABSENSI
</div>

<!-- Nav Item - absen hari ini -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('absensi'); ?>">
    <i class="fas fa-calendar-check"></i>
        <span>Absensi</span></a>
</li>

<!-- Nav Item - Rekap absen -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('absensi/rekap'); ?>">
    <i class="fas fa-calendar-alt"></i>
        <span>Rekap Absensi</span></a>
</li>

<?php if (in_groups('Admin')) : ?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    SALARY
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('payroll'); ?>">
    <i class="fas fa-user-tie"></i>
        <span>My Profile</span></a>
</li> -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-money-check-alt"></i>
        <span>Payroll (TBA)</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>
<?php endif; ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    PROFILE
</div>

<!-- Nav Item - My profile -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('user'); ?>">
    <i class="fas fa-user-tie"></i>
        <span>My Profile</span></a>
</li>

<!-- Nav Item - Edit profile -->
<li class="nav-item">
    <a class="nav-link" href="edit-profile.html">
        <i class="fas fa-user-edit"></i>
        <span>Edit Profile</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Logout -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('logout'); ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->