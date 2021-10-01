<?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    include "notification.php";
    
    //Get last doc id
    $sql = "SELECT id FROM documents ORDER BY id DESC LIMIT 1";
    $stmnt = $conn->prepare($sql);
    $stmnt->execute();
    $result = $stmnt->get_result();
    $doc = $result->fetch_assoc();

    if(empty($doc['id'])){
        $doc['id'] = sprintf('%04d', 1);
    }
    else{
        $doc['id'] = sprintf('%04d', $doc['id']+1);
    }

    // echo $doc['id'];
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
                <form method="post" enctype="multipart/form-data" data-persist="garlic">
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
                                        <!-- Submission to -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="submission">Submission to</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="dcm" 
                                                name="submission_to" 
                                                value="DCM" 
                                                readonly 
                                                autocomplete="off"
                                            >
                                        </div>

                                        <!-- Kulliyyah/Centre/Institute/Office -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="cos">Kulliyyah/Centre/Institute/Office</label>
                                            <select name="kuliyyah" class="form-control" id="cos" required>
                                            <?php
                                                $sql = "SELECT * FROM centre_of_studies";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo "<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['cos_code']."'> ".$row['cos_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <!-- Graduate -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="cos">Level of Studies</label>
                                            <select  name="graduate_type" class="form-control" id="graduate_type" required>
                                            <?php
                                                $sql = "SELECT * FROM graduate";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo "<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['graduate_level_code']."'> ".$row['graduate_level_type']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <!-- Reference Number: Auto Generated -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="reference">Reference Number</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                id="reference" 
                                                name="reference" 
                                                readonly
                                                autocomplete="off"
                                            >
                                        </div>

                                        <!-- Type of meeting -->
                                        <div class="form-group px-5 pt-2">
                                        <label for="meeting_type">Type of meeting</label>
                                            <select  name="meeting_type" class="form-control" id="meeting_type" required>
                                            <?php
                                                $sql = "SELECT * FROM meeting";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo "<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['meeting_id']."'> ".$row['meeting_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <!-- Meeting date -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Meeting Date *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="meeting_date" name="meeting_date" required>
                                        </div>

                                        <!-- Deadline Submission -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="dateline_submission">Deadline of Submission *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="deadline_submission" name="deadline_submission" required>
                                        </div>

                                        <!-- Category Documents -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="category_documents">Category of documents</label>
                                            <select  name="category_documents" class="form-control" required>
                                            <option value=''>Please Select</option>
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
                                        </div>

                                        <!-- Programmes -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="programme">Programmes</label>
                                            <select  name="programme" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM programmes";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo "<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['programme_name'];
                                                    echo "<option value='".$row['programme_name']."'> ".$row['programme_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <small>Programme Name</small>
                                        </div>

                                        <!-- MQA Number -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="mqa">MQA Number *</label>
                                            <input type="text" class="form-control" id="mqa" name="mqa" required autocomplete="off">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_name">Title of Document *</label>
                                            <input type="text" class="form-control" id="doc_name" name="doc_name" required autocomplete="off">
                                        </div>

                                        <!-- Receive from -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="owner">Received from *</label><br>
                                            <?php 
                                                $query = "SELECT * FROM users WHERE role_name = 'owner'";
                                                $result = mysqli_query($conn,$query);
                                                echo"<select class='form-control' name='receive_from' required>";
                                                echo"<option value=''> Please Select</option>";
                                                while ($row = mysqli_fetch_array($result)) 
                                                {
                                                    echo"<option value='".$row['name']."'> ".$row['name']."</option>";  
                                                }
                                                echo"</select>";
                                            ?>
                                        </div>

                                        <!-- Received by -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="responsibility">Received by *</label>
                                            <?php
                                                // SQL query to fetch information of registerd users and finds user match.
                                                $query = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin') AND (role_name != 'owner' || 'Owner')";
                                                $result = mysqli_query($conn,$query);

                                                echo"<select class='form-control' name='receive_by' required>";
                                                echo"<option value=''>Please Select</option>";

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
                                            ?>  
                                            <small>Name -> Role -> Document Count</small>
                                        </div>

                                        <!-- Date receive -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Date Receive *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="date_receive" name="date_receive" required>
                                        </div>

                                        <!-- Assign To -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="owner">Assign to *</label><br>
                                            <?php
                                                $query = "SELECT * FROM users WHERE role_name = 'owner'";
                                                $result = mysqli_query($conn,$query);
                                                echo"<select class='form-control' name='assign_to' required>";
                                                echo"<option value=''>Please Select</option>";
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo"<option value='".$row['name']."'> ".$row['name']."</option>";  
                                                }
                                                echo"</select>";
                                            ?>
                                        </div>

                                        <!-- Date Assigned -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Date Assigned *</label>
                                            <input type="datetime-local" step="1" class="form-control" id="date_assign" name="date_assign" required>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_attention">Attention</label>
                                            <select class="form-control" id="doc_attention" name="doc_attention" required>
                                            <?php
                                                $sql = "SELECT * FROM attention";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo"<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['attention_name'];
                                                    echo "<option value='".$row['attention_name']."'> ".$row['attention_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_characteristic">Document Characteristic</label>
                                            <select class="form-control" id="doc_characteristic" name="doc_characteristic" required>
                                            <?php
                                                $sql = "SELECT * FROM doc_characteristic";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo"<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['doc_characteristic_name'];
                                                    echo "<option value='".$row['doc_characteristic_name']."'> ".$row['doc_characteristic_name']."</option>";
                                                }
                                            ?>
                                            </select>                                       
                                        </div>

                                        <!-- Document Location -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_location">Document Location/Link</label>
                                            <input type="" class="form-control" name="doc_location">
                                        </div>

                                        <!-- Action to be taken -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_comment">Action to be taken</label>
                                            <select class="form-control" id="action" name="action" required>
                                            <?php
                                                $sql = "SELECT * FROM action_to_be_taken";
                                                $stmnt = $conn->prepare($sql);
                                                $stmnt->execute();
                                                $result = $stmnt->get_result();
                                                echo"<option value=''>Please Select</option>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['action_name'];
                                                    echo "<option value='".$row['action_name']."'> ".$row['action_name']."</option>";
                                                }
                                            ?>
                                            </select>                                       
                                        </div>

                                        <!-- Remarks -->
                                        <div class="form-group px-5 pt-2">
                                            <label for="remarks">Remarks</label>
                                            <textarea  class="form-control" name="remarks" rows="4" cols="50"></textarea>
                                        </div>

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
    <script src="../../js/Garlic.js-1.4.2/garlic.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('.selectpicker').selectpicker();

            function uuidv4() {
                return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
                    (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
                );
            }

            $('#graduate_type').change(function(){
                var cos = $('#cos').val() + "/";
                var type = $('#type').val() + "/";
                var running = <?php echo json_encode($doc['id']); ?>;
                $("#reference:text").val(cos+type+running);
            })

            $('#cos').change(function(){
                var cos = $('#cos').val() + "/";
                var type = $('#type').val() + "/";
                var running = <?php echo json_encode($doc['id']); ?>;
                $("#reference:text").val(cos+type+running);
            })

            $(window).bind("load", function() {
                var cos = $('#cos').val() + "/";
                var type = $('#graduate_type').val() + "/";
                var running = <?php echo json_encode($doc['id']); ?>;
                $("#reference:text").val(cos+type+running);
            });

            // window.addEventListener('load', () => {
            //     const now = new Date();
            //     now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            //     document.getElementById('deadline_submission').value = now.toISOString().slice(0, -1);
            //     document.getElementById('meeting_date').value = now.toISOString().slice(0, -1);
            // });
        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <?php

        if (isset($_POST['doc_submit'])) {
            include "../../includes/connect.php";

            $submission_to = $_POST['submission_to'];
            $doc_kulliyah = $_POST['kuliyyah'];
            $graduate_type = $_POST['graduate_type'];
            $reference_number = $_POST['reference'];
            $meeting_type = $_POST['meeting_type'];
            $meeting_date = $_POST['meeting_date'];
            $deadline_submission = $_POST['deadline_submission'];
            $category_document = $_POST['category_documents'];
            $programme = $_POST['programme'];
            $mqa = $_POST['mqa'];
            $doc_name = $_POST['doc_name'];
            $received_from = $_POST['receive_from'];
            $received_by = $_POST['receive_by'];
            $date_receive = $_POST['date_receive'];
            $assign_to = $_POST['assign_to'];
            $date_assign = $_POST['date_assign'];
            $doc_attention = $_POST['doc_attention'];
            $doc_characteristic = $_POST['doc_characteristic'];
            $doc_location = $_POST['doc_location'];
            $action_to_be_taken = $_POST['action'];
            $remarks = $_POST['remarks'];
            $doc_status = "Pending";

            // SQL query to fetch information of registerd users and finds user match.
            $query = "INSERT INTO documents 
            (
                submission_to,
                doc_kulliyah,
                graduate_type,
                reference_number,
                meeting_type,
                meeting_date,
                deadline_submission,
                category_document,
                programme,
                mqa_number,
                doc_name,
                received_from,
                received_by,
                date_receive,
                assign_to,
                date_assign,
                doc_attention,
                doc_characteristic,
                doc_location,
                action_to_be_taken,
                remarks,
                doc_status
            )
            VALUES 
            (
                '$submission_to',
                '$doc_kulliyah',
                '$graduate_type',
                '$reference_number',
                '$meeting_type',
                '$meeting_date',
                '$deadline_submission',
                '$category_document',
                '$programme',
                '$mqa',
                '$doc_name',
                '$received_from',
                '$received_by',
                '$date_receive',
                '$assign_to',
                '$date_assign',
                '$doc_attention',
                '$doc_characteristic',
                '$doc_location',
                '$action_to_be_taken',
                '$remarks',
                '$doc_status'
            )";
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
            // $query2 = "INSERT INTO logs 
            // (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
            // VALUES (LAST_INSERT_ID(),'$doc_name', 'senderUdummy', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '2021-01-04 09:11:51', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
            // $query = "UPDATE users SET role_name='$role' WHERE name='$user'";
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