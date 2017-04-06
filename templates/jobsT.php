<?php include './header.php';?>
<ol>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Date
//date_default_timezone_get("UTC");
//var_dump($jobs);

//echo $jobs->error;
if(isset($jobs)):
    
    foreach ($jobs as $job):
?>
    <li> <h3> <a href="../Job_Portal_Site/viewJob.php?id=<?php echo $job['id_jobs']?>"> <?php echo $job['title']?> </a></h3>
    <?php 
    if(isset($job['type']))
            echo $job['type']; ?>
       <!-- <?php echo $job['id_jobs'] ?> -->
       <p id='description'><?php echo substr(htmlentities($job['description']),0,25)."..." ?></p>
   
</ul>
    </li>
<?php
endforeach;
    else:
        
    endif;

?>
</ol>

<?php include './footer.php'; ?>

