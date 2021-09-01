<?php 
  session_start(); // Starting Session
  include '../../includes/connect.php';

  if (isset($_POST['doc_cat_view'])) 
  {
    header("Location: doc_cat_view.php");
  } 
  else if (isset($_POST['update_doc_cat']))
  {
    header("Location: update_doc_cat.php");
  }
  else if (isset($_POST['add_cos']))
  {
    header("Location: add_cos.php");
  }

  //update to logs
      $query2 = "INSERT INTO logs 
      (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, owner)
      VALUES (LAST_INSERT_ID(),'$doc_name', '$sender', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '$due_date', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$owner')";
      //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
      if ($conn->query($query2) === TRUE) {
    echo "Updated to logs";
  } else {
    echo "Error updating record: " . $conn->error;
  }
    mysqli_close($conn); // Closing Connection

  echo "<br><a href=../assistant/view_docs.php>View</a>";

?>