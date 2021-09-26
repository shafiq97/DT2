<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion uia" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-text mx-3 uia">Role: <?php echo $_SESSION['role_name']?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt" style="color:white"></i>
        <span style="color:white">Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading" style="color:white">
    Menu
</div>
<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="indexmain.php">
        <i class="fas fa-fw fa-chart-area" style="color:white"></i>
        <span style="color:white">Add Document</span><br>
    </a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="announcement.php">
        <i class="fas fa-fw fa-table" style="color:white"></i>
        <span style="color:white">View Announcement</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="view_docs.php">
        <i class="fas fa-fw fa-table" style="color:white"></i>
        <span style="color:white">View and Track Documents</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog" style="color:white"></i>
        <span style="color:white">Generate Report</span>
    </a>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <form action="report.php" method="post">
            <div class="bg-light py-2 collapse-inner rounded">
                <button class="btn collapse-item" type="submit" name="month">Received this month</button>
                <button class="btn collapse-item" type="submit" name="year">Received this year</button>
                <button class="btn collapse-item" type="submit" name="assignee">Recevied assignee</button>
                <button class="btn collapse-item" type="submit" name="custom">Custom Filter</button>
            </div>
        </form>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog" style="color:white"></i>
        <span style="color:white">Configuration</span>
    </a>

    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <form action="configuration.php" method="post">
            <div class="bg-light py-2 collapse-inner rounded">
                <button class="btn" type="submit" name="doc_cat_view" style="font-size: 15px;">Document Category</button>
                <button class="btn" type="submit" name="centre_of_studies_view" style="font-size: 15px;">Kulliyyah/Centre/Institute</button>
                <button class="btn" type="submit" name="programme_view" style="font-size: 15px;">Programme</button>
                <button class="btn" type="submit" name="graduate_view" style="font-size: 15px;">Graduate</button>
            </div>
        </form>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="../../includes/logout.php">
        <i class="fas fa-fw fa-table" style="color:white"></i>
        <span style="color:white">Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->