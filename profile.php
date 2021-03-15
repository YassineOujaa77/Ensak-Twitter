<?php 
    
 
    include("Search.php");
  
      


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="profile2.css">    
    <title>Profil page</title>
    <style>
        button{
        border : none ;
    }
    .re_post_form{
        float : right;
        width : 100px;
    }
    </style>
</head>
<body>



    <div class="container-fluid gedf-wrapper">
        <div class="row" style="margin-left: 221px; margin-top:62px;">
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
               <?php if($_GET["id_profile"]==$id_user){
                    ?> 
                    <div class="card gedf-card">
                    <form action="" method="post">
                        <div class="card-header">
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
                                    <button type="submit" class="btn btn-primary" name="share">share</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
               <?php }else{    }
                   ?>
                
                <!-- Post /////-->
                
<br>
                <!--- \\\\\\\Post-->
                <?php 
                    if(mysqli_num_rows($result2)>0){
                        while($row = mysqli_fetch_assoc($result2)){
                            if($row['id_user']== $_GET['id_profile']){
                                ?> 
                <div class="card gedf-card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo 'img/'.$row['photo'];?>" alt="photo">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row['prenom'].$row['nom'];?></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="post.php">
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?php echo $row['date_post']; ?></div>
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
                                }else{
                                    echo '<div class="card" style="width: 530px; height:250px; postion:absolute; left:-1px;"">
                                    <div class="card-body">
                                      <h5 class="card-title"></h5>
                                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                                      <h1 class="card-text" style="text-align:center; " >No posts <br>suivre des personne pour    avoir les derniéres actualités.</h1>
                                      
                                    </div>
                                  </div>' ;
                                } ?> 
                          
                <!-- Post /////-->
                <?php 
                    $sql = "SELECT COUNT(id_follow) FROM `followers` WHERE id_user=$id_user
                    UNION 
                    SELECT COUNT(id_follow) FROM followers WHERE id_follower=$id_user ";
                    $nbr = mysqli_query($link,$sql);
                    $follow = mysqli_fetch_assoc($nbr);
                    $following = $follow['COUNT(id_follow)'];
                    $follow = mysqli_fetch_assoc($nbr);
                    if($follow==false){
                        $followers = 0;
                    }else{
                        $followers = $follow['COUNT(id_follow)'];
                    }
                   
                ?>




            </div>
            
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="image-profil"><img src="<?php echo 'img/'.$row3['photo'];?>" alt="" class="profilImg"> </div>
                        <div class="h5"><?php echo  '@'.$row3['prenom'].'_'.$row3['nom'] ?></div>
                        <div class="h7"><?php echo $row3['description'] ?></div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="listfollow.php?list=following">
                            <div class="h6 text-muted">Followings</div>
                            <div class="h5"><?php  echo $following ?></div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="listfollow.php?list=followers">
                            <div class="h6 text-muted">Followers</div>
                            <div class="h5"><?php  echo $followers; ?></div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
