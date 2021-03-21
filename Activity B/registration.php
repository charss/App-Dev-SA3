<html>
    <head>
        <link rel='stylesheet' href='./reg_style.css'>
    </head>
    <body>
    <form method='post'>
        <div>
            <label>First Name<label><br>
            <input type='text' name='firstname'/><br>
            <label>Middle Name<label><br>
            <input type='text' name='middlename'/><br>
            <label>Last Name<label><br>
            <input type='text' name='lastname'/><br>
            <label>Username<label><br>
            <input type='text' name='username'/><br>
            <label>Password<label><br>
            <input type='text' name='password'/><br>
            <label>Confirm Password<label><br>
            <input type='text' name='c_password'/><br>
            <label>Birthday<label><br>
            <input type='date' name='birthday'/><br>
            <label>Email<label><br>
            <input type='text' name='email'/><br>
            <label>Contact Number<label><br>
            <input type='number' name='number'/><br>
            <input type='submit' name='submit'>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname= $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        
        if($password != $c_password) {
            echo "<script>alert('Password and confirm password are not the same')</script>";
        } else {
            echo "Full Name: $firstname $middlename $lastname<br>";
            echo "Username: $username<br>";
            echo "Password: $password<br>";
            $date = date_create($birthday);
            echo "Birthday: ". date_format($date, "F d, Y") . "<br>";
            echo "Email: $email<br>";
            echo "Contact Number: $number<br>";
        }
    }
    ?>
    </body>
</html>