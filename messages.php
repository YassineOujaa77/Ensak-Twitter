<?php 
    include("Search.php");
    if(!isset($_GET['id_receiver'])){
        $_GET['id_receiver'] = 0;
    }
    $_SESSION['receiver'] = $_GET['id_receiver'];
    $query = "SELECT user.id_user ,user.nom , user.prenom,user.photo FROM followers JOIN user on followers.id_follower = user.id_user AND followers.id_user = $id_user ";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    
    //get messages 
    // les infos de sender et son message
    $receiver = $_GET['id_receiver'];
    $query2 = "    SELECT * FROM messages JOIN user ON messages.id_sender = user.id_user AND id_sender = $receiver
                    AND id_receiver = $id_user
                    UNION 
                    SELECT * FROM messages JOIN user ON messages.id_sender = user.id_user AND id_sender = $id_user
                    AND id_receiver = $receiver
                    ORDER BY date_message DESC";
    $result2 = mysqli_query($link,$query2);

    //get info user 
    $info = mysqli_query($link,"SELECT * FROM user WHERE id_user=$id_user");
    $row3 = mysqli_fetch_assoc($info);
    
    function NameOfChat($id,$link){
        $query4 = "SELECT * FROM user WHERE id_user = $id";
        $result4 = mysqli_query($link,$query4);
        $row = mysqli_fetch_assoc($result4);
        if($id==0){
            $row['nom']='Nom';
            $row['prenom'] = '_prenom';
        }
        return $row;
    } 

    if(isset($_POST['send'])){
        echo "<meta http-equiv='refresh' content='0'>";
        if($_POST['message']==''){
            $_SESSION['error']="Message est vide ";
        }
        else{
            $msg = $_POST['message'];
            $query5 = "INSERT INTO messages(id_sender,message,id_receiver) VALUES($id_user,'$msg',{$_SESSION['receiver']})  ";
            $result5 = mysqli_query($link,$query5);
            if($result5){
                
            }
           
            
        }
    }

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="messageStyle.css">
    <title>Messages</title>
</head>
<body>

<div class="container cont">
<div class="ks-page-content" style="margin-left: 59px;margin-top: 1px;">
    <div class="ks-page-content-body">
        <div class="ks-messenger">
            <div class="ks-discussions">
                <div class="ks-body ks-scrollable jspScrollable" data-auto-height="500px" style="height: 590px; overflow-y: auto; padding: 0px; width: 339px; overflow-x: hidden;" tabindex="0">

                    <div class="jspContainer" style="width: 339px; height: 550px;">
                        <div class="jspPane" style="padding: 0px; top: 0px; width: 329px;">
                            <ul class="ks-items">
                                <?php if(mysqli_num_rows($result)>0){ 
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                <li class="ks-item ks-active">
                                    <a href="<?php echo "messages.php?id_receiver=".$row['id_user'];?>"   >
                                        <span class="ks-conv-image"><img src="<?php echo 'img/'.$row['photo'];?>" alt="" width = '30px'> </span>
                                        <div class="ks-body">
                                            <div class="ks-name">
                                                     <?php echo $row['nom'].' '.$row['prenom'];?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php }}?>
                            </ul>
                        </div>
                        <div class="jspVerticalBar">
                            <div class="jspCap jspCapTop"></div>
                            <div class="jspTrack" style="height: 550px;">
                                <div class="jspDrag" style="height: 261px;">
                                    <div class="jspDragTop"></div>
                                    <div class="jspDragBottom"></div>
                                </div>
                            </div>
                            <div class="jspCap jspCapBottom"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ks-messages ks-messenger__messages">
                <div class="ks-header">
                    <div class="ks-description">
                        <div class="ks-name"><?php $row = NameOfChat($_GET['id_receiver'],$link); echo $row['nom'].' '.$row['prenom']?></div>
                    </div>
                    
                </div>
                <div class="ks-body ks-scrollable jspScrollable" data-auto-height="" data-reduce-height=".ks-footer" data-fix-height="32" style="height: auto; overflow: auto; padding: 0px;  max-width: 98%;  width:700px; overflow-x: hidden;" tabindex="0">
                    <div class="jspContainer" style="max-width;100%; height: auto;">
                        <div class="jspPane" style="padding: 0px; top: 0px; width:600px;">
                            <ul class="ks-items" >
                                
                            <?php 
                             while($row2 = mysqli_fetch_assoc($result2) ){ 
                                 
                                if($row2['id_sender']==$id_user){ ?>
                                     <li class="ks-item ks-from messages">
                                    <span class="ks-avatar ks-online">
                                        <img src="<?php echo 'img/'.$row['photo']?>" width="36" height="36" class="rounded-circle">
                                    </span>
                                    <div class="ks-body">
                                        <div class="ks-header">
                                            <span class="ks-name"><?php echo $row2['nom'].' '.$row2['prenom'];?></span>
                                            <span class="ks-datetime">6:46 PM</span>
                                        </div>
                                        <div class="ks-message"><?php echo $row2['message'];?></div>
                                    </div>
                                </li>
                                <?php }else {?>                               
                               
                                <li class="ks-item ks-self">
                                    <span class="ks-avatar ks-offline">
                                        <img src="<?php echo 'img/'.$row2['photo']?>" width="36" height="36" class="rounded-circle">
                                    </span>
                                    <div class="ks-body">
                                        <div class="ks-header">
                                            <span class="ks-name"><?php echo $row2['nom'].' '.$row2['prenom'];?></span>
                                            <span class="ks-datetime">6:46 PM</span>
                                        </div>
                                        <div class="ks-message"><?php echo $row2['message'];?></div>
                                    </div>
                                </li>
                                <?php }     }?>
                            </ul>
                        </div>
                        <div class="jspVerticalBar">
                            <div class="jspCap jspCapTop"></div>
                            <div class="jspTrack" style="height: 481px;">
                                <div class="jspDrag" style="height: 206px;">
                                    <div class="jspDragTop"></div>
                                    <div class="jspDragBottom"></div>
                                </div>
                            </div>
                            <div class="jspCap jspCapBottom"></div>
                        </div>
                    </div>
                </div>
                <div class="ks-footer">
                    <form action="" method="post" class="formMessage">
                    <textarea class="form-control" placeholder="Type something..." cols = "60" name="message" ></textarea>
                    
                    <button class="btn btn-primary send" name="send" style="position: absolute; right: 120px; bottom:34px; left:600px;">Send</button>                        
                    </form>
                    
                </div>
                
            </div>
            <?php if(!empty($row['email'])){  ?>
            <div class="ks-info ks-messenger__info">
                <div class="ks-header">
                    User Info
                </div>
                <div class="ks-body">
                    <div class="ks-item ks-user">
                        <span class="ks-avatar ks-online">
                            <img src="<?php echo 'img/'.$row['photo']; ?>" width="36" height="36" class="rounded-circle">
                        </span>
                        <span class="ks-name">
                            <?php echo $row['nom'].'_'.$row['prenom']; ?>
                        </span>
                    </div>

                    <div class="ks-item">
                        <div class="ks-name">Username</div>
                        <div class="ks-text">
                        <?php echo '@'.$row['nom'].'_'.$row['prenom']; ?>
                        </div>
                    </div>
                    <div class="ks-item">
                        <div class="ks-name">Email</div>
                        <div class="ks-text">
                        <?php echo $row['email']; ?>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <?php }else{
                ?>
                <div class="ks-info ks-messenger__info">
                <div class="ks-header">
                    User Info
                </div>
                <div class="ks-body">
                    <div class="ks-item ks-user">
                        <span class="ks-avatar ks-online">
                            <img src="" width="36" height="36" class="rounded-circle" alt ="photo">
                        </span>
                        <span class="ks-name">
                            <?php echo "nom prenom";?>
                        </span>
                    </div>

                    <div class="ks-item">
                        <div class="ks-name">Username</div>
                        <div class="ks-text">
                        <?php echo '@'.'nom'.'prenom'; ?>
                        </div>
                    </div>
                    <div class="ks-item">
                        <div class="ks-name">Email</div>
                        <div class="ks-text">
                        <?php echo 'email'; ?>
                        </div>
                    </div>
                    
                </div>
                <?php }?>
            
        </div>
    </div>
</div>
</div>


<script src ="script2.js"></script>
 
</body>
</html>