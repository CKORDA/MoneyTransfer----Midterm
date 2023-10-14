<?php
require_once('functions.php');
require_once('functions.php');
if(isset($_SESSION['email'])) {
	echo 'You are already signed in, please sign out if you want to create a new account.';
	echo '<form method="POST" action="logout.php">';
	echo '<input type="submit" value="Logout">';
	echo '</form>';
	session_destroy();
	die();
}
?>

<?php
$showForm=true;
if(count($_POST)>0){
	if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
		// Check if the email already exists
		/// YOU CAN DO THIS!
		// process information
		$fp=fopen(__DIR__.'/userData/users.csv.php','a+');
		fputs($fp,$_POST['email'].';'$_POST['email']';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
		fclose($fp);
		echo 'Your account has been created, proceed to the <a href="login.php">Sign in page</a>.';
		$showForm=false;
	}else echo 'Email and password are missing';
}
if($showForm){
?>
<h1><?='Register'?></h1>
<form method="POST">
	<?='Email'?><br />
	<input type="email" name="email" required /><br /><br />
	<?='User Name'?><br />
	<input type="name" name="userName" required /><br /><br />
	<?='Password'?><br />
	<input type="password" name="password" required /><br /><br />
	<button type="submit"><?='Sign up'?></button>
</form>
<form method="POST" action="login.php">
	<button type="link"><?='Login'?></button>
</form>
<?php
} 