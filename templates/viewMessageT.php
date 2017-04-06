<?php
include_once './header.php'; 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($messages)){
    $user = new User();
    ?>

<table>
    <tr><td>Received at:</td><td><?php echo  $messages['time_stamp']; ?></td></tr>
    <tr><td>Sender:</td><td><?php echo $user->getUserName($messages['id_sender']); ?></td></tr>
    <tr><td>Message :</td><td><?php echo htmlentities($messages['contents']); ?></td></tr>
    <tr><td><a href="reply.php?poster=<?php echo $messages['id_sender']; ?>&job_id='<?php echo $messages['id_jobs']; ?>'">Reply</a></td></tr>
    
</table>

<?php
    
    
    
}


?>



<?php include './footer.php';  ?>