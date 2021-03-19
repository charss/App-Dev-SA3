<html>
    <head>
        <link rel='stylesheet' href='./style.css'>
    </head>
    <body>
    <form method='post'>
        <div>
            <label>Name<label><br>
            <input type='text' name='name'/><br>
            <label>Breed<label><br>
            <input type='text' name='breed'/><br>
            <label>Age<label><br>
            <input type='text' name='age'/><br>
            <label>Address<label><br>
            <input type='text' name='address'/><br>
            <label>Color<label><br>
            <input type='text' name='color'/><br>
            <label>Height<label><br>
            <input type='text' name='height'/><br>
            <label>Weight<label><br>
            <input type='text' name='weight'/><br>
            <input type='submit' name='submit'>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $color = $_POST['color'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dog_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO dogs (d_name, d_breed, d_age, d_address, d_color, d_height, d_weight)
        VALUES ('$name', '$breed', '$age', '$address', '$color', '$height', '$weight')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
    </body>
</html>