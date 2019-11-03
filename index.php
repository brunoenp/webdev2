<?php

session_start();

if(!isset($_SESSION['auth_status']))
{
	$_SESSION['auth_status'] = false;
	$_SESSION['user'] = 'guest';
	$_SESSION['privilege'] = '3';

}
	$_SESSION['auth_status'] = true;

?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
</head>
<body>

<form id='login' action='process_login.php' method='post'>
	
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>


<div class='container'>
     <label for='username' >UserName:</label><br/>
     <input type='text' name='username' id='username' value='' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
<button class="button button1" onClick="window.location='main.php';">GUEST ACCESS</button>


</body>
</html>