<html>
    <?php
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            echo "<script>alert('You\'re not supposed to be here. Redirecting you to home page')</script>";
            header("refresh:0.1; url=home.php");
        }
    ?>
    <head>
        <link rel='stylesheet' href='./style.css'>
    </head>
    <body>
    
        <form action='protected.php' method='post'>
            <div class='login_div'>
                <h1 class='header'>Sign In</h1>
                <input class='login_input' type='text' id='username' name='username' placeholder='username'><br>
                <input class='login_input' type='password' id='password' name='password' placeholder='password'><br>
                <a class='register' href='registration.php'>Register</a>
                <input class='submit' type='submit' name='submit'>
            </div>
        </form>
    </body>
</html>