<?php 
    


	


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil2.css">
    <title>Profil page</title>
    <style type="text/css">
        .gedf-card 
        {
            position: relative;
            left: 300px;
            margin-top: 20px;
        }
        .col-md-6 
        {
            margin-left: 400px;
            padding-left: -100px;
            margin-top: 100px;

        }
        .post
        {
            width: 700px;
        }
        #foll
        {
            position: absolute;
            left: 1000px;
            top: 120px;
        }
        .up 
    {
        border:none;
        margin-left: 50px;
        background-color: #6EC6C6;
        height: 30px;
    }
    .down
    {
        border:none;
        margin-left: 50px;
        background-color: #09BC8A;
        color: white;
        height: 30px;
    }
    button{
        border : none ;
    }
    .re_post_form{
        float : right;
        width : 100px;
        left : 200px;
        
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
    </style>
</head>
<body>
   
<div class="menu">
   <?php include("Search.php");?>
    </div>
           

                 
                 



    
            <div class="post">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <form action="" method="post">
                        <div class="card-header" style="margin-top: 39px;">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                        a publication</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="message">post</label>
                                        <textarea name="TextPost" class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" name="share">Share <button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Post /////-->
<br>
                <!--- \\\\\\\Post-->
                <?php 
                    if(mysqli_num_rows($result2)>0){
                        while($row = mysqli_fetch_assoc($result2)){
                            
                                ?> 
                <div class="card gedf-card">
                
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $row['photo'] ;?>" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row['prenom'].$row['nom'];?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="post.php">
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                        <a class="card-link" href="#">
                           
                        </a>

                        <p class="card-text">
                        <?php echo $row['post'];?>
                        </p>
                    </div>
                    </a>
                    <div class="card-footer">
                                                        <i <?php if (userLiked($row['id_post'])): ?>
                                                            class="fa fa-thumbs-up like-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-up like-btn"
                                                        <?php endif ?>
                                                            data-id="<?php echo $row['id_post']; ?>"
                                                        ></i> Like
                                                         <span class="likes"><?php echo getLikes($row['id_post']); ?></span>

                                                        <i <?php if (userDisliked($row['id_post'])): ?>
                                                            class="fa fa-thumbs-down dislike-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-down dislike-btn"
                                                        <?php endif ?>
                                                        data-id="<?php echo $row['id_post'];?>"
                                                        ></i> Dislike
                                                        <span class="dislikes"><?php echo getDislikes($row['id_post']); ?></span>
                        <form action="" method="post" class="re_post_form">
                            <input type="hidden" name ="id_user" value="<?php echo $row['id_user'];?>"> 
                             <input type="hidden" name ="post" value="<?php echo $row['post'];?>">                                   
                            <button name ="re_post"><i class="fa fa-share"></i> Re-post</button>
                        </form>
                    </div>
                    
                </div>
                <?php 
                                            }
                                    }
                            else{
                                echo '<div class="card" style="width: 700px; height:300px; postion:absolute; left:300px;">
                                <div class="card-body">
                                  <h5 class="card-title"></h5>
                                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                                  <h1 class="card-text" style="text-align:center; " >No posts <br>suivre des personne pour    avoir les derniéres actualités.</h1>
                                  
                                </div>
                              </div>' ;
                            } ?> 
                <!-- Post /////-->


               




            </div>
            
            <div class="col-md-3" id="foll">
                <div class="card">
                    <div class="card-body">
                       <div class="users">
                       <?php   if(mysqli_num_rows($result_user)>0){
                        while($row = mysqli_fetch_assoc($result_user) ){
                                ?> 

                         <div class="row" >
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo 'img/'.$row['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <a href="<?php echo "profile.php?id_profile= ".$row['id_user']; ;?>"><h6> <?php echo '@'.$row['prenom'].'_'.$row['nom']; ?> </h6></a> </div>
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
                                    }
                            ?>

                           
                             
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  
    
    
</body>
</html>