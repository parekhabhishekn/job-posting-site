<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$authmessage;
//$confirm;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to the Job Posting Site!</title>
        <meta charset="UTF-8" />
        <!--<link type="text/css" rel="stylesheet" href="./css/style.css" >-->
        <link type="text/css" rel="stylesheet" href="./css/bootstrap-theme.css" >
        <link type="text/css" rel="stylesheet" href="./css/bootstrap.css" >
        <script type="text/javascript" >
            
            
            
            function checkPassword(){
                var p1 = document.getElementById('p1').value;
                var p2 = document.getElementById('p2').value;
                if(p1!=p2){
                    document.getElementById('pword').innerHTML="Passwords Do not match.";
                }else{
                    document.getElementById('pword').innerHTML="";
                }
                
            }
            
            function checkPassword1(){
                var p1 = document.getElementById('p1').value;
                var p2 = document.getElementById('p2').value;
                if(p1!=p2){
                    return false;
                }else{
                    return true;
                }
                
            }
            
            function validateForm(){
               var p1 =  document.getElementById('pword').innerHTML;
               var uc =  document.getElementById('userCheck').innerHTML;
               var ec =  document.getElementById('emailCheck').innerHTML;
               //alert(pw);
               if(uc.length != 47 && ec.length !=21 && p1.length!=23)
               {
                   return true;
               }
               
              
               return false;
            }
            
            
            function checkCustomer(){
                var xmlhttp;
                
                if(window.XMLHttpRequest){
                    xmlhttp= new XMLHttpRequest();
                }
                
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status == 200){
                        document.getElementById('userCheck').innerHTML = xmlhttp.responseText;
                    }
                }
                var t=document.getElementById('un').value;
                //alert(t);
                xmlhttp.open("GET","AJAXphp.php?id="+t,true);
                xmlhttp.send();
            }
            function checkEmail(){
                var xmlhttp;
                
                if(window.XMLHttpRequest){
                    xmlhttp= new XMLHttpRequest();
                }
                
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status == 200){
                        document.getElementById('emailCheck').innerHTML = xmlhttp.responseText;
                    }
                }
                var t=document.getElementById('email').value;
                //alert(t);
                xmlhttp.open("GET","emailCheck.php?email="+t,true);
                xmlhttp.send();
            }
            
            function checkNewMessage(){
                var xmlhttp;
                
                if(window.XMLHttpRequest){
                    xmlhttp= new XMLHttpRequest();
                }
                
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status == 200){
                        document.getElementById('msgcnt').innerHTML = xmlhttp.responseText;
                    }
                }
               
                //alert(t);
                xmlhttp.open("GET","checkMessage.php",true);
                xmlhttp.send();
            }
            
            window.setInterval(function checkNewMessage2(){
                var xmlhttp;
                
                if(window.XMLHttpRequest){
                    xmlhttp= new XMLHttpRequest();
                }
                
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status == 200){
                        document.getElementById('msgcnt').innerHTML = xmlhttp.responseText;
                    }
                }
               
                //alert(t);
                xmlhttp.open("GET","checkMessage.php",true);
                xmlhttp.send();
            },1000);

        </script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
            <div class='collapse navbar-collapse'>
            
            <ul class='nav navbar-nav navbar-left'>
                <li class="navbar-toggle"><a href="./index.php" >Home</a></li>
                <li class="navbar-toggle"><a href="./browseJobs.php">Browse Jobs</a></li>
                
                
                <?php if(isset($_SESSION['username'])){ ?>
                <li class="navbar-toggle"><a href="./search.php">Search</a></li>                   
                <li class="navbar-toggle"><a href="./messages.php">Messages<span id="msgcnt" ><?php 
                
                /*$user = new User();
                $count = $user->getNewMessageCount();*/
                //var_dump($count[0]);
                //if($count[0]['newMs']){
                   // echo "(".$count[0]['newMs'].")";
               //}
                
               ?></span></a></li>
                <li class="navbar-toggle"><a href="./logout.php" >Log Out</a></li>
                <?php if($_SESSION['role']==1){ ?>
                <li class="navbar-toggle"><a href="./postJob.php">Post a Job</a></li>
                
                <?php }else{ ?>
                <li class="navbar-toggle"><a href="viewProfile.php"> Profile </a></li>
                <?php } ?>
                <li class="navbar-text">Hello,Mr. <?php echo $_SESSION['username']; ?></li>
                <?php 
                
                }else{
                    
                    ?>
                <li class="navbar-toggle"><a href="./login.php">Log In</a></li>
                <li class="navbar-toggle"><a href="./register.php">Register</a></li>
                
                <?php }?>
                
                
            </ul>
            </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        
        <div class="container">
            <div class="col-lg-12">
