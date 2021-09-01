<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    
</body>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST['add_doc_cat_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO doc_category (doc_cat_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting category",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_doc_cat.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $doc_cat_name);

            // set parameter
            $doc_cat_name = $_POST['doc_cat_name'];

            $sql = "SELECT doc_cat_name FROM doc_category WHERE doc_cat_name='$doc_cat_name'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>
                    <script>
                        swal({
                            title: "Duplicate Entry Found",
                            icon: "error"
                        }).then(function() {
                            window.location = "add_doc_cat.php";
                        });
                    </script>
                <?php
              } else {
                // execute
                $stmt->execute();
                $stmt->close();
                $conn->close();
                ?>
                    <script>
                        swal({
                            title: "Record inserted",
                            text: "",
                            icon: "success"
                        }).then(function() {
                            window.location = "doc_cat_view.php";
                        });
                    </script>
                <?php
                }
        }
    }

    if (isset($_POST['add_cos_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO centre_of_studies (cos_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting category",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_doc_cat.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $cos_name);

            // set parameter
            $cos_name = $_POST['cos_name'];

            // execute
            $stmt->execute();
            $stmt->close();
            $conn->close();

            ?>
                <script>
                    swal({
                        title: "Record inserted",
                        text: "",
                        icon: "success"
                    }).then(function() {
                        window.location = "indexmain.php";
                    });
                </script>
            <?php
        }
    }

?>
</html>



