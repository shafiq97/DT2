<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include '../../includes/connect.php';
    //echo $_SESSION['name'];
    $name = $_SESSION['name'];

    $query = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Pending')";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    mysqli_free_result($result);
    //echo $row;

    $today_date = date("Y-m-d");

    $query2 = "SELECT `date`,`message` FROM announcement";
    $result2 = mysqli_query($conn,$query2);
    $count = 0;
    
    while ($row2 = mysqli_fetch_array($result2)) {
        $announcement_date = date("Y-m-d",strtotime($row2['date']));
        if($today_date === $announcement_date){
            $count++;
            //echo $today_date ." ". $announcement_date;
            //echo $row2['message'];
        }
        //$date = $row['date'];
        //$formatted_date = strtotime($date);
        //echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
        <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light black topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
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
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $count ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Announcement for today
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="announcement.php">
                                    <div class="font-weight-bold">
                                    <?php
                                        $today_date1 = date("Y-m-d");

                                        $query3 = "SELECT `date`,`message` FROM announcement ORDER BY `date` DESC";
                                        $result3 = mysqli_query($conn,$query3);
                                        
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            $announcement_date1 = date("Y-m-d",strtotime($row3['date']));
                                            if($today_date1 === $announcement_date1){
                                                echo date("D\, d-M-Y", strtotime($today_date1));
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
                <form method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Collapsable Card Example -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3 black" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="font-weight-bold text-white px-4">Add Document:<span> * Required Fill </span></h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    
                                    <div class="collapse show" id="collapseCardExample">

                                        <div class="form-group px-5 pt-2">
                                            <label for="recipient-name">Centre of Studies</label>
                                            <select  name="kuliyyah" class="form-control">
                                                <option value="AIKOL">Ahmad Ibrahim Kulliyyah of Laws (AIKOL)</option>
                                                <option value="KAHS">Kulliyyah of Allied Health Sciences (KAHS)</option>
                                                <option value="KAED">Kulliyyah of Architecture and Environmental Design (KAED)</option>
                                                <option value="KOD">Kulliyyah of Dentistry (KOD)</option>
                                                <option value="KENMS">Kulliyyah of Economics and Management Sciences (KENMS)</option>
                                                <option value="KOED">Kulliyyah of Education (KOED)</option>
                                                <option value="KOE">Kulliyyah of Engineering (KOE)</option>
                                                <option value="KICT">Kulliyyah of Information and Communication Technology (KICT)</option>
                                                <option value="KIRKHS">Kulliyyah of Islamic Revealed Knowledge and Human Sciences (KIRKHS)</option>
                                                <option value="KLM">Kulliyyah of Languages and Management (KLM)</option>
                                                <option value="KOM">Kulliyyah of Medicine (KOM)</option>
                                                <option value="KON">Kulliyyah of Nursing (KON)</option>
                                                <option value="KOP">Kulliyyah of Pharmacy (KOP)</option>
                                                <option value="KOS">Kulliyyah of Science (KOS)</option>
                                                <option value="ACADEMY">Academy of Graduate and Professional Studies (ACADEMY)</option>
                                                <option value="CFS">Centre for Foundation Studies (CFS)</option>
                                                <option value="CELPAD">Centre for Languages and Pre-University Academic Development (CELPAD)</option>
                                                <option value="IIiBF">Institute of Islamic Banking and Finance (IIiBF)</option>
                                                <option value="INHART">International Institute of Halal Research and Training (INHART)</option>
                                                <option value="ISTAC">International Institute of Islamic Civilization and Malay World (ISTAC)</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_desc">Category of documents</label>
                                            <select  name="doc_desc" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM doc_category";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['doc_cat_name'];
                                                    echo "<option value='".$row['doc_cat_name']."'> ".$row['doc_cat_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <!--<input type="" class="form-control" id="doc_desc" name="doc_desc">-->
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="programme">Programmme</label>
                                            <select  name="programme" class="form-control">
                                                <option value="Proposal for new programme">Proposal for new programme</option>
                                                <option value="MQA 01 Document">MQA 01 Document</option>
                                                <option value="MQA 02 Document">MQA 02 Document</option>
                                                <option value="Curriculum Review Document">Curriculum Review Document</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <!--<input type="" class="form-control" id="doc_desc" name="doc_desc">-->
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_name">Document Name *</label>
                                            <input type="" class="form-control" id="doc_name" name="doc_name" required autocomplete="off">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="sender">Sender</label>
                                            <input type="" class="form-control" id="sender" name="sender">

                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="owner">Owner *</label><br>
                                            
                                            <!--<input type="" class="form-control" id="owner" name="owner" required>-->
                                            <?php 
                                                // include "C:\\xampp\htdocs\DTS2\includes\connect.php";

                                                // SQL query to fetch information of registerd users and finds user match.
                                                $query = "SELECT * FROM users WHERE role_name = 'owner'";
                                                $result = mysqli_query($conn,$query);

                                                //echo $conn->error;

                                                echo"<select class='form-control' name='owner'>";
                                                echo"<option value=''>";

                                                while ($row = mysqli_fetch_array($result)) 
                                                {

                                                    echo"<option value='".$row['name']."'> ".$row['name']."</option>";  
                                                }
                                                echo"</select>";
                                            
                                                // mysqli_close($conn); // Closing Connection
                                            ?>
                                            <small>Owner must create an account to be listed here</small>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="responsibility">Assignee</label>

                                            <?php
                                                // SQL query to fetch information of registerd users and finds user match.
                                                $query = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin') AND (role_name != 'owner' || 'Owner')";
                                                $result = mysqli_query($conn,$query);

                                                echo"<select class='form-control' name='responsibility'>";
                                                echo"<option value=''></option>";

                                                while ($row = mysqli_fetch_array($result)) 
                                                {
                                                    $name = $row['name'];

                                                    $query4 = "SELECT users.`name`, documents.`doc_responsibility` from users INNER JOIN documents WHERE (users.`name` = '$name') AND (documents.`doc_responsibility` = '$name')";

                                                    $result4 = mysqli_query($conn,$query4);
                                                    $count = mysqli_num_rows($result4);

                                                    echo"<option value='".$row['name']."'>" .$row['name']."-> ".$row['role_name']."-> $count</option>"; 
                                                    $count = 0;
                                                }
                                                echo"</select>";

                                            ?>  <small>Name -> Role -> Document Count</small>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Receive on *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="receive_date" name="receive_date" required>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="due_date">Due date</label>
                                            <input type="datetime-local" step="1"  class="form-control" id="due_date" name="due_date" required>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_attention">Attention</label>
                                            <select class="form-control" id="doc_attention" name="doc_attention">
                                              <option>Urgent</option>
                                              <option>Not Urgent</option>
                                              <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_characteristic">Document Characteristic</label>
                                            <select class="form-control" id="doc_characteristic" name="doc_characteristic">
                                              <option>Softcopy</option>
                                              <option>Hardcopy</option>
                                              <option>Softcopy and Hardcopy</option>
                                              <option>Others</option>
                                            </select>                                       
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_location">Document Location/Link</label>
                                            <input type="" class="form-control" name="doc_location">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_comment">Action to be taken</label>
                                            <!--<input type="" class="form-control" id="doc_comment" name="doc_comment">-->
                                            <select class="form-control" id="doc_comment" name="doc_comment">
                                              <option>To be reviewed</option>
                                              <option>Forward to director</option>
                                              <option>Return to sender</option>
                                              <option>Completed</option>
                                            </select>
                                        </div>

                                        <!--<div class="form-group px-5 pt-2">
                                            <input type="file" id="file" name="file">
                                        </div>-->

                                        <div class="form-group px-5 pt-2">
                                            <button type="submit" class="btn uia" style="color:white" value="Submit" name="doc_submit">Submit</button>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.container-fluid -->
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


    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <?php 
        //session_start(); // Starting Session

        if (isset($_POST['doc_submit'])) {
            include "C:\\xampp\htdocs\DTS2\includes\connect.php";

            // Get all data from form
            $doc_name = $_POST['doc_name'];
            $sender = $_POST['sender'];
            $responsibility = $_POST['responsibility'];
            $kulliyah = $_POST['kuliyyah'];
            $doc_desc = $_POST['doc_desc'];
            $receive_date = $_POST['receive_date'];
            $due_date = $_POST['due_date'];
            $doc_location = $_POST['doc_location'];
            $doc_attention = $_POST['doc_attention'];
            $doc_characteristic = $_POST['doc_characteristic'];
            $doc_status = "Pending";
            $doc_comment = $_POST['doc_comment'];
            $owner = $_POST['owner'];

            //file handling
            /*$pdfname = $doc_name.".pdf";  
            $temp_name  = $_FILES['file']['tmp_name'];
            echo $pdfname;

            if(isset($pdfname) and !empty($pdfname)){
                $location = "C:\\xampp\htdocs\DTS\pdf\\";      
                if(move_uploaded_file($temp_name, $location.$pdfname)){
                    echo 'File uploaded successfully';
                }
            } else {
                echo 'You should select a file to upload !!';
            }*/

            //echo $doc_name." ".$sender." ".$responsibility." ".$kuliyyah." ".$doc_desc." ".$receive_date . " " . $due_date;
            //echo $doc_location." ".$doc_attention." ".$doc_characteristic." ".$doc_status." ".$doc_comment;

            // SQL query to fetch information of registerd users and finds user match.
            $query = "INSERT INTO documents 
            (doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
            VALUES ('$doc_name', '$sender', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '$due_date', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
            //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
            if ($conn->query($query) === TRUE) {
                echo "<script>alert('Document recorded successfully,')</script> ";
            } else {
              echo "Error updating record: " . $conn->error;
            }

            //update to logs
                    $query2 = "INSERT INTO logs 
            (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
            VALUES (LAST_INSERT_ID(),'$doc_name', '$sender', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '$due_date', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
            //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
            if ($conn->query($query2) === TRUE) {
              echo "<script>alert('Updated to logs')</script> ";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            mysqli_close($conn); // Closing Connection
        } 

        

    ?>

</body>

</html>