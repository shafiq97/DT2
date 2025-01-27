<?php 
    if(isset($_POST['link_error'])){
        echo $_POST['link_error'];
        echo "<script>alert('Location: ".$_POST['link_error']."')</script>";
        echo "<script>window.close();</script>";
    }
    else{
        include 'settings.php'; //include settings
        $name = $_SESSION['name'];
        $query = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Pending')";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);

        mysqli_free_result($result);

        $today_date = date("Y-m-d");

        $query2 = "SELECT `date`,`message` FROM announcement";
        $result2 = mysqli_query($conn,$query2);
        $count = 0;
        
        while ($row2 = mysqli_fetch_array($result2)) {
            $announcement_date = date("Y-m-d",strtotime($row2['date']));
            if($today_date === $announcement_date){
                $count++;
            }
        }
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

    <title>Track Documents</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="indexmain.php">
                <div class="sidebar-brand-text mx-3 uia">Role: <?php echo $_SESSION['role_name']?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
                    <span style="color:black">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading" style="color:black">
                Menu
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="indexmain.php">
                    <i class="fas fa-fw fa-chart-area" style="color:black"></i>
                    <span style="color:black">Add Document</span><br>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">View Announcement</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_docs.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">View and Track Documents</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog" style="color:black"></i>
                    <span style="color:black">Generate Report</span>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <form action="report.php" method="post">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <button class="btn collapse-item" type="submit" name="month">Received by this month</button>
                            <button class="btn collapse-item" type="submit" name="year">Received by this year</button>
                            <button class="btn collapse-item" type="submit" name="assignee">Recevied by assignee</button>
                        </div>
                    </form>
                </div>
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
                                <span class="badge badge-danger badge-counter"><?php echo $row?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">

                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>

                                <a class="dropdown-item d-flex align-items-center" href="index.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <?php 
                                            include "C:\\xampp\htdocs\DTS2\includes\connect.php";
                                            $query6 = "SELECT * FROM documents WHERE (doc_responsibility = '".$_SESSION['name']."') AND (doc_status = 'Pending')";
                                            $result6 = mysqli_query($conn,$query6);
                                            echo"<div class='small text-gray-500'> ".date('D\, d-M-Y')."</div>";
                                            echo"<span class='font-weight-bold'>You have ".$row." pending documents </span>";
                                            while ($row6 = mysqli_fetch_array($result6)) {
                                                echo $row6['doc_name']; 
                                                echo "<br>";
                                                echo $row6['doc_comment']; 
                                                echo "<br><br>";
                                            }
                                        ?>
                                    </div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>

                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $count?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Announcement for today
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                    <?php
                                        $today_date1 = date("Y-m-d");

                                        $query3 = "SELECT `date`,`message` FROM announcement";
                                        $result3 = mysqli_query($conn,$query3);
                                        
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            $announcement_date1 = date("Y-m-d",strtotime($row3['date']));
                                            if($today_date1 === $announcement_date1){
                                                echo $today_date1;
                                                echo"<div class='text-truncate'>".$row3['message']."</div><br>";
                                            }

                                            //$date = $row['date'];
                                            //$formatted_date = strtotime($date);

                                            //echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
                                        }
                                    ?>
                                    </div>
                                </a>
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
                            <?php 
                                $doc_id = $_POST['trackBtn'];
                                $doc_name = $_POST['doc_name'];
                            ?>
                            <h6 class="m-0 font-weight-bold text-white">Logs for Document : <?php echo $doc_name ." with ID ".$doc_id; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Log ID</th>
                                            <th>Status</th>
                                            <th>Action to be taken</th>
                                            <th>Document Name</th>
                                            <th>Date and Time Logged</th>
                                            <th>Responsibility</th>
                                            <th>Document Location</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Log ID</th>
                                            <th>Status</th>
                                            <th>Action to be taken</th>
                                            <th>Document Name</th>
                                            <th>Date and Time Logged</th>
                                            <th>Responsibility</th>
                                            <th>Document Location</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php 
                                            include "../../includes/connect.php";

                                            // SQL query to fetch information of registerd users and finds user match.
                                            $currentName  = $_SESSION["name"];
                                            
                                            //$currentDocId = $_SESSION["doc_id"];

                                            //$query = "SELECT * FROM documents WHERE doc_responsibility ='$currentName'";
                                            //$query = "SELECT * FROM logs WHERE doc_id='$currentDocId'";
                                            $query = "SELECT * FROM logs WHERE doc_id = '$doc_id' ORDER BY id DESC";

                                            $result = mysqli_query($conn,$query); 
                                            
                                            while ($row = mysqli_fetch_array($result)) {
                                              
                                                  echo "<tr>";
                                                  echo "<form method='post' target='_blank' action='track.php'>";
                                                  echo "<td >" . $row['id'] . "</td>";
                                                  echo "<td name='doc_status'>" . $row['doc_status'] . "</td>";
                                                  echo "<td name='doc_status'>" . $row['doc_comment'] . "</td>";
                                                  echo "<td name='doc_name'>" . $row['doc_name'] . "</td>";
                                                  echo "<td name='date_logged'>" . $row['date_logged'] . "</td>";
                                                  echo "<td>". $row['doc_responsibility'] ."</td>";
                                                  echo "<td>" . $row['doc_location'] . "</td>";
                                                  //echo "<td><button type='submit' name='save_button' value='".$row['doc_due']."'>Download</button></td>";

                                                    if (filter_var($row['doc_location'], FILTER_VALIDATE_URL) === FALSE) {
                                                        echo"<td><button class='btn btn-danger' name='link_error' value='".$row['doc_location']."'>View</button></td>";
                                                    }
                                                    else{
                                                        echo"<td><a href='".$row['doc_location']."' target='_blank' class='btn btn-primary'>View</a></td>";
                                                    }

                                                  echo "</form>";
                                                  echo "</tr>";

                                            }
                                            mysqli_close($conn); // Closing Connection  
                                        ?>
                                    </tbody>
                                </table>    
                            </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );



        $('#dataTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input class="form-control" type="text" placeholder="Search '+title+'" />' );
     
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );

            if(i===5){
                return false;
            }

        });

            $('#dataTable').DataTable().destroy();
     
            var table = $('#dataTable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
                "order":[[0,"desc"]]
            } );

        } );
    </script>

</body>

</html>