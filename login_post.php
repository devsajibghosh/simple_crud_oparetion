<?php  

include('./config/database.php');

session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);



if($email && $password){

$select_querys = "SELECT COUNT(*) AS result FROM users WHERE email='$email' AND password='$password' ";

$connect = mysqli_query($database_connect,$select_querys);

if(mysqli_fetch_assoc($connect)['result'] == 1 ){

$select_user = "SELECT * FROM users WHERE email='$email'";
$user_connect = mysqli_query($database_connect,$select_user); 

$user = mysqli_fetch_assoc($user_connect);

$_SESSION['admin_id'] = $user['id'];
$_SESSION['admin_name'] = $user['name'];
$_SESSION['admin_email'] = $user['email'];
$_SESSION['admin_image'] = $user['image'];


header('location: ./dashboard/home.php');


}else{
    $_SESSION['login_error'] = "Kindly registration please*";
    header("location: login.php");
}

}else{
    $_SESSION['login_error'] = "Enter your mail and password*";
    header("location: login.php");
}



?>