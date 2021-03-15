

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Liste of following And followers</title>
    <style>
        body{
            height : 1000px;
        }
        .container{
            margin-left : 237px;
            width : 70%;
            border-right : solid 1.5px;
            border-left : solid 1.5px;
            position : static;
            top : 60px;
            
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
        .main{
          padding-top : 60px;
          position : relative;
        }
        .title{
            background-color : white;
            border : solid 1px;
            position : fixed;
            z-index : 10;
            margin-left : -15px;
            width : 100%;
           
        }
        .following{
            
            width : 35%;
        }
        .followers{
            
            width : 35%;

        }
       
        .col-md-8 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 100%;
            margin-top : 48px;
            position : absolute ;
            top: 0 ;
            left: 30%;
        }
        
    </style>
</head>
<body>
    <div class="menu">
    <?php include("Search.php");
     ?>
     <?php 
    
    
    $sql = "SELECT user.id_user ,user.nom , user.prenom ,user.photo FROM followers JOIN user ON user.id_user=followers.id_follower  AND followers.id_user=$id_user";
    $sql2 = "SELECT user.id_user ,user.nom , user.prenom ,user.photo FROM followers JOIN user ON user.id_user=followers.id_user  AND id_follower=$id_user";
    $res = mysqli_query($link,$sql) or die(mysqli_error($link));
    $res2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
   
   

?>
    </div>
  
    <div class="main">
        <div class="container">
        <div class="row" style="position:relative;">
        <?php if($_GET['list']=="following"){?>
        <div class="col-sm-7" style="background-color:white; position:absolute; left:30%;">
        
            <h1 class="title following"> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; Following</h1>

         
               <div class="col-md-3" id="foll">
                <div class="card" style="margin-left: 0px;left: 63px; width:300px;">
                    <div class="card-body">
                       <div class="users">
                       <?php   if(mysqli_num_rows($res)>0){
                        while($nb = mysqli_fetch_assoc($res) ){
                                ?> 

                         <div class="row" >
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $nb['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <h6> <?php echo $nb['prenom'].$nb['nom']; ?> </h6> </div>
                                <?php ?>
                                <div class="col-md-4">
                                <input type="submit" formmethod="post" name="follow" 
                                    <?php if(get_follows($link,$id_user,$nb['id_user'])==true) :?>
                                        class="down follow"  value ="following" 
                                    <?php else :   ?>
                                        class="up follow"   value ="follow"
                                    <?php endif ?>
                                    data-content="<?php echo $nb['id_user']?>"
                                    >
                                
                                </div>
                            </div> <br> <br>
                            
                            
                            <?php 
                                            }
                                    }
                                }
                            ?>

                           
                             
                       </div>
                    </div>
                    
                </div>
            </div>
           


    </div>
    <?php if($_GET['list']=="followers"){?>
      <div class="col-sm-8" style="background-color:white; position:absolute; left:30%;">
      <h1 class = "title followers" >&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;Followers</h1>
      <div class="col-md-3" id="foll">
                <div class="card" style="margin-left: 0px;left: 63px; width:300px;">
                    <div class="card-body">
                       <div class="users">
                       <?php   if(mysqli_num_rows($res2)>0){
                        while($nb2 = mysqli_fetch_assoc($res2) ){
                                ?> 

                         <div class="row" >
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $nb2['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <h6> <?php echo $nb2['prenom'].$nb2['nom']; ?> </h6> </div>
                                <?php ?>
                                <div class="col-md-4">
                                <input type="submit" formmethod="post" name="follow" 
                                    <?php if(get_follows($link,$id_user,$nb2['id_user'])==true) :?>
                                        class="down follow"  value ="following" 
                                    <?php else :   ?>
                                        class="up follow"   value ="follow"
                                    <?php endif ?>
                                    data-content="<?php echo $nb2['id_user']?>"
                                    >
                                
                                </div>
                            </div> <br> <br>
                            
                            
                            <?php 
                                            }
                                    }
                                }
                            ?>

                           
                             
                       </div>
                    </div>
                    
                </div>
            </div>

      </div>
       
        
    </div>
    </div>
    </div>
    <script src="script2.js"></script>
    
</body>
</html>