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