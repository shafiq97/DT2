<!DOCTYPE html>
<html lang="en">

<?php 



    if(isset($_POST['submit'])){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM documents WHERE CONCAT(id, doc_name, doc_sender, doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_location, doc_attention, doc_characteristic, doc_status, owner) LIKE '%".$valueToSearch."%' ";
        $search_result = filterTable($query);
    }
    else{
        $query = "SELECT * FROM `documents`";
        $search_result = filterTable($query);
    }

    function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "phpmultiuserlogin");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>




<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search</title>
</head>
<body> 
    <form action="report2.php" method="post">
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
                                <td><input type ="text" placeholder ="ID" name="valueToSearch"></td>
                           
                            </tr>
                              
                            <tr>
                                <td>
                                     <br><button type="submit"  name ="submit">Search</button>       
                                </td>    
                            </tr>

                            <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['doc_name'];?></td>
                                    <td><?php echo $row['doc_sender'];?></td>
                                    <td><?php echo $row['doc_responsibility'];?></td>
                                    <td><?php echo $row['doc_kulliyah'];?></td>
                                    <td><?php echo $row['doc_description'];?></td>
                                    <td><?php echo $row['doc_receive'];?></td>
                                    <td><?php echo $row['doc_location'];?></td>
                                    <td><?php echo $row['doc_attention'];?></td>
                                    <td><?php echo $row['doc_characteristic'];?></td>
                                    <td><?php echo $row['doc_status'];?></td>
                                    <td><?php echo $row['owner'];?></td>
                                </tr>
                                <?php endwhile;?>
                        </table>

    </form>
    



</body>
</html>