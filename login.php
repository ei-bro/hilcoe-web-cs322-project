<?php

session_start();

include("connection.php");
include("./functions/functions.php");
include("./functions/encrypt-decrypt.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$email = $_POST['email'];
	$password = $_POST['password'];

	// echo "<pre>";
	// print_r($_POST);
	if (!empty($email) && !empty($password)) {


		// read from database
		$query = "select * from users where email = '$email' limit 1";

		$result = mysqli_query($con, $query);
		if (!$result) {
			die('Query FAILED' . mysqli_error($con));
		}

		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);
				$decryptedPass = decryptthis($user_data["password"], "hilcoe");

				// echo $decryptedPass;

				if ($decryptedPass === $password) {
					$_SESSION['user_id'] = $user_data['user_id'];
					$_SESSION['user_name'] = $user_data['username'];
					if (isset($_SESSION['errMsg'])) {
						unset($_SESSION['errMsg']);
					}
					if (isset($_SESSION['succesMsg'])) {
						unset($_SESSION['succesMsg']);
					}
					header("Location: index.php");
					die;
				} else {
					if (isset($_SESSION['succesMsg'])) {
						unset($_SESSION['succesMsg']);
					}
					$_SESSION['errMsg'] = "please check your Email and Password";
				}
			}
		}
	}
	// 	echo "wrong username or password!";
} else {
	// echo "wrong username or password!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<main>

		<form action="./login.php" method="POST" class="form contact-form">
			<h5>Login</h5>
			<p style="font-size: 18px;color: green; text-align: center;">
				<?php
				if (isset($_SESSION['succesMsg'])) {
					echo $_SESSION['succesMsg'];
				}
				?>
			</p>
			<p style="font-size: 18px;color: red; text-align: center;">
				<?php
				if (isset($_SESSION['errMsg'])) {
					echo $_SESSION["errMsg"];
				}
				?>
			</p>
			<div class="form-row">
				<label for="username" class="form-label">Email</label>
				<input name="email" placeholder="Email" type="text" class="form-input username-input" required />
			</div>
			<div class="form-row">
				<label for="password" class="form-label">password</label>
				<input name="password" placeholder="password" type="password" class="form-input password-input" required />
			</div>
			<div class="text-small form-alert"></div>
			<button type="submit" class="btn btn-block">Login</button>
			<p>Don’t have an account?<a href="./signup.php">Create a new</a></p>
		</form>

	</main>

</body>

</html>