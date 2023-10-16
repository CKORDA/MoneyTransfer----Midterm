
<!DOCTYPE html>
<html>
<head>
    <title><?="User Dashboard"?></title>
</head>
<?=
require_once('pageStyle.html');
require_once('menu.html');
?>
<body>
	<h1>User Profile</h1>
	<table>
	<h2>Send money to </h2>
	<form method="POST">
	Recipient<br />
	<input type="Recipient name" name="recipient name" required /><br /><a href="recipient.php">
        <img src="your_image.png" alt="Person Silhouette"  width="100" height= "150" >
    </a><br />
	
	Amount to Send<br />
	<input type="$0.00" required /><br /><br />
	They receive<br />
	<input type="0" required /><br /><br />
	
	<button type="submit">Send</button>
</form>
	</table>
	<a href="">
        <img src="money_transfer.avif" alt="Money being tranferred"  >
	
   
</body>
</html>