<?php
    include "notification.php";
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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
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

        <?php include "sidebar.php"; ?>

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

                                        $query3 = "SELECT `date`,`message` FROM announcement ORDER BY `date` DESC";
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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
                            <div>
                                <h6 class="m-0 font-weight-bold text-white float-left">Report</h6>
                            </div> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Doc ID</th>
                                            <th>Doc Name</th>
                                            <th>Sender</th>
                                            <th>Centre of Studies</th>
                                            <th>Assignee</th>
                                            <th>Status</th>
                                            <th>Received</th>
                                            <th>Due Date</th>
                                            <th>View</th>
                                            <th>Track</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Doc ID</th>
                                            <th>Doc Name</th>
                                            <th>Sender</th>
                                            <th>Centre of Studies</th>
                                            <th>Assignee</th>
                                            <th>Status</th>
                                            <th>Received</th>
                                            <th>Due Date</th>
                                            <th>View</th>
                                            <th>Track</th> 
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php 

                                            include "../../includes/connect.php";

                                            $currentMonth = date('m');
                                            $currentYear = date('Y');
                                            $currentName = $_SESSION['name'];

                                            if(isset($_POST['month'])){
                                                //echo $currentMonth;
                                                echo "Documents received for: " . date('M Y');
                                                $query = "SELECT * FROM documents WHERE MONTH(doc_receive) = $currentMonth";
                                            }
                                            else if(isset($_POST['year'])){
                                                //echo $currentYear;
                                                echo "Documents received for year " . date('Y');
                                                $query = "SELECT * FROM documents WHERE YEAR(doc_receive) = $currentYear";
                                            }
                                            else if(isset($_POST['assignee'])){
                                                $query = "SELECT * FROM documents WHERE doc_responsibility = '$currentName'";
                                            }
                                            else if(isset($_POST['custom'])){
                                                ?> <script> window.location.href = "custom_report.php"; </script> <?php
                                            }
                                            else{
                                                echo "string";
                                            }

                                            // SQL query to fetch information of registerd users and finds user match.
                                            $currentName = $_SESSION["name"];
                                            //$query = "SELECT * FROM documents WHERE doc_responsibility ='$currentName'";
                                            //$query = "SELECT * FROM documents";

                                            $result = mysqli_query($conn,$query); 
                                            echo $conn->error;
                                            
                                            while ($row = mysqli_fetch_array($result)) {

                                                $date = $row['doc_receive'];
                                                $formatted_date = strtotime($date);

                                                $date2 = $row['doc_due'];
                                                $formatted_date2 = strtotime($date2);
                                              
                                                echo "<tr>";
                                                echo "<form method='post' target='_blank' action='track.php'>";
                                                echo "<td name=doc_id>" . $row['id'] . "</td>";
                                                echo "<td name='doc_name'>" . $row['doc_name'] . "</td>";
                                                echo "<td name='doc_sender'>" . $row['doc_sender'] . "</td>";
                                                echo "<td>". $row['doc_kulliyah'] ."</td>";
                                                echo "<td>". $row['doc_responsibility'] ."</td>";
                                                echo "<td>". $row['doc_status'] ."</td>";
                                                echo "<td>" . date("D\, d-M-Y", $formatted_date) . "</td>";
                                                echo "<td>" . date("D\, d-M-Y", $formatted_date2) . "</td>";
                                                //echo "<td><button type='submit' name='save_button' value='".$row['doc_due']."'>Download</button></td>";

                                                if (filter_var($row['doc_location'], FILTER_VALIDATE_URL) === FALSE) {
                                                    echo"<td><button class='btn btn-danger' name='link_error' value='".$row['doc_location']."'>View</button></td>";
                                                }
                                                else{
                                                    echo"<td><a href='".$row['doc_location']."' target='_blank' class='btn btn-primary'>View</a></td>";
                                                }

                                                echo "<td><button class='btn btn-dark' type='submit' name='trackBtn' value='".$row['id']."'>Track</button>
                                                        </td>";

                                                echo "</form>";
                                                echo "</tr>";
                                                
                                                echo"<div id='doc-".$row['id']."' class='modal fade' role='dialog'>
                                                        <div class='modal-dialog'>
                                                            <!-- Modal content-->
                                                            <div class='modal-content'>

                                                                <div class='modal-header'>    
                                                                    <h4 class='modal-title'>Update Document Detail</h4>
                                                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                </div>

                                                                <div class='modal-body'>
                                                                    <form class='form-group' method='post' action='update_doc.php'>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document ID</label>
                                                                            <input readonly class='form-control' name='id' id='doc-".$row['id']."' value='".$row['id']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Name</label>
                                                                            <input class='form-control' id='".$row['doc_name']."' value='".$row['doc_name']."' name='doc_name'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Sender</label>
                                                                            <input name='sender' class='form-control' value='".$row['doc_sender']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Owner</label>";
                                                                            include "C:\\xampp\htdocs\DTS2\includes\connect.php";
                                                                            // SQL query to fetch information of registerd users and finds user match.
                                                                            $query5 = "SELECT * FROM users WHERE role_name = 'owner'";
                                                                            $result5 = mysqli_query($conn,$query5);

                                                                            //echo $conn->error;

                                                                            echo"<select class='form-control' name='owner'>";

                                                                            while ($row5 = mysqli_fetch_array($result5)) 
                                                                            {

                                                                                echo"<option value='".$row5['name']."'> ".$row5['name']."</option>";  
                                                                            }
                                                                            echo"</select>";
                                                                        
                                                                            mysqli_close($conn); // Closing Connection

                                                                        echo"</div>";

                                                                        echo"<div class='px-5 pb-3'>
                                                                            <Label>Responsibility</label>";
                                                                             
                                                                                include "C:\\xampp\htdocs\DTS2\includes\connect.php";

                                                                                // SQL query to fetch information of registerd users and finds user match.
                                                                                $query2 = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin')";
                                                                                $result2 = mysqli_query($conn,$query2);
                                                            
                                                                                if($currentName === $row['doc_responsibility'] || $row['doc_responsibility'] === "")
                                                                                {
                                                                                    echo"<select class='form-control' name='responsibility' id='".$row['id']."x'>";
                                                                                }
                                                                                else
                                                                                {
                                                                                    echo"<select disabled class='form-control' name='responsibility' id='".$row['id']."x'>";
                                                                                }
                                                                                
                                                                                while ($row2 = mysqli_fetch_array($result2)) 
                                                                                {   

                                                                                    echo "<option value='".$row2['name']."'>" .$row2['name'].": ".$row2['role_name']."</option>"; 

                                                                                    $query3 = "SELECT `doc_responsibility` FROM `documents` WHERE `id` ='".$row['id']."'";

                                                                                    if($query3){
                                                                                        $result3 = mysqli_query($conn,$query3);
                                                                                        $row3 = mysqli_fetch_array($result3); 
                                                                                        
                                                                                    }
                                                                                    else{
                                                                                        echo "<option>Failed</option>";
                                                                                    }

                                                                                    $query4 = "SELECT `role_name` FROM `users` WHERE `name` ='".$row3['doc_responsibility']."'";

                                                                                    if($query4){
                                                                                        $result4 = mysqli_query($conn,$query4);
                                                                                        $row4 = mysqli_fetch_array($result4); 
                                                                                        
                                                                                    }
                                                                                    else{
                                                                                        echo "<option>q4 Failed</option>";
                                                                                    }

                                                                                    $role_name = $row4['role_name'];
                                                                                }

                                                                                echo "<option selected value='".$row3['doc_responsibility']."'>".$row3['doc_responsibility']."</option>";
                                                                                //echo "<option selected value='".$row3['doc_responsibility']."'>" .$row3['doc_responsibility']. "</option>";
                                                                                echo"</select>";   
                                                                        echo"</div>

                                                                        <input name='responsibility2' type='hidden' value='".$row['doc_responsibility']."'>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='kulliyah'>Kulliyah</label>
                                                                            <select  name='kulliyah' class='form-control'>
                                                                                <option value='".$row['doc_kulliyah']."'>".$row['doc_kulliyah']."</option>
                                                                                <option value='AIKOL'>Ahmad Ibrahim Kulliyyah of Laws (AIKOL)</option>
                                                <option value='KAHS'>Kulliyyah of Allied Health Sciences (KAHS)</option>
                                                <option value='KAED'>Kulliyyah of Architecture and Environmental Design (KAED)</option>
                                                <option value='KOD'>Kulliyyah of Dentistry (KOD)</option>
                                                <option value='KENMS'>Kulliyyah of Economics and Management Sciences (KENMS)</option>
                                                <option value='KOED'>Kulliyyah of Education (KOED)</option>
                                                <option value='KOE'>Kulliyyah of Engineering (KOE)</option>
                                                <option value='KICT'>Kulliyyah of Information and Communication Technology (KICT)</option>
                                                <option value='KIRKHS'>Kulliyyah of Islamic Revealed Knowledge and Human Sciences (KIRKHS)</option>
                                                <option value='KLM'>Kulliyyah of Languages and Management (KLM)</option>
                                                <option value='KOM'>Kulliyyah of Medicine (KOM)</option>
                                                <option value='KON'>Kulliyyah of Nursing (KON)</option>
                                                <option value='KOP'>Kulliyyah of Pharmacy (KOP)</option>
                                                <option value='KOS'>Kulliyyah of Science (KOS)</option>
                                                <option value='ACADEMY'>Academy of Graduate and Professional Studies (ACADEMY)</option>
                                                <option value='CFS'>Centre for Foundation Studies (CFS)</option>
                                                <option value='CELPAD'>Centre for Languages and Pre-University Academic Development (CELPAD)</option>
                                                <option value='IIiBF'>Institute of Islamic Banking and Finance (IIiBF)</option>
                                                <option value='INHART'>International Institute of Halal Research and Training (INHART)</option>
                                                <option value='ISTAC'>International Institute of Islamic Civilization and Malay World (ISTAC)</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Type</label>
                                                                                <select  name='doc_desc' class='form-control'>
                                                                                    <option selected value='".$row['doc_description']."'>".$row['doc_description']."</option>
                                                                                    <option value='Approval'>Approval</option>
                                                                                    <option value='Report'>Report</option>
                                                                                    <option value='Proposal'>Proposal</option>
                                                                                    <option value='Letter'>Letter</option>
                                                                                    <option value='Other'>Other</option>
                                                                                </select>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Receive On</label>
                                                                            <input name='date_receive' type='datetime-local' class='form-control' value=
                                                                            '".substr_replace($row['doc_receive'], 'T', 10).substr($row['doc_receive'],11)."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Due Date</label>
                                                                            <input name='due_date' type='datetime-local' class='form-control' value=
                                                                            '".substr_replace($row['doc_due'], 'T', 10).substr($row['doc_due'],11)."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Location</label>
                                                                            <input name='location' class='form-control' value='".$row['doc_location']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='doc_attention'>Attention</label>
                                                                            <select class='form-control' name='attention'>
                                                                                <option selected>".$row['doc_attention']."</option>
                                                                                <option>Urgent</option>
                                                                                <option>Not Urgent</option>
                                                                                <option>Others</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='doc_characteristic'>Document Characteristic</label>
                                                                            <select class='form-control' name='characteristic'>
                                                                              <option selected>".$row['doc_characteristic']."</option>
                                                                              <option>Softcopy</option>
                                                                              <option>Hardcopy</option>
                                                                              <option>Others</option>
                                                                            </select>                                       
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Status</label>
                                                                            <input name='status' class='form-control' value='".$row['doc_status']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Comment</label>
                                                                            <input name='comment' class='form-control' value='".$row['doc_comment']."'>
                                                                        </div>

                                                                        <div class='modal-footer'>
                                                                            <button type='submit' class='btn btn-default' name='update_btn' disabled>Update</button>
                                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    

    <script type="text/javascript">

        //var tbl = $('#dataTable');
        $(document).ready(function() {
            
        // Setup - add a text input to each footer cell
            $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );

            $('#dataTable thead tr:eq(0) th').each( function (i){
                if(i>6){
                    $(this).html( '' );
                }

                else{
                    var title = $(this).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Search '+title+'" />' );
                    $( 'input', this ).on( 'keyup change', function (){
                        if ( table.column(i).search() !== this.value ){
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    });
                }
            });   

            $('#dataTable').DataTable().destroy();
     
            var table = $('#dataTable').DataTable({
                initComplete: function (){ 
                    this.api().columns().every( function (i) {
                        if(i<=6){
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                })
                            
                                column.data().unique().sort().each( function ( d, j ) {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                });
                        }
                    });
                }
            });

            $('#dataTable').DataTable().destroy();

            $('#dataTable').DataTable({
                "order": [[ 3, "asc" ]],
                "pageLength": 50,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                        /*customize : function(doc){
                            var colCount = new Array();
                            $(tbl).find('tbody tr:first-child td').each(function(){
                                if($(this).attr('colspan')){
                                    for(var i=1;i<=$(this).attr('colspan');$i++){
                                        colCount.push('*');
                                    }
                                }else{ colCount.push('*'); }
                            });
                            doc.content[1].table.widths = colCount;
                        }*/
                    },

                    {
                        extend: 'csv',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                    },

                    {
                        extend: 'print',
                        exportOptions: {
                            //rows: ':visible',
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ],
                            //columns: ':visible'
                        },
                    },

                    /*{
                        extend: 'colvis',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    }*/
                ],
                responsive: true,
            })
            table.buttons().container().appendTo( '#dataTable_wrapper .col-sm-6:eq(1)' );
        });
    </script>
</body>

</html>