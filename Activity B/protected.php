<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'app_dev_s3';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != '' && $_POST['password'] != '') {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            while($row = $result->fetch_assoc()) {
                if ($pass == $row['pass']) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['middlename'] = $row['middlename'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['username'] = $user;
                    $_SESSION['birthday'] = $row['birthday'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['number'] = $row['contactnum'];
                    $_SESSION['pass'] = $row['pass'];
                    $_SESSION['logged'] = true;
                }
            }

            if (isset($_SESSION['logged'])) {
                header("location: home.php");
            } else {
                echo "<script>alert('Password is incorrect')</script>";
                header("refresh:0.1; url=login.php");
            }
            
        } else {
            echo "<script>alert('Username and password does not exist. Please try again')</script>";
            header("refresh:0.1; url=login.php");
        }
    } else {
        echo "<script>alert('You must login first')</script>";
        header("refresh:0.1; url=login.php");
    }

    $conn->close();
?>
