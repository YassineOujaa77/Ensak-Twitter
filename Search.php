<?php 
  
  include("include/profile.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7112e55585.js" crossorigin="anonymous"></script>
<style>
* {box-sizing: border-box;}

body {
  position: relative;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #6EC6C6;
  height: 60px;
  
}
.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}
.img
{
  position: relative;
  left:150px;
  top: 0px;
}
.img:hover
{
  background-color: #6EC6C6;
}
.menu {
            overflow: hidden;
            background-color: #6EC6C6;
            height: 60px;
            position:fixed;
            top : 0;
            width : 100%;
            z-index: 1;
            
            }
            .text-center{
  margin-top : 138px;
}
.cb{
  width : 200px;
  text-align : center;
}
.c {
  margin-left : 24px;
  margin-top : 201px;
  width : 294px;
}
.r{
  width : 344px;
}

</style>
</head>
<body>
<div class="menu">
    <?php include("menu2.php"); ?>                                                                                                                                                                                                                                                                                                                                                                       
  <div class="topnav">
    <a href="<?php echo "maison.php?id_user=$id_user";?>" ><img src="img/logo.png" width="200px" class="img"></a>
    <div class="search-container">
      <form action="Search.php" method="POST">
        <input type="text" placeholder="Search a profil.." name="search" >
        <button type="submit" name="chercher"><i class="fa fa-search"></i></button>
      </form>
    </div>
</div>

    </div> 
<?php
if(isset($_POST['chercher']))
  {
    if(empty($_POST['search'])){
      $_SESSION['ERROR'] = "<div class='page-wrap d-flex flex-row align-items-center'>
       <div class='container'>
           <div class='row justify-content-center'>
               <div class='col-md-12 text-center'>
                   <div class='mb-4 lead'>Veuillez saisir un nom ou prenom</div>
                   <a href='maison.php' class='btn btn-link'>Retour à la page d'acceuil</a>
               </div>
           </div>
       </div>
   </div>";

   echo $_SESSION['ERROR'];
    }else{

   
    $search=$_POST['search'];
    $req="SELECT * FROM `user` WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%'";
    $res=mysqli_query($link,$req) or die("echec");
    if (mysqli_num_rows($res)==0) {
       $_SESSION['ERROR'] = "<div class='page-wrap d-flex flex-row align-items-center'>
       <div class='container'>
           <div class='row justify-content-center'>
               <div class='col-md-12 text-center'>
                   <div class='mb-4 lead'>Personne que vous cherchez n'existe pas .</div>
                   <a href='maison.php' class='btn btn-link'>Retour à la page d'acceuil</a>
               </div>
           </div>
       </div>
   </div>";
   echo $_SESSION['ERROR'];
    }
    else{ ?>
   
    <div class='container'>
      <div class="col-md-3" style="margin-left: 390px;"  id="foll">
                <div class="card c">
                    <div class="card-body cb">
                       <div class="users">
                       <?php   if(mysqli_num_rows($res)>0){
                        while($row = mysqli_fetch_assoc($res) ){
                          if($row['id_user']!=$id_user){

                         
                                ?> 

                         <div class="row r" >
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $row['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <h6> <?php echo '@'.$row['prenom'].' '. $row['nom']; ?> </h6> </div>
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
                            
                            
                            <?php  }else{
                                $_SESSION['ERROR'] = "<div class='page-wrap d-flex flex-row align-items-center'>
                                <div class='container'>
                                    <div class='row justify-content-center'>
                                        <div class='col-md-12 text-center'>
                                            <div class='mb-4 lead'>C'est Toi .</div>
                                            <a href='profile.php?id_user=$id_user' class='btn btn-link'>Voir ton profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            echo $_SESSION['ERROR'];
                            }
                                            }
                                    }
                            ?>

                           
                             
                       </div>
                    </div>
                    
                </div>
            </div>
                                  </div>
                                
<?php 
    }
  }
}

?>


<script src="script2.js"></script>
</body>
</html>



