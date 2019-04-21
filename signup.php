<?php

if (isset($_POST['submit'])){
    require('connect.php');
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($uname) || empty($email) || empty($mobile) || empty($password)){
        header("Location:signup.html?signup:success");
        exit();
    }
    else{
        if(!preg_match("/^[a-zA-Z]*$/", $first))
        {
            header("Location:signup.html?signup:name format wrong");
            exit();
        } else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.html?signup:email");
                exit();
            }else{
                if(empty($uid)){
                    $uid = $email;
                }
                $query = "SELECT * FROM users WHERE email='$email' OR userid='$uid'";
                $result = mysqli_query($conn, $query);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck>0){
                    header("Location:signup.html?signup:E-mail or User Id already exists");
                    exit();
                }else{
                    $HashPassword = password_hash($password,PASSWORD_DEFAULT);

                    $query = "INSERT INTO users (username, email, userid, mobile ,pwd) VALUES('$uname','$email','$uid','$mobile','$HashPassword')";
                    mysqli_query($conn, $query);
                    header("Location:signup.html?signup:success");
                }
            }
        }
    }
}else{
    header("Location:signup.html?signup:retry");
}
?>