<?php 
    include('include/profile.inc.php');

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
	<a href="<?php echo "maison.php?id_profile=$id_user&id_user=$id_user"; ?>">
    <img src="img/logo.png" alt="ENSAK" class="logo">
</a>
    
	<div class="conteneur">
	
	<h4>About us</h4> <br>
    <h5>Clicker sur les noms pour acceder à notre github</h5>
	
	<form method="POST" action="">

		<a href="https://github.com/IlhamOukassou"><h1>Ilham oukassou</h1></a> <br>
		<a href="https://github.com/SAAD123333"><h1>Saad Mazouzi</h1> </a><br>
		<a href="https://github.com/YassineOujaa77"><h1>Yassine Oujaa</h1></a> <br>
		
	</form>
	
		<a href="<?php echo "maison.php?id_profile=$id_user&id_user=$id_user"; ?>"><input type="submit" name="Signin" value="Go back " class="signin"></a>
	
	
</div>
</body>
</html>