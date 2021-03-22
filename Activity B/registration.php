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
            <input type='email' name='email'/><br>
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
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $c_password = $_POST['c_password'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        
        if($pass != $c_password) {
            echo "<script>alert('Password and confirm password are not the same')</script>";
        } else {
            $servername = "localhost";
            $username = 'root';
            $password = '';
            $dbname = 'app_dev_s3';

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $sql = "INSERT INTO users(firstname, middlename, lastname, username, pass, birthday, email, contactnum) VALUES ('$firstname', '$middlename', '$lastname', '$user', '$pass', '$birthday', '$email', '$number')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }


    }
    ?>
    </body>
</html>