<?php 
ob_start(); // object start
session_start();
require_once "../includes/config.php";
require_once "../includes/db.php";
$errors = [];

if(isset($_POST))
{
    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['cpassword']);

    //validtion 
    if(empty($firstName)){
        $errors[] = "First Name can't blank";
    }
    if(empty($lastName)){
        $errors[] = "last Name can't blank";
    }
    if(empty($email)){
        $errors[] = "email can't blank";
    }
    if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
           $errors[] = "Invalid email";
    }

    if(empty($password)){
        $errors[] = "Password  can't be  blank";
    }

    if(empty($confirmpassword)){
        $errors[] = "conirm Password  can't be  blank";
    }

    if(!empty($password) && !empty($confirmpassword) && $password != $confirmpassword){
        $errors[] = "Password does't not match";
    }
    // if email already exit in databse
    if(!empty($email))
    {
        $conn = db_conn();
        $sanitizeEmail = mysqli_real_escape_string($conn,$email);
        $emailSql = "SELECT id FROM `users` WHERE  `email` = '{$sanitizeEmail}'";
        $squlRsult = mysqli_query($conn,$emailSql);
        $emailRow = mysqli_num_rows($squlRsult);
        if($emailRow > 0)
        {
            $errors[] = "Email Already Exits!";
        }
        db_close($conn);

    }

    // inserting the data into a database

    if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header('location:'. SITEURL .'signup.php');
    exit();
    }
      $password_hash = password_hash($password,PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users`(first_name,last_name,email,password) VALUES('{$firstName}','{$lastName}'
      ,'{$email}','{$password_hash}')";

      $conn = db_conn();
      if(mysqli_query($conn,$sql))
      {
            db_close($conn);
            $message = " You are Register Successfully";
            $_SESSION['success']=$message;
            header('location:'.SITEURL.'signup.php');
            
      }
}