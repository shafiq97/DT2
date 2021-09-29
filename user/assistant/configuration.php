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
  else if (isset($_POST['centre_of_studies_view']))
  {
    header("Location: centre_of_studies_view.php");
  }
  else if (isset($_POST['programme_view']))
  {
    header("Location: programme_view.php");
  }
  else if (isset($_POST['graduate_view']))
  {
    header("Location: graduate_view.php");
  }
  else if (isset($_POST['meeting_view']))
  {
    header("Location: meeting_view.php");
  }
  else if (isset($_POST['doc_characteristic_view']))
  {
    header("Location: doc_characteristic_view.php");
  }
  else if (isset($_POST['attention_view']))
  {
    header("Location: attention_view.php");
  }

?>