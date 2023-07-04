<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="login-box">
		<h2><q> Log in </q></h2>
		<form action="" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required >
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required >
			<input type="submit" name="Login" value="Login">
			<a href="signup.php">Don't have an account? Sign up</a>
		</form>
	</div>
    <?php
    session_start();
    if(isset($_POST['Login']))
    {
        include 'connect.php';
        $email = $_POST['username'];
        $password = $_POST['password'];
        $x = "select * from users where email= '$email' and password= '$password'";
        $x2 = mysqli_query($conn,$x);

        $count = mysqli_num_rows($x2);

        if($count == 1)
        {
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
            header('Location:index.html');
        }
        else
        {
            echo "user name and password are invalid";
        }
    }
    ?>
</body>
</html>