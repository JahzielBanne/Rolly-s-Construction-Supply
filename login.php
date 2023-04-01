<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rolly's Construction Supply</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<div id="login">
    <div class="logo-log">
        <img src="images/logo.png">
    </div>
    <div class="login-block">
	<h3 style="text-align:center; height:70px; margin-top:50px;">PLEASE LOG IN</h3>
	<form method="POST" action="" name="login">
		<input type="email" class="input" required name="useremail" placeholder="Enter E-mail" style="height:50px;"/>
		<input type="password" class="input" required name="password" placeholder="Password" style="height:50px;"/>
		<input type="submit" name="submit" value="Submit"/ style="height:50px; margin-top:20px;">
        </form>
        </div>
</div>
</body>
</html>