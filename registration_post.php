<?php

include('./config/database.php');

session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($name) {

  $_SESSION['old_name'] = "$name";
} else {
  $_SESSION['name_error'] = "name is missing";
  header("location:registration.php");
}

// ! email part start

if ($email) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  } else {
    $_SESSION['email_error'] = "email is not valid";
    header("location:registration.php");
  }
} else {
  $_SESSION['email_error'] = "email is missing";
  header("location:registration.php");
}

// ! email part end


// * password part start


if ($password) {
  if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
  } else {
    $_SESSION['password_error'] = "password required";
    header("location:registration.php");
  }
} else {
  $_SESSION['password_error'] = "password is missing";
  header("location:registration.php");
}

// * password part end



// ! confirm password part start


if ($confirm_password) {
  if ($confirm_password == $password) {
  } else {
    $_SESSION['cn_password_error'] = "password is not match";
    header("location:registration.php");
  }
} else {
  $_SESSION['cn_password_error'] = "password is missing";
  header("location:registration.php");
}





// ! DBS CONNECTED===>>


if ($name && $password && $email) {

  // ! select query by 1 mail

  $select_query = "SELECT COUNT(*) AS email_check FROM users WHERE email = '$email' ";
  $x = mysqli_query($database_connect, $select_query);


  $_SESSION['old_name'] = $name;
  $_SESSION['old_email'] = $email;
  $_SESSION['old_password'] = $password;
  
  header("location: login.php"); 

  if (mysqli_fetch_assoc($x)['email_check'] == 0) {

    $encrypt = md5($password);

    $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encrypt') ";
    mysqli_query($database_connect, $insert_query);

  } else {
    $_SESSION['email_exists'] = "this email already exsitis*";
    header("location:registration.php");
  }
} else {
  $_SESSION['db_error'] = "somethings is worng*";
  header("location:registration.php");
}


?>