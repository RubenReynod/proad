<?php
    session_start();
    $_SESSION['AES']='f95EaM10';
    $_SESSION['start'] = 'puerta';
     require_once 'LIGA/LIGA3/LIGA.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Informacion</title>
<link rel="stylesheet" href="../css/style_login.css">
</head>

<body background="../img/header_bg.jpg">
<div class="container center-block quitar-fload espacio-arriba" >
	<section id="content">
        
		<form action="php/validar.php" method="POST">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="user" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div>


</body>

</html>