<?php 
session_start();

// database connect
include('../config/database.php');

// value insert database with updated btn

if(isset($_POST['service_btn'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $icon = $_POST['icon'];

  if($title && $description && $icon){
    $insert_query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
    mysqli_query($database_connect,$insert_query);  
    
    header('location: service.php');
  }else{
    $_SESSION['services_error'] = "Information Missing";
    header("location: service_insert.php");
  }
}


// Delet btn

if(isset($_GET['delet_id'])){
    $id = $_GET['delet_id'];
    $delet_query = "DELETE FROM services WHERE id='$id'";

    mysqli_query($database_connect,$delet_query);
    $_SESSION['delet_error'] = "Information Deleted Successfully";
    header('location: service.php');
}




// change status


if(isset($_GET['change_status'])){

  $id = $_GET['change_status'];
  $status_query = "SELECT * FROM services WHERE id='$id'";
  $connect = mysqli_query($database_connect,$status_query);

  $service = mysqli_fetch_assoc($connect);

  if($service['status'] == 'active'){

    $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
    mysqli_query($database_connect,$update_query);
    header('location: service.php');
  }else{
    $update_query = "UPDATE services SET status='active' WHERE id='$id'";
    mysqli_query($database_connect,$update_query);
    header('location: service.php');
  }

}


// edit btn

if(isset($_POST['service_edit'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $icon = $_POST['icon'];
  $service_id = $_POST['service_id'];

  if($title && $description && $icon){
    
    $update_query = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$service_id' ";
    mysqli_query($database_connect,$update_query);  

    $_SESSION['update_success'] = "Information Update Successfully";
    header('location: service.php');
  }else{
    $_SESSION['update_success'] = "Information Update Missing";
    header("location: service_edit.php");
  }
}




?>