<?php 

include 'config.php'; /* Call the Libarray and established the connection */

session_start(); /* A session is a way to store information (in variables) to be used across multiple pages  */

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php"); /*The header() function is an inbuilt function in PHP which is used to send a raw HTTP header*/
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']); /* Simply passing the values */

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'"; /* Used database query to select data from the data base table */
	$result = mysqli_query($conn, $sql); /* Call the connection string */
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result); /* Get data from data base and perfrpm the action */
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>"; /* This is used to show output */
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<div class="social-icon">
			<img src="asserts/fb.png"> <!--Pass the location path of icon -->
			<img src="asserts/tw.png">
			<img src="asserts/gp.png">
		</div>

			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p> <!Used inline css-->
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
    
</body>
</html>