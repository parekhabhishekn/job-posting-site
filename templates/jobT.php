<?php include_once './header.php'; ?>


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

?>
     <h1><?php echo $job['title'] ?></h1>
        <h3>Posted by <?php echo $poster; ?></h3>
        <table>
            <tr>
                <td>Type</td><td><?php echo $job['type_job'] ?></td>
            </tr>
            <tr>
                <td>Post Date</td><td><?php echo $job['post_date'] ?></td>
            </tr>
            <tr>
                <td>Description</td><td><?php echo htmlentities($job['description']) ?></td>
            </tr>
            <?php 
                if(isset($_SESSION)){
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role'] == 2){
                            
                        
                    
                    
                
            ?>
            <tr>
                <td><a href="./apply.php?job_id=<?php echo $job['id_jobs']."&poster=".$job['id_employer']; ?>" class="btn" >Apply</a></td><td></td>
            </tr>
            
            
            <?php 
                        }
                    }
                }
            ?>
        </table>    
        
    

    
<?php


?>




            <!--<h2>Job Description</h2>
            <form>
                <fieldset>
                    <legend>Add your job information</legend>
                    <label>Job Type</label> 
                    <select name="type">
                        <option value="ft">Full Time</option>
                        <option value="pt">Part Time</option>
                        <option value="con">Contract</option>
                    </select>
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter Job Description...." cols="64" rows="16">
                        
                    </textarea>
                </fieldset>
            </form>-->

<?php include_once './footer.php'; ?>
