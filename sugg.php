<?php 

 include("include/profile.inc.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Follow</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7112e55585.js" crossorigin="anonymous"></script>
	<style type="text/css">

		  .up 
    {
        border:none;
       border-radius: 20px;
        margin-left: 50px;
        background-color: white;
        height: 30px;
        margin-left: 360px;
        margin-top: -50px;
        width: 70px;
        font-size: 18px;
    }
    .down
    {
        border:none;
        background-color: #09BC8A;
        color: white;
        height: 30px;
        width: 90px;
         border-radius: 20px;
        margin-left: 50px;
         font-size: 18px;
           margin-left: 360px;
        margin-top: -50px;
    }
     .conteneur{
           height: 640px;
           padding-top: 55px;
           width: 480px;
       }
       .row
       {
       	padding-top: 0px;
       	margin-top: -70px;
       	margin-left: -120px;
       }
       .nom
       {
       	font-size: 20px;
       	position: relative;
       	top: 60px;
       }
       .Suivant
       {
       	margin-left: 250px;
       }
       .rounded-circle
       {
       	position: relative;
       	top: 130px;
       	left: -90px;
       }
	</style>
</head>
<body>
<?php 
   
    
	$c="SELECT * FROM `user` WHERE intersts LIKE '%{$_SESSION['inter'][0]}%' AND id_user!={$_SESSION['id']} LIMIT 4 ";
	$rs=mysqli_query($link,$c);
	?> <div class="conteneur"> <?php
	while ($row=mysqli_fetch_assoc($rs)) { ?>
		  <div class="row" >
                                <div class="mr-2">
                                   <img class="rounded-circle" width="45" src="img/<?php echo $row['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <h6 class="nom" style="width: 195px;padding-left: 0px;margin-left: 7px;left: 210px;"> <?php echo $row['prenom'].$row['nom']; ?> </h6> </div>
                                <?php ?>
                                <div class="col-md-4">
                                <input type="submit" formmethod="post" name="follow" 
                                    <?php if(get_follows($link,$id_user,$row['id_user'])==true) :?>
                                        class="down follow"  value ="following" 
                                    <?php else :   ?>
                                        class="up follow"   value ="follow"
                                    <?php endif ?>
                                    data-content="<?php echo $row['id_user']?>"
                                >
                                
                                </div>
                            </div> <br> <br>
                            
                            
                            <?php 
                                            }
	
?> 
<form method="POST" action="index.php" >
	<input type="submit" name="Suivant" value="NEXT" class="Suivant" style="margin-top: 0px;">
</form></div>
<script src="script2.js"></script>
</body>
</html>