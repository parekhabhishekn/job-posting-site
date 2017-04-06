<?php
include './header.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<form method="post" action="message.php">
    <fieldset>
        <legend>Fill out following message to Apply for the job! </legend>
        <input type="hidden" name="sender" value="<?php echo $_SESSION['id'] ?>" />
        <input type="hidden" name="receiver" value="<?php echo $_GET['poster'] ?>" />
        <input type="hidden" name="job" value="<?php echo $_GET['job_id'] ?>" />
        <label>You are 
            <?php 
            if($_SESSION['role'] == 1){
                $sub ="Reply";
                echo $sub."ing";
            }else{
                $sub = "Apply";
                echo $sub."ing";
            
            }?>
            
            for job no: <?php echo $_GET['job_id']?></label><br />
        <label>Please enter your message below:</label><br />
        <textarea cols="32" rows="16" name="content" ></textarea>
        <br />
        
        <input type="submit" class="btn" value="<?php echo $sub; ?>" >
        
        
    </fieldset>
    
    
</form>




<?php include './footer.php';  ?>