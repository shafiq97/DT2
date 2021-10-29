<?php
    include "settings.php";

    $name = $_SESSION['name'];

    // $query = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Pending')";
    // $result = mysqli_query($conn,$query);
    // $row = mysqli_num_rows($result);

    // $query3 = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Completed')";
    // $result3 = mysqli_query($conn,$query3);
    // $completed = mysqli_num_rows($result3);

    // $query4 = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Approved')";
    // $result4 = mysqli_query($conn,$query4);
    // $approved = mysqli_num_rows($result4);

    // $month = date('m');
    // $query5 = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (MONTH(doc_receive) ='$month')";
    // $result5 = mysqli_query($conn,$query5);
    // $docMonths = mysqli_num_rows($result5);

    // $query7 = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Rejected')";
    // $result7 = mysqli_query($conn,$query7);
    // $rejected = mysqli_num_rows($result7);

    // $query8 = "SELECT doc_status FROM documents where (doc_responsibility='$name')";
    // $result8 = mysqli_query($conn,$query8);
    // $total_doc = mysqli_num_rows($result8);

    // $query9 = "SELECT doc_status FROM documents where (doc_comment='Reviewed') AND (doc_responsibility='$name')";
    // $result9 = mysqli_query($conn,$query9);
    // $review = mysqli_num_rows($result9);

    // $today_date = date("Y-m-d");

    // $query2 = "SELECT `date`,`message` FROM announcement";
    // $result2 = mysqli_query($conn,$query2);
    // $count = 0;
    
    // while ($row2 = mysqli_fetch_array($result2)) {
    //     $announcement_date = date("Y-m-d",strtotime($row2['date']));
    //     if($today_date === $announcement_date){
    //         $count++;
    //     }
    // }
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"
    >

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    
    <!-- Custom styles for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Assistant Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Submission to DCM -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="dcm.php">
                                            <div class="text-l font-weight-bold text-warning text-uppercase mb-1"> Submission to DCM </div>
                                        </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submission to Senate -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="senate.php">
                                            <div class="text-l font-weight-bold text-danger text-uppercase mb-1"> Submission to Senate</div>
                                        </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submission to MQA - MQA-01 (Self-Accreditation) -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                Submission to MQA - MQA-01 (Self-Accreditation)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submission to MQA - MQA-02 (Self-Accreditation)-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-info text-uppercase mb-1">
                                                Submission to MQA - MQA-02 (Self-Accreditation)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submission to BOG-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-info text-uppercase mb-1">
                                            Submission to BOG</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <!-- Submission to JPT -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2" >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="view_docs.php">
                                                <div class="text-l font-weight-bold text-success text-uppercase mb-1" >
                                                    Submission to JPT
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                   
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-danger text-uppercase mb-1">
                                                Document(s) in Review</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $review ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-warning text-uppercase mb-1">
                                                Today's announcement</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-12">
                        <!-- Collapsable Card Example -->
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header blue" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-white">Your Pending Documents:</h6>
                            </a>
                            <br>
                            <!-- Card Content - Collapse -->
                            <form method="post" class="pl-4 pr-4">
                                <div class="collapse show" id="collapseCardExample">
                                    <table class="table table-bordered hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Doc ID</th>
                                                <th>Doc Name</th>
                                                <th>Sender</th>
                                                <th>Assignee</th>
                                                <th>Status</th>
                                                <th>Received</th>
                                                <th>Due Date</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Track</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Doc ID</th>
                                                <th>Doc Name</th>
                                                <th>Sender</th>
                                                <th>Assignee</th>
                                                <th>Status</th>
                                                <th>Received</th>
                                                <th>Due Date</th>
                                                <th></th>
                                                <th></th>
                                                <th></th> 
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <?php
                                                include '../../includes/connect.php';
                                                $currentName = $_SESSION["name"];
                                                $query = "SELECT * FROM documents WHERE doc_responsibility = '$currentName' and doc_status = 'Pending'";
                                                $result = mysqli_query($conn,$query); 
                                                
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $date = $row['doc_receive'];
                                                    $formatted_date = strtotime($date);
                                                    $date2 = $row['doc_due'];
                                                    $formatted_date2 = strtotime($date2);
                                                  
                                                    echo "<tr>";
                                                    echo "<form method='post' target='_blank' action='track.php' id=track>";
                                                    echo "<input type='hidden' value='".$row['doc_name']."' name='doc_name'>";
                                                    echo "<td name=doc_id>" . $row['id'] . "</td>";
                                                    echo "<td name='doc_name'>" . $row['doc_name'] . "</td>";
                                                    echo "<td name='doc_sender'>" . $row['doc_sender'] . "</td>";
                                                    echo "<td>". $row['doc_responsibility'] ."</td>";
                                                    echo "<td>". $row['doc_comment'] ."</td>";
                                                    echo "<td>" . date("D\, d-M-Y", $formatted_date) . "</td>";
                                                    echo "<td>" . date("D\, d-M-Y", $formatted_date2) . "</td>";
                                                    //echo "<td><button type='submit' name='save_button' value='".$row['doc_due']."'>Download</button></td>";



                                                    if (filter_var($row['doc_location'], FILTER_VALIDATE_URL) === FALSE) {
                                                        echo"<td><button class='btn btn-primary btn-block' form='track' name='link_error' value='".$row['doc_location']."'>View</button></td>";
                                                    }
                                                    else{
                                                        echo"<td><a href='".$row['doc_location']."' target='_blank' class='btn btn-primary btn-block'>View</a></td>";
                                                    }

                                                    echo "<td><button class='btn btn-success btn-block' data-toggle='modal' data-target='#doc-".$row['id']."' type='button' name='save_button' value='".$row['id']."'>Edit</button>
                                                            </td>";

                                                    echo "<td><button class='btn btn-dark btn-block' type='submit' name='trackBtn' form='track' value='".$row['id']."'>Track</button>
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
                                                                        <form class='form-group' method='post'>
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
                                                                                include '../../includes/connect.php';
                                                                                // SQL query to fetch information of registerd users and finds user match.
                                                                                $query5 = "SELECT * FROM users WHERE role_name = 'owner'";
                                                                                $result5 = mysqli_query($conn,$query5);

                                                                                $query7 = "SELECT owner FROM documents WHERE id = '".$row['id']."'";
                                                                                $result7 = mysqli_query($conn,$query7);

                                                                                echo"<select class='form-control' name='owner'>";

                                                                                echo"<option value=''></option>";

                                                                                while($row7 = mysqli_fetch_array($result7)){
                                                                                    echo"<option selected value='".$row7['owner']."'> Current: ".$row7['owner']."</option>";
                                                                                }

                                                                                //echo $conn->error;

                                                                                while ($row5 = mysqli_fetch_array($result5)) 
                                                                                {

                                                                                    echo"<option value='".$row5['name']."'> ".$row5['name']."</option>";  
                                                                                }
                                                                                echo"</select>";
                                                                            
                                                                                mysqli_close($conn); // Closing Connection

                                                                            echo"</div>";

                                                                            echo"<div class='px-5 pb-3'>
                                                                                <Label>Assignee</label>";
                                                                                 
                                                                                    include '../../includes/connect.php';

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
                                                                                <label for='kulliyah'>Centre of Studies</label>

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
                                                    <option value='Others'>Others</option>
                                                    </select>                           
                                                    </div>

                                                                            <div class='px-5 pb-3'>
                                                                                <Label>Document Type</label>
                                                                                    <select  name='doc_desc' class='form-control'>
                                                                                        <option selected value='".$row['doc_description']."'>".$row['doc_description']."</option>
                                                                                        <option value='Proposal for new programme'>Proposal for new programme</option>
                                                                                        <option value='MQA 01 Document'>MQA 01 Document</option>
                                                                                        <option value='MQA 02 Document'>MQA 02 Document</option>
                                                                                        <option value='Curriculum Review Document'>Curriculum Review Document</option>
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
                                                                                  <option selected value='".$row['doc_characteristic']."'>Current: ".$row['doc_characteristic']."</option>
                                                                                  <option value='Sofcopy'>Softcopy</option>
                                                                                  <option value='Hardcopy'>Hardcopy</option>
                                                                                  <option value='Softcopy&Hardcopy'>Softcopy & Hardcopy</option>
                                                                                  <option value='Others'>Others</option>
                                                                                </select>                                       
                                                                            </div>

                                                                            <div class='px-5 pb-3'>
                                                                                <Label>Document Status</label>";

                                                                                echo"<select name='status' class='form-control'>
                                                                                    <option selected>".$row['doc_status']."</option>
                                                                                    <option value='Pending'>Pending</option>
                                                                                    <option value='Completed'>Completed</option>
                                                                                    <option value='Rejected'>Rejected</option>  
                                                                                    <option value='Others'>Others</option> 
                                                                                </select>
                                                                            </div>

                                                                            <div class='px-5 pb-3'>
                                                                                <Label>Action to be taken</label>
                                                                                
                                                                                <select class='form-control' name='comment'>
                                                                                <option selected value='".$row['doc_comment']."'>Current: ".$row['doc_comment']."</option>
                                                                                <option value='Reviewed'>To be reviewed</option>
                                                                                <option value='Return to sender'>Return to sender</option>
                                                                                <option value='Forward to director'>Forward to director</option>
                                                                                <option value='Completed'>Completed</option>
                                                                                <option value='Others'>Others</option>
                                                                                </select>        
                                                                                </div>

                                                                            <div class='modal-footer'>
                                                                                <button type='submit' class='btn btn-default' name='update_btn'>Update</button>
                                                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table> 
                                </div>
                            </form>
                        </div>
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample2" class="d-block card-header py-3 blue" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-white">Announcement History:</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <form method="post" class="pl-4 pr-4 pt-4">
                                <div class="collapse show" id="collapseCardExample2">
                                     <?php 
                                        include '../../includes/connect.php';
                                        $query = "SELECT * FROM announcement ORDER BY `date`";
                                        $result = mysqli_query($conn,$query);
                                    ?>
                                            <table id="announcement_table" class="table table-bordered hover display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $date = $row['date'];
                                                            $formatted_date = strtotime($date);
                                                            echo "
                                                            <tr>
                                                                <td>".date("d-m-Y H:i:s", $formatted_date)."</td>
                                                                <td>".$row['message']."</td>
                                                            </tr>";
                                                            // echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
                                                            // echo "<div class='card-body'>" ."Date: ".date("d-m-Y H:i:s", $formatted_date)."<br>".$row['message']. "</div>";
                                                            // echo "<br>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        mysqli_close($conn);
                                    ?>
                                </div>
                            </form>
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
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script type="text/javascript">

        //var tbl = $('#dataTable');
        $(document).ready(function() {
            
            $('#dataTable').DataTable();
            $('#announcement_table').DataTable();

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
                        if(i<=6 && i!=0 && i!=1){
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
                "pageLength": 10,
                dom: 'lBfrtip',

                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        },
                        customize : function(doc){
                            var colCount = new Array();
                            $(tbl).find('tbody tr:first-child td').each(function(){
                                if($(this).attr('colspan')){
                                    for(var i=1;i<=$(this).attr('colspan');$i++){
                                        colCount.push('*');
                                    }
                                }else{ colCount.push('*'); }
                            });
                            doc.content[1].table.widths = colCount;
                        }
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
                ],
                responsive: true,
                select: true,
            })
            table.buttons().container().appendTo( '#dataTable_wrapper .col-sm-6:eq(1)' );
        });
    </script>

<?php 
    //session_start(); // Starting Session
        $error = ''; // Variable To Store Error Message
        if (isset($_POST['update_btn'])) {
          if (empty($_POST['doc_name'])) {
            $error = "No name entered";
          }
          else{
            include '../../includes/connect.php';
            // Define $username and $password
            $id             = $_POST['id'];
            $sender         = $_POST['sender'];
            $doc_name       = $_POST['doc_name'];

            if(isset($_POST['responsibility']) === FALSE){
              $responsibility = $_POST['responsibility2'];
            }
            else
            {
              $responsibility = $_POST['responsibility'];
            }

            $kulliyah       = $_POST['kulliyah'];
            $description    = $_POST['doc_desc'];
            $date_receive   = $_POST['date_receive'];
            $due_date       = $_POST['due_date'];
            $location       = $_POST['location'];
            $attention      = $_POST['attention'];
            $characteristic = $_POST['characteristic'];
            $status         = $_POST['status'];
            $owner          = $_POST['owner'];

            if($status === 'Rejected' || $status === 'rejected'){
              $responsibility = "owner";
            }
            
            $comment        = $_POST['comment'];

       
            $query = 
            "UPDATE documents 
            SET 
            doc_name           = '$doc_name', 
            doc_sender         = '$sender', 
            doc_responsibility = '$responsibility',
            doc_kulliyah       = '$kulliyah',
            doc_description    = '$description',
            doc_receive        = '$date_receive',
            doc_due            = '$due_date',
            doc_location       = '$location',
            doc_attention      = '$attention',
            doc_characteristic = '$characteristic',
            doc_status         = '$status',
            doc_comment        = '$comment',
            owner              = '$owner'       
            WHERE id='$id'";

            if ($conn->query($query) === TRUE) {
                  //echo "Record updated successfully to ";
            } 
            else {
                  echo "Error updating record: " . $conn->error;
            }

            $query2 = "INSERT INTO logs 
            (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
            VALUES ('$id','$doc_name', '$sender', '$responsibility', '$kulliyah', '$description', '$date_receive', '$due_date', '$location', '$attention', '$characteristic', '$status', '$comment', '$owner')";

            //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
            if ($conn->query($query2) === TRUE) {
              //echo "Updated to logs";
              echo("<meta http-equiv='refresh' content='1'>");
            } else {
              echo "Error updating record: " . $conn->error;
            }
                mysqli_close($conn); // Closing Connection
              }
            } 

        //echo "<br><a href=../assistant/view_docs.php>View</a>";
?>
</body>
</html>