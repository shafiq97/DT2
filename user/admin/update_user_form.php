<?php 
    include 'settings.php'; //include settings
    $query = "SELECT * FROM users WHERE (role_name IS NULL) or (role_name = '')"; 
    $result = mysqli_query($conn, $query); 
 
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
 
        if ($row) 
        { 
            $_SESSION['current_count'] = $row;
        } 
        else
        {
            $_SESSION['current_count'] = 0;
        }
          // close the result. 
          mysqli_free_result($result); 
    }
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
 
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>Document Tracking System</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png" type="image/icon type">
 
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 
</head>
 
<style type="text/css">
 
  .all{
    font-family: "Nunito", sans-serif;
  }
 
  .uia{
    background: #50C8B5;
    color: black;
  }
 
  .black{
      background: #6C6C6C;
      color: white;
  }
 
</style>
 
<body id="page-top">
 
    <!-- Page Wrapper -->
    <div id="wrapper">
 
        <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion uia" id="accordionSidebar">
 
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3 uia">Role : <?php $ufunc->UserRole();?></div>
            </a>
 
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
 
            <!-- Nav Item - Dashboard -->
            <li class="nav-item uia">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
                    <span style="color:black" >Dashboard</span></a>
            </li>
 
            <!-- Divider -->
            <hr class="sidebar-divider">
 
            <!-- Heading -->
            <div class="sidebar-heading" style="color:black">
                Menu
            </div>
 
            <!-- Divider -->
            <hr class="sidebar-divider">
 
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">
                    <i class="fas fa-fw fa-chart-area" style="color:black"></i>
                    <span style="color:black">Update Announcement</span></a>
            </li>
 
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="update_user_form.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">Update User Role</span></a>
            </li>
 
            <li class="nav-item">
                <a class="nav-link" href="../../includes/logout.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">Logout</span></a>
            </li>
 
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
 
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
 
        </ul>
        <!-- End of Sidebar -->
 
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
 
            <!-- Main Content -->
            <div id="content">
 
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light black topbar mb-4 static-top shadow">
 
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
 
                    <div>
                      Document Tracking System
                    </div>
 
 
 
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto black">
 
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
 
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $_SESSION['current_count']?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="update_user_form.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo Date("d:m:Y") ?></div>
                                        <span class="font-weight-bold">You have <?php echo $_SESSION['current_count'] ?> users with no role!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
 
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>
 
                        <div class="topbar-divider d-none d-sm-block"></div>
 
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php echo $_SESSION['name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid" id="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 black">
                            <h6 class="m-0 font-weight-bold text-white">Update User Role</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"> 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Current Role</th>
                                            <th>Change to</th>
                                            <th>Email</th>
                                            <th>Staff ID</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Current Role</th>
                                            <th>Change to</th>
                                            <th>Email</th>
                                            <th>Staff ID</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
 
                                    <tbody>
                                        <?php 
                                        //TABLE
                                            include "C:\\xampp\htdocs\DTS2\includes\connect.php";
 
                                            // SQL query to fetch information of registerd users and finds user match.
                                            $query = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin') OR (role_name is NULL)";
                                            $result = mysqli_query($conn,$query); 
 
                                            while ($row = mysqli_fetch_array($result)) {
 
                                                echo "<tr>";
                                                echo "<form method='post'>";
                                                echo "<td >" . $row['name'] . "</td>";
                                                echo "<td name='role_name1'>" . $row['role_name'] . "</td>";
                                                echo "<td><select name='role_name' class='form-control'>
                                                        <option selected=".$row['role_name'].">".$row['role_name']."</option>
                                                        <option value=''></option>
                                                        <option value='officer'>Officer</option>
                                                        <option value='director'>Director</option>
                                                        <option value='assistant'>Assistant</option>
                                                        <option value='owner'>Document Owner</option>
                                                    </select></td>";
                                                echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
                                                echo "<td>" . $row['staff_id'] . "</td>";
                                                echo "<td><button class='btn btn-primary' type='submit' name='save_button' value='".$row['staff_id']."'>Save</button></td>";
                                                echo "<td><button class='btn btn-danger' type='submit' name='delete_button' value='".$row['id']."'>Delete</button></td>";
                                                echo "</form>";
                                                echo "</tr>";
                                            }
                                            //mysqli_close($conn); // Closing Connection
                                        ?>
                                    </tbody>
                                </table>
                            </div>
 
                            <script type="text/javascript">
 
                                $('#save').on('click', function()
                                { 
                                    var theContent = $('#role_name');
                                    var result = document.getElementById("user@user.com");
                                    var editedContent = theContent.html();
                                    localStorage.newContent = editedContent;
 
                                    if(localStorage.getItem('newContent')) 
                                    {
                                        theContent.html(localStorage.getItem('newContent'));
                                        console.log(localStorage.getItem('newContent'));
                                    }
                                    var rowCount = $("#dataTable tr").length - 2; 
                                    if(rowCount == 1){
                                        result.style.borderWidth = "5px";
                                        result.style.borderColor = "green";
                                        document.getElementById("save").innerHTML = "Save";
                                        var x = document.createElement("BUTTON");
                                        x.innerHTML = "WOIIIII";
                                        document.body.appendChild(x); 
                                    }
                                    else{
                                        alert("Please select only 1 user");
                                    }
                                });
 
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
 
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Document Tracking System 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
 
        </div>
        <!-- End of Content Wrapper -->
 
    </div>
    <!-- End of Page Wrapper -->
 
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
 
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 
    <script type="text/javascript">
 
        $(document).ready(function() {
 
            $('#dataTable').DataTable().destroy();
 
            $('#dataTable').DataTable( {
                "order": [[ 2, "asc" ]]
            } );
        } );
 
    </script>
<?php 
    //include 'settings.php'; //include settings
 
    if(isset($_POST['role_name'])){
        $id = isset($_POST['save_button']) ? $_POST['save_button'] : 'lol';
        $role = isset($_POST['role_name']) ? $_POST['role_name'] : 'noob';
        echo $id . "@";
        echo $role;
 
        $query = "UPDATE users SET role_name = '$role' WHERE staff_id = '$id'"; 
 
        if (mysqli_query($conn, $query)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
 
        if(isset($_POST['delete_button'])){
            $id2 = isset($_POST['delete_button']) ? $_POST['delete_button'] : 'lol';
 
            $query2 = "DELETE FROM users WHERE id=$id2";
 
            echo $id2;
 
            if ($conn->query($query2) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }
        }
        echo "<meta http-equiv='refresh' content='0'>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
 
    else{
        //echo "Role name not set";
    } 
?>
</body>
</html>