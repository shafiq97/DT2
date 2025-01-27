<?php
    include 'notification.php'; //include notification
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/main.css" rel="stylesheet">

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
    <link href="css/main.css" rel="stylesheet">
</head>

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

                    <form method="POST">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Document Name </th>
                                <th>Document Sender </th>
                                <th>Responsibility </th>
                                <th>Kulliyah </th>
                                <th>Description </th>
                                <th>Year </th>
                                <th>Location </th>
                                <th>Attention </th>
                                <th>Characteristic </th>
                                <th>Status </th>
                                <th>owner </th>
                            </tr>
                            <tr>
                                <td><input type ="text" placeholder ="ID" name="id"></td>
                                <td><input type ="text" placeholder ="Document Name" name="name"></td>
                                <td><input type ="text" placeholder ="Document Sender" name="sender"></td>
                                <td><input type ="text" placeholder ="Responsibility" name="responsibility"></td>
                                <td><input type ="text" placeholder ="Kulliyah" name="kulliyah"></td>
                                <td><input type ="text" placeholder ="Description" name="description"></td>
                                <td><input type ="text" placeholder ="Year" name="year"></td>
                                <td><input type ="text" placeholder ="Location" name="location"></td>
                                <td><input type ="text" placeholder ="Attention" name="attention"></td>
                                <td><input type ="text" placeholder ="Characteristic" name="characteristic"></td>
                                <td><input type ="text" placeholder ="Status" name="status"></td>
                                <td><input type ="text" placeholder ="owner" name="owner"></td>
                            </tr>
                            <tr>
                                <td>
                                     <br><button type="submit"  name ="submit">Search</button>       
                                </td>    
                            </tr>
                        </table>
                    </form>

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
                                            <th>Month</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Month</th>
                                            <th>Count</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php 

                                            include "../../includes/connect.php";


                                            if(isset($_POST['submit'])){
                                                $ID = $_POST['id'];
                                                $Name = $_POST['name'];
                                                $Sender = $_POST['sender'];
                                                $Responsibility = $_POST['responsibility'];
                                                $Kulliyah = $_POST['kulliyah'];
                                                $Description = $_POST['description'];
                                                $Year = $_POST['year'];
                                                $Location = $_POST['location'];
                                                $Attention = $_POST['attention'];
                                                $Characteristic = $_POST['characteristic'];
                                                $Status = $_POST['status'];
                                                $owner = $_POST['owner'];

                                                $stat = "";
                                                echo "id=" . $ID;   

                                                if(!empty($ID)){
                                                    $stat = $stat . " AND id='" . $ID . "'"; 
                                                    
                                                }
                                                if(!empty($Name)){
                                                    $stat = $stat . " AND doc_name='" . $Name . "'";
                                                }
                                                if(!empty($Sender)){
                                                    $stat = $stat . " AND doc_sender='" . $Sender . "'";
                                                }
                                                if(!empty($Responsibility)){
                                                    $stat = $stat . " AND doc_responsibility='" . $Responsibility . "'";
                                                }
                                                if(!empty($Kulliyah)){
                                                    $stat = $stat . " AND doc_kulliyah='" . $Kulliyah . "'";
                                                }
                                                if(!empty($Description)){
                                                    $stat = $stat . " AND doc_description='" . $Description . "'";
                                                }
                                                if(!empty($Year)){
                                                    $stat = $stat . " AND doc_receive='" . $Year . "'";
                                                }
                                                if(!empty($Location)){
                                                    $stat = $stat . " AND doc_location='" . $Location . "'";
                                                }
                                                if(!empty($Attention)){
                                                    $stat = $stat . " AND doc_attention='" . $Attention . "'";
                                                }
                                                if(!empty($Characteristic)){
                                                    $stat = $stat . " AND doc_characteristic='" . $Characteristic . "'";
                                                }
                                                if(!empty($Status)){
                                                    $stat = $stat . " AND doc_status='" . $Status . "'";
                                                }
                                                if(!empty($owner)){
                                                    $stat = $stat . " AND owner='" . $owner . "'";
                                                }


                                                // echo $stat;

                        
                                            }
                                             



                                            $currentMonth = date('m');
                                            $currentYear = date('Y');
                                            $currentName = $_SESSION['name'];

                                            $query = "SELECT * FROM documents WHERE YEAR(doc_receive) = $currentYear";

                                            $months_array = ['January' => "1", 'February' => "2", 'March' => "3", 'April' => "4", 'May' => "5",' June' =>"6" , 'July'=> "7",'August' =>"8", 'September' => "9" ,'October' => "10",
                                            'November' => "11", 'December' =>"12"]; 

                                            foreach($months_array as $month => $month_number){
                                                echo "<tr>";
                                                //echo "<form method='post' target='_blank' action='track.php'>";
                                                echo "<td name=doc_id>" . $month . "</td>";

                                                //echo $query;
                                                //$query = "SELECT COUNT(id) AS MYCOUNT FROM documents WHERE MONTH(doc_receive) = $month_number ";
                                                if(isset($stat)){
                                                    $query = "SELECT COUNT(id) AS MYCOUNT FROM documents WHERE YEAR(doc_receive) = $currentYear AND MONTH(doc_receive) = $month_number" . "$stat" ;
                                                }
                                                else{
                                                    $query = "SELECT COUNT(id) AS MYCOUNT FROM documents WHERE YEAR(doc_receive) = $currentYear AND MONTH(doc_receive) = $month_number";
                                                }
                                                
                                                $result = mysqli_query($conn,$query); 

                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<td name=doc_id>" . $row['MYCOUNT'] . "</td>";
                                                }

                                                echo "</tr>";

                                            }

                                            // echo "<td name='doc_name'>" . $row['doc_name'] . "</td>";
                                            
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

        //filter statistic





        //var tbl = $('#dataTable');
        $(document).ready(function() {
            
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
                "oTableTools": {
                        "aButtons": [
                            {'sExtends':'copy',
                            "oSelectorOpts": { filter: 'applied', order: 'current' },
                            },
                            {'sExtends':'xls',
                            "oSelectorOpts": { filter: 'applied', order: 'current' },
                            },
                            {'sExtends':'print',
                            "oSelectorOpts": { filter: 'applied', order: 'current' },
                            }
                        ]
                },
                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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