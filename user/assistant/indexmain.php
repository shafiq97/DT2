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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar.php"; ?>
                <!-- Begin Page Content -->
                <form method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Collapsable Card Example -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3 blue" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="font-weight-bold text-white px-4">Add Document:<span> * Required Fill </span></h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    
                                    <div class="collapse show" id="collapseCardExample">

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_name">Reference Number</label>
                                            <input type="text" class="form-control" id="doc_name" name="doc_name" required autocomplete="off">
                                        </div>
                                        <div class="form-group px-5 pt-2">
                                            <label for="cos">Kulliyyah/Centre/Institute (K/C/I)</label>
                                            <select  name="kuliyyah" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM centre_of_studies";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['cos_name'];
                                                    echo "<option value='".$row['cos_name']."'> ".$row['cos_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <!--<input type="" class="form-control" id="doc_desc" name="doc_desc">-->
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_attention">Type of meeting</label>
                                            <select class="form-control" id="doc_attention" name="doc_attention">
                                              <option>Meeting 1</option>
                                              <option>Meeting 2</option>
                                              <option>Meeting 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Meeting Date *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="receive_date" name="receive_date" required>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Dateline of Submission *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="receive_date" name="receive_date" required>
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
                                            <label for="programme">Programmes</label>
                                            <select  name="programme" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM programmes";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['programme_name'];
                                                    echo "<option value='".$row['programme_name']."'> ".$row['programme_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <small>Programme Name</small>
                                            <!--<input type="" class="form-control" id="doc_desc" name="doc_desc">-->
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="mqa">MQA Number *</label>
                                            <input type="text" class="form-control" id="mqa" name="mqa" required autocomplete="off">

                                            <!--<input type="" class="form-control" id="doc_desc" name="doc_desc">-->
                                        </div>

                                        <!-- <div class="form-group px-5 pt-2">
                                            <label for="programme">Programmme</label>
                                            <select  name="programme" class="form-control">
                                                <option value="Proposal for new programme">Proposal for new programme</option>
                                                <option value="MQA 01 Document">MQA 01 Document</option>
                                                <option value="MQA 02 Document">MQA 02 Document</option>
                                                <option value="Curriculum Review Document">Curriculum Review Document</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <input type="" class="form-control" id="doc_desc" name="doc_desc">
                                        </div> -->

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_name">Title of Document *</label>
                                            <input type="text" class="form-control" id="doc_name" name="doc_name" required autocomplete="off">
                                        </div>

                                        <!-- <div class="form-group px-5 pt-2">
                                            <label for="sender">Sender</label>
                                            <input type="" class="form-control" id="sender" name="sender">

                                        </div> -->

                                        <div class="form-group px-5 pt-2">
                                            <label for="owner">Received from *</label><br>
                                            
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
                                            <!-- <small>Owner must create an account to be listed here</small> -->
                                        </div>


                                        <div class="form-group px-5 pt-2">
                                            <label for="responsibility">Received by *</label>

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
                                            <label for="receive_date">Date Receive *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="receive_date" name="receive_date" required>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="owner">Assign to *</label><br>
                                            
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
                                            <!-- <small>Owner must create an account to be listed here</small> -->
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Date Assigned *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="date_assigned" name="date_assigned" required>
                                        </div>

                                        <!--  <div class="form-group px-5 pt-2">
                                            <label for="due_date">Due date</label>
                                            <input type="datetime-local" step="1"  class="form-control" id="due_date" name="due_date" required>
                                        </div> -->

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

                                        <div class="form-group px-5 pt-2">
                                            <label for="remarks">Remarks</label>
                                            <textarea  class="form-control" name="remarks" rows="4" cols="50"></textarea>
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
            include "../../includes/connect.php";

            $doc_name = $_POST['doc_name'];
            $responsibility = $_POST['responsibility'];
            $kulliyah = $_POST['kuliyyah'];
            $doc_desc = $_POST['doc_desc'];
            $receive_date = $_POST['receive_date'];
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
            VALUES ('$doc_name', 'sender_dummy', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '2021-01-04 09:11:51', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
            //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
            if ($conn->query($query) === TRUE) {
                // echo "<script>alert('Document recorded successfully,')</script> ";
                ?>
                    <script>
                        swal({
                            title: "Document inserted",
                            text: "",
                            icon: "success"
                        }).then(function() {
                            window.location = "view_docs.php";
                        });
                    </script>
                <?php
            } else {
              echo "Error updating record: " . $conn->error;
            }

            //update to logs
            $query2 = "INSERT INTO logs 
            (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
            VALUES (LAST_INSERT_ID(),'$doc_name', 'senderUdummy', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '2021-01-04 09:11:51', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
            //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
            // if ($conn->query($query2) === TRUE) {
            //   echo "<script>alert('Updated to logs')</script> ";
            // } else {
            //   echo "Error updating record: " . $conn->error;
            // }
            mysqli_close($conn); // Closing Connection
        }
    ?>

</body>

</html>