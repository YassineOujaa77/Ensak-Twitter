<?php
	
		session_start();

		unset( $_SESSION["genre"]);
		unset( $_SESSION["date"]);
		unset( $_SESSION["inter"]);
		unset( $_SESSION["ph_name"]);
		unset( $_SESSION["description"]);
		unset( $_SESSION["id"]);
		unset( $_SESSION["profile"]);
		unset( $_SESSION["email"]);
		unset( $_SESSION["pass"]);
		unset( $_SESSION["receiver"]);
		

		;
		if (isset($_POST['Login'])) {
			include('include/connexion.php');
			$mail=$_POST['email'];
			$pass=$_POST['password'];

			$req="SELECT id_user,email,mot_de_passe FROM `user` WHERE user.email='$mail' AND user.mot_de_passe='$pass' ";
			
			$res=mysqli_query($link,$req) or die("echec");
			$data=mysqli_fetch_assoc($res);
			if($data!=false) {
					session_start();
					$_SESSION['id']=$data['id_user'];
					 header("location:maison.php?id_profile={$_SESSION['id']}&id_user={$_SESSION['id']}");
			 }else
				{ ?>
					<div class="erreur"> Le mot de passe ou l'email est incorrect </div>
					<?php
				}
				
			}

		
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ENSAK</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.erreur
{
	position: absolute;
	top: 100px;
	left: 550px;
	color: red;
	font-size: 18px;
}
.conteneur{
	height: 420px;
}
	</style>
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	
	<h4>WELCOME <span class="BACK"> BACK :</span></h4>
	
	<form method="POST" action="index.php">
		<input type="email" name="email" placeholder="Email" class="input" required="required"> 
		<img src="img/user.png" class="img_user">
		<input type="password" name="password" placeholder="Password" class="password" required="required"> <br/>
		<img src="img/password.png" class="logo_pass" style="left: -32px;">
		<span class="forgot">Forgot password ? <a href="Forgotpassword.php" class="forgot_pastraitement" >Click Here</a></span> <br/>
		<input type="submit" name="Login" value="login" class="login">
	</form>
	<form method="POST" action="signin.php">
		<input type="submit" name="Signin" value="Sign in" class="signin">
	</form>
	
</div>
</body>
</html>
