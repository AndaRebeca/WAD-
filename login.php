<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
if(empty(trim($_POST["username"]))){
$username_err = 'Please enter username.';
} else{
$username = trim($_POST["username"]);
}

// Check if password is empty
if(empty(trim($_POST['password']))){
$password_err = 'Please enter your password.';
} else{
$password = trim($_POST['password']);
}

// Validate credentials
if(empty($username_err) && empty($password_err)){
// Prepare a select statement
$sql = "SELECT username, password FROM users WHERE username = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
$param_username = $username;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){                    
// Bind result variables
mysqli_stmt_bind_result($stmt, $username, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
/* Password is correct, so start a new session and
save the username to the session */
session_start();
$_SESSION['username'] = $username;    
$id = $_SESSION['id'];
$sessionUserName = $_SESSION["username"];  
header("location: index.php");
} else{
// Display an error message if password is not valid
$password_err = 'The password you entered was not valid.';
}
}
} else{
// Display an error message if username doesn't exist
$username_err = 'No account found with that username.';
}
} else{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
}
?>

<?php include('template/secondary-header.php'); ?>
	<div class="page-background" id="login-page">
		<div class="login-overlay"></div>
		<div class="login-page-content">
			<div class="inner-login-page-content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
				<h1 class="inner-login-header">Discover our new cooking application</h1>
			</div></div>
		</div>
			</div>
		</div><!-- .login-page-content -->
	</div><!-- #login-page -->
	<div class="account-container">
		<div class="login-wrapper">
			<h2 class="brand-logo">The Magic Pot</h2>
			<?php echo $username; ?>
			<!-- <div class="brand-icon"><div class="icon-cup"></div></div> -->
			<form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="text" placeholder="Username" name="username" class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</div><!-- .form-group -->    
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<input placeholder="Password" type="password" name="password" class="form-control">
					<span class="help-block"><?php echo $password_err; ?></span>
				</div><!-- .form-group -->   
				<div class="form-group">
					<input type="submit" class="btn btn-primary form-submit"  value="Submit">
				</div><!-- .form-group -->   
				<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
			</form><!-- .login-form -->
		</div><!-- .wrapper -->
	</div><!-- .account-container -->
<?php include('template/footer-secondary.php'); ?>    