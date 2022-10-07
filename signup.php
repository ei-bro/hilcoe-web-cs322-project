<?php
session_start();

include("connection.php");
include("./functions/functions.php");
include("./functions/encrypt-decrypt.php");
if (isset($_SESSION['errMsg'])) {
	unset($_SESSION['errMsg']);
}
// $hashed = encryptthis("ibrahim wondimu", "ethiopia");
// echo $hashed . "<br>";

// $decreped = decryptthis($hashed, "ethiopia");

// echo $decreped;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// echo "<pre>";
	// print_r($_POST);
	// something was posted
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	if (!empty($user_name) && !empty($password) && !empty($email)) {


		// read from database
		$querystr = "select * from users where email = '$email' ";

		$resultcout = mysqli_query($con, $querystr);
		if (!$resultcout) {
			die('Query FAILED' . mysqli_error($con));
		}

		if ($resultcout && mysqli_num_rows($resultcout) > 0) {
			$_SESSION["exists"] = "Email already exists";
		} else {

			// //save to database
			$user_id = random_num(20);
			$encrytedPass = encryptthis($password, "hilcoe");
			// $query = "INSERT INTO users (user_id,username,email,passwor) values ('$user_id','$user_name','$email','$encrytedPass')";

			$query = "INSERT INTO users(user_id,username,email,password) ";

			$query .= " VALUES ('$user_id','$user_name','$email','$encrytedPass')";


			$result	= mysqli_query($con, $query);
			if (!$result) {
				die('Query FAILED' . mysqli_error($con));
			} else {
				$_SESSION['succesMsg'] = "Successfully Registered. Please Login";
			}
			if (isset($_SESSION['exists'])) {
				unset($_SESSION['exists']);
			}
			header("Location: login.php");
			die;
		}
	} else {
		echo "Please enter some valid information!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>register</title>
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<main>
		<form action="./signup.php" method="POST" class="form contact-form">

			<h5>Register</h5>
			<p style="font-size: 18px;color: red; text-align: center;">
				<?php
				if (isset($_SESSION['exists'])) {
					echo $_SESSION["exists"];
				}
				?>
			</p>
			<div class="form-row">
				<label for="username" class="form-label">username</label>
				<input id="username" name="username" placeholder="user-name" type="text" class="form-input username-input" required />
			</div>
			<div class="form-row">
				<label for="email" class="form-label">Email</label>
				<input id="email" name="email" placeholder="email" type="email" class="form-input username-input" required />
			</div>
			<div class="form-row">
				<label for="password" class="form-label">password</label>
				<input id="password" name="password" placeholder="password" type="password" class="form-input password-input" required />
			</div>
			<div class="text-small form-alert"></div>
			<button type="submit" class="btn btn-block">Register</button>
			<p>Already have an account?<a href="./login.php">Sign in</a></p>
		</form>
	</main>

</body>

</html>