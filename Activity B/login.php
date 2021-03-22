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
        <div>
            <label>Username<label><br>
            <input type='text' id='username' name='username'><br>
            <label>Password<label><br>
            <input type='password' id='password' name='password'><br>
            <input type='submit' name='submit'>
        </div>
    </form>
    </body>
</html>