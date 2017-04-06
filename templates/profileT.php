<?php include_once './header.php'; ?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_SESSION)){
    if(isset($_SESSION['role'])){
        $id = $_SESSION['role'];
        
        if($_SESSION['role']==1 ){
            
        }elseif($_SESSION['role']==2){
            
            ?>

<form method="post" action="addprofile.php">
    <fieldset>
        
        <legend>Fill out your profile </legend>
        <table>
            <tr>
                <td><label>Education :</label></td><td><input type="text" size="25" name="education" placeholder="Enter your degree..." /></td></tr>
        <tr>
                <td><label>Experience :</label></td><td><input type="number" size="25" name="experience" placeholder="Enter your workexperience..." /></td></tr>
        <tr>
                <td><label>GPA :</label></td><td>
        <select name="gpa">
            <?php 
            $i=2.00;
            for(;$i <= 4.00;){
                
            echo "<option value='{$i}'> $i </option>";
            $i+=0.1;
            }      
                    ?>
            <option value='4'> 4 </option>
        </select>
        </td></tr>
        <tr>
                <td><label>Skills :</label></td><td><input type="text" size="32" name="skills" placeholder="Enter your skills..." /></td></tr>
        <tr>
                <td><input type="submit" value="submit" class="btn" /></td></tr>
        </table>
    </fieldset>
    
</form>

        <?php 
        } 
        
    }
    
}




?>

<?php include_once './footer.php'; ?>
