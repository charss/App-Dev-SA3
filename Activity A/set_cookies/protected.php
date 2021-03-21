<?php

    if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != '' && $_POST['password'] != '') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];
        if($remember) {
            echo "<script>alert('OK')</script>";
            setcookie('username', $username, time() + 3600);
            setcookie('password', $password, time() + 3600);
        }
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['logged'] = true;
        header("location: home.php");
    } else {
        echo "<script>alert('You must login first')</script>";
        header("refresh:0.1; url=login.php");
    }
?>
