<?php

session_start();
include('../config/database.php');




// * update name and sql query======>>>


if (isset($_POST['update_btn'])) {
    $name = $_POST['name'];
    if ($name) {
        $user_id = $_SESSION['admin_id'];
        $update_name_query = "UPDATE users SET name='$name' WHERE id='$user_id'";
        mysqli_query($database_connect, $update_name_query);
        $_SESSION['admin_name'] = "$name";
        $_SESSION['name_errors'] = "Name Updated Sucessfully";
        header("location: profile.php");
    }else{
        $_SESSION['name_errors'] = "Enter Your Name";
        header("location: profile.php");
    }
}






// !update email query

if (isset($_POST['update_email'])) {
    $email = $_POST['email'];
    if ($email) {
        $user_id = $_SESSION['admin_id'];
        $update_email_query = "UPDATE users SET email='$email' WHERE id='$user_id'";
        mysqli_query($database_connect, $update_email_query);
        $_SESSION['admin_email'] = "$email";

        $_SESSION['email_errors'] = "Email Updated Sucessfully";
        header("location: profile.php");
    }else{
        $_SESSION['email_errors'] = "Enter Your Email";
        header("location: profile.php");
    }
}




//?   update password

if (isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['admin_id'];

    if ($current_password) {
        $encrypt = md5($current_password);
        $select_pass_query = "SELECT COUNT(*) AS pass_check FROM users WHERE id='$user_id' AND password='$encrypt'";

        $connect = mysqli_query($database_connect, $select_pass_query);

        if (mysqli_fetch_assoc($connect)['pass_check'] == 1) {
            if ($new_password) {
                if ($confirm_password) {
                    if ($confirm_password == $new_password) {
                        $new_encrypt = md5($new_password);
                        $update_query = "UPDATE users SET password='$new_encrypt' WHERE id='$user_id'";
                        mysqli_query($database_connect, $update_query);
                        $_SESSION['password_errors'] = "Password updated successfully";
                        header("location: profile.php");
                    } else {
                        $_SESSION['password_errors'] = "New password and confirm password do not match.";
                        header("location: profile.php");
                    }
                } else {
                    $_SESSION['password_errors'] = "Please enter confirm password";
                    header("location: profile.php");
                }
            } else {
                $_SESSION['password_errors'] = "Please enter new password";
                header("location: profile.php");
            }
        } else {
            $_SESSION['password_errors'] = "Incorrect current password";
            header("location: profile.php");
        }
    } else {
        $_SESSION['password_errors'] = "Please enter current password";
        header("location: profile.php");
    }
}




//! image update start


if (isset($_POST['update_image'])) {

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);

    $user_id = $_SESSION['admin_id'];
    $admin_name = $_SESSION['admin_name'];

    // Concat
    $new_name = $user_id . "-" . $admin_name . "-" . date('d-m-Y') . "." . $extension;

    $local_path = "../images/profile/" . $new_name;

    if (move_uploaded_file($tmp_name, $local_path)) {
        $update_query = "UPDATE users SET image='$new_name' WHERE id='$user_id'";
        mysqli_query($database_connect, $update_query);
        $_SESSION['admin_image'] = $new_name;

        $_SESSION['image_errors'] = "Image Updated Successfully";
        header("location: profile.php");
    } else {
        $_SESSION['image_errors'] = "Please Select Your Image";
        header("location: profile.php");
    }
}

// *image update end












?>