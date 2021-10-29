<?php
    require_once("notification.php");
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
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar.php" ?>
                <!-- Begin Page Content -->
                <div class="container-fluid" id="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 blue">
                            <div>
                                <h6 class="m-0 font-weight-bold text-white float-left">Status</h6>
                            </div> 
                        </div>

                        <div class="d-flex justify-content-left">
                            <a href="add_status.php" class="btn btn-primary" style="width: 20%; margin-left: 20px;">Add Status</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>Doc ID</th> -->
                                            <th>Status ID</th>
                                            <th>Status Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Doc ID</th> -->
                                            <th>Status ID</th>
                                            <th>Status Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php 
                                            include '../../includes/connect.php';

                                            $sql = "SELECT * FROM status ORDER BY status_name";

                                            $result = mysqli_query($conn,$sql);
                                            
                                            while ($row = mysqli_fetch_array($result)) {
 
                                                echo "<tr>";
                                                echo "<form method='post' id='myFormID'>";
                                                echo "<input type='hidden' name='status_id' value=".$row['status_id']."> ";
                                                echo "<td>" . $row['status_id'] . "</td>";
                                                echo "<td name='status_name'>" . $row['status_name'] . "</td>";

                                                echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#doc-".$row['status_id']."' type='button' name='save_button' value='".$row['status_id']."'>Edit</button>
                                                        </td>";

                                                echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#doc_dlt-".$row['status_id']."' type='button' name='delete_btn'  value='".$row['status_id']."'>Delete</button>
                                                        </td>";

                                                echo "</form>";
                                                echo "</tr>";
                                                
                                                echo"<div id='doc-".$row['status_id']."' class='modal fade' role='dialog'>
                                                        <div class='modal-dialog'>
                                                            <!-- Modal content-->
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>    
                                                                    <h4 class='modal-title'>Update Status</h4>
                                                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                </div>

                                                                <div class='modal-body'>
                                                                    <form class='form-group' method='post'>
                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Status ID</label>
                                                                            <input readonly class='form-control' name='id' id='doc-".$row['status_id']."' value='".$row['status_id']."'>
                                                                        </div>
                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Status Name Type</label>
                                                                            <input class='form-control' id='".$row['status_name']."' value='".$row['status_name']."' name='status_name' required>
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

                                                    echo"<div id='doc_dlt-".$row['status_id']."' class='modal fade' role='dialog'>
                                                        <div class='modal-dialog'>
                                                            <!-- Modal content-->
                                                            <div class='modal-content'>
                                                                <div class='modal-body'>
                                                                    <form class='form-group' method='post'>
                                                                        <input type='hidden' value='".$row['status_id']."' name='id' >
                                                                        <p> ".$row['status_name']." </p>
                                                                        <div class='modal-footer'>
                                                                            <button type='submit' class='btn btn-danger' name='delete_btn'>Delete</button>
                                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
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

        function deleteDocCategory() {
            event.preventDefault(); // prevent form submit
            var form = $( "#myFormID" ); // storing the form
            swal({
                buttons: {
                    cancel: true,
                    confirm: true,
                },
            }).then((isConfirm) => {
                if (isConfirm) {
                    document.getElementById("myFormID").submit();
                    alert("Confirm");      // submitting the form when user press yes
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    alert("isConfirm is null");
                }
            })
        }

        //var tbl = $('#dataTable');
        $(document).ready(function() {
            
            // Setup - add a text input to each footer cell
            $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );

            $('#dataTable thead tr:eq(0) th').each( function (i){
                if(i>1){
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
                        if(i<=1){
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
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions:{
                            columns: [ 0, 1 ]
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
                            columns: [ 0, 1 ]
                        }
                    },

                    {
                        extend: 'print',
                        exportOptions: {
                            //rows: ':visible',
                            columns: [ 0, 1 ],
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

<?php 
    //session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['update_btn'])) {
        $sql = "UPDATE status SET status_name=? WHERE status_id=?";
        $stmnt = $conn->prepare($sql);
        $stmnt->bind_param('si',$status_name,$id);
        $id = $_POST['id'];
        $status_name = $_POST['status_name'];
        $status = $stmnt->execute();
        if($status === false){
            if (mysqli_errno($conn) == 1062) {
                ?>
                <script>
                    swal({
                        title: "Duplicate entry found",
                        icon: "error"
                    }).then(function() {
                        window.location = "status_view.php";
                    });
                </script>
            <?php
            }
            echo $conn->error;
        }
        else{
            ?>
                <script>
                    swal({
                        title: "Record updated successfully",
                        icon: "success"
                    }).then(function() {
                        window.location = "status_view.php";
                    });
                </script>
            <?php
        }
        mysqli_close($conn); // Closing Connection 
    }
    else if (isset($_POST['delete_btn'])) {
        $sql = "DELETE FROM status WHERE status_id=?";
        $stmnt = $conn->prepare($sql);
        $stmnt->bind_param('i', $id);
        $id = $_POST['id'];
        $status = $stmnt->execute();
        if(empty($id)){
            echo "ID is empty";
        }
        if($status === false){
            echo "Something is wrong";
        }
        else{
            ?>
                <script>
                    swal({
                        title: "Record deleted successfully",
                        icon: "success"
                    }).then(function() {
                        window.location = "status_view.php";
                    });
                </script>
            <?php
        }
        mysqli_close($conn); // Closing Connection 
    }

?>
</body>

</html>