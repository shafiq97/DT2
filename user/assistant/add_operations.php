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
                        window.location = "centre_of_studies_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_programme_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO programmes (programme_name, programme_code) VALUES (?,?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting programme",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_programme.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("ss", $programme_name, $programme_code);

            // set parameter
            $programme_name = $_POST['programme_name'];
            $programme_code = $_POST['programme_code'];

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
                        window.location = "programme_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_graduate_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO graduate (graduate_level_type, graduate_level_code) VALUES (?,?)");

        if($stmt === false){
            
            ?>
                <script>
                    swal({
                        title: "Error inserting graduate type",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_graduate.php";
                    });
                </script>
            <?php
        }
        else{

            $stmt->bind_param("ss", $graduate_level_type, $graduate_level_code);

            // set parameter
            $graduate_level_type = $_POST['graduate_level_type'];
            $graduate_level_code = sprintf('%03d', $_POST['graduate_level_code']);

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
                        window.location = "graduate_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_meeting_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO meeting (meeting_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting meeting",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_meeting.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $meeting_name);

            // set parameter
            $meeting_name = $_POST['meeting_name'];

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
                        window.location = "meeting_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_attention_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO attention (attention_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting attention",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_attention.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $attention_name);

            // set parameter
            $attention_name = $_POST['attention_name'];

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
                        window.location = "attention_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_doc_characteristic_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO doc_characteristic (doc_characteristic_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting document characteristic",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_doc_characteristic.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $doc_characteristic_name);

            // set parameter
            $doc_characteristic_name = $_POST['doc_characteristic_name'];

            // execute
            $stmt->execute();
            echo $conn->error;
            $stmt->close();
            $conn->close();
            ?>
                <script>
                    swal({
                        title: "Record inserted",
                        text: "",
                        icon: "success"
                    }).then(function() {
                        window.location = "doc_characteristic_view.php";
                    });
                </script>
            <?php
        }
    }

    if (isset($_POST['add_action_submit'])) {
        include '../../includes/connect.php';

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO action_to_be_taken (action_name) VALUES (?)");

        if($stmt === false){
            ?>
                <script>
                    swal({
                        title: "Error inserting action",
                        text: "Please contact admin",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_action.php";
                    });
                </script>
            <?php
        }
        else{
            $stmt->bind_param("s", $action_name);

            // set parameter
            $action_name = $_POST['action_name'];

            // execute
            $stmt->execute();
            echo $conn->error;
            $stmt->close();
            $conn->close();
            ?>
                <script>
                    swal({
                        title: "Record inserted",
                        text: "",
                        icon: "success"
                    }).then(function() {
                        window.location = "action_to_be_taken_view.php";
                    });
                </script>
            <?php
        }
    }

?>
</html>



