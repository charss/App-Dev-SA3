<html>
    <?php
        session_start();
        if ($_SESSION['logged']) {
            echo "<script>alert('You\'re not supposed to be here. Redirecting you to home page')</script>";
            header("refresh:0.1; url=home.php");
        }
    ?>
    <head>
        <link rel='stylesheet' href='./style.css'>
    </head>
    <body>
    <form action='protected.php' method='post'>
        <div>
            <label>Username<label><br>
            <input type='text' id='username' name='username'><br>
            <input type='password' id='password' name='password'><br>
            <label>Remember me</label><input type='checkbox' name='remember'>
            <input type='submit' name='submit'>
        </div>
    </form>
    <?php
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
            echo "<script>
                  document.getElementById('username').value = '$username';
                  document.getElementById('password').value = '$password';
                  </script>";
        }
    ?>
    
    </body>
</html>