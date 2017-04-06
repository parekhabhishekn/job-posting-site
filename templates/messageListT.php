<?php
include_once './header.php'; 
$errm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if(isset($messages)){    
?>

<table>
    <tr><th>Sender</th><th>Message</th><th></th></tr>
    <?php 
    //var_dump($messages);
        
    $user = new User();
        foreach($messages as $message){
    
    ?>
    <tr>
        <td><?php echo $user->getUserName($message['id_sender']) ?></td>
        <td><a href="viewMessage.php?id='<?php echo $message['id_message'] ?>'"><?php echo substr(htmlentities($message['contents']),0,10); ?></a></td>
        <td><?php  
            if(!$message['mRead']){
                echo "Unread!";
            }
        ?>
        </td>
    </tr>
    
    <?php
        }
    }else{
        
        echo "<h2>Your message sent successfully.</h2>";
    }
    ?>
</table>




<?php include './footer.php';  ?>