<html>
	<link rel='stylesheet' href='./home_style.css'>
	
	<body>
	<?php
		session_start();
		if($_SESSION['logged']) {
			$id = $_SESSION['id'];
			$firstname = $_SESSION['firstname'];
            $middlename = $_SESSION['middlename'];
            $lastname = $_SESSION['lastname'];
            $user = $_SESSION['username'];
            $birthday = $_SESSION['birthday'];
			$date = date_create($birthday);
            $birthday = date_format($date, "F d, Y");
            $email = $_SESSION['email'];
            $number = $_SESSION['number'];
			$pass = $_SESSION['pass'];
	?>
	<div class='parent'>
		<h1>User Information Form</h1>
		<b>Welcome</b> <?php echo "$firstname $middlename $lastname"; ?><br>
		<b>Birthday:</b> <?php echo $birthday; ?><br>
		<b>Contact Details</b> <br>
		<b>&emsp;Email:</b> <?php echo $email; ?><br>
		<b>&emsp;Contact:</b>  <?php echo $number ?><br>
		<a href='logout.php'>logout</a>

			<form method='post'>
				<div class='reset'>
					RESET PASSWORD <br>
					<label>Enter Current Password:</label> <input type='password' name='old_password'><br>
					<label>Enter New Password:</label> <input type='password' name='new_password'><br>
					<label>Re-Enter New Password:</label> <input type='password' name='cnew_password'><br>
					<input type='submit' name='submit' value='Reset Password'>
				</div>
			</form>
	<?php
		} else {
			header("location: protected.php");
		}

		if(isset($_POST['submit'])) {
			if (!(isset($_POST['old_password']) && $_POST['old_password'] != '')) {
				echo "<script>alert('Please input current password')</script>";
			} elseif (!(isset($_POST['new_password']) && $_POST['new_password'] != '')) {
				echo "<script>alert('Please input new password')</script>";
			} else {
				$old = $_POST['old_password'];
				$new = $_POST['new_password'];
				$confirm = $_POST['cnew_password'];
				if ($old != $pass) {
					echo "<script>alert('Current password is not same with the old password.')</script>";
				} elseif ($new != $confirm) {
					echo "<script>alert('New password and Re-Enter new password should be the same.')</script>";
				} else {
					$conn = new mysqli('localhost', 'root', '', 'app_dev_s3');
					if($conn->connect_error) {
						die('Connection failed: ' . $conn->connect_error);
					}

					$sql = "UPDATE users SET pass = '$new' WHERE id = '$id'";
					if ($conn->query($sql) === TRUE) {
						echo "<script>alert('Password updated successfully')</script>";
						unset($_SESSION['pass']);
						$_SESSION['pass'] = $new;
					} else {
						echo "Error updating record: " . $conn->error;
						// echo "<script>alert('Error updating record')</script>";
					}

					$conn->close();
				}
			}
		}
		?>
	</div>
	
	
	</body>

</html>
