<?php
require_once('functions.php');
if(isset($_SESSION['email'])){
	echo 'Already Signed in please go to the <a href="dashboard.php">My Dashboard</a>.';
	echo '<br />';
	echo 'If you wish to logout: <form method="POST" action="logout.php">';
	echo '<input type="submit" value="Logout">';
	echo '</form>';
	session_destroy();
	die();
}
$showForm=true;
if(count($_POST)>0){
	if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
		// process information
		$index=0;
		$fp=fopen(__DIR__.'/userData/users.csv.php','r');
		while(!feof($fp)){
			$line=fgets($fp);
			if(strstr($line,'<?php die() ?>') || strlen($line)<5) continue;
			$index++;
			$line=explode(';',trim($line));
			if($line[0]==$_POST['email'] && password_verify($_POST['password'],$line[1])){
				// Sign the user in
				//1. Save the user's data into the session
				$_SESSION['email']=$_POST['email'];
				$_SESSION['ID']=$index;
				//2. Show a welcome message
				echo 'Successful Login please go to the <a href="dashboard.php">My Dashboard</a>.';$showForm=false;
			}
		}
		fclose($fp);
		// The credentials are wrong
		if($showForm) echo 'Your credentials are wrong';
	}else echo 'Email and password are missing';
}
if($showForm){
?>
<h1>Login</h1>
<form method="POST">
	Email<br />
	<input type="email" name="email" required /><br /><br />
	Password<br />
	<input type="password" name="password" required /><br /><br />
	<button type="submit">Sign in</button>
</form>
<form method="POST" action="registration.php">
	<button type="link">Register</button>
</form>
<?php
} 