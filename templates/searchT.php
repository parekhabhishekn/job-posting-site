<?php
include_once './header.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<br />
<form  method="post" action="./search.php" >
    <table>
        <tr>
            <td><label>Search</label></td><td colspan="8"> <input type="text" name="search" size="36" placeholder="Enter words you want to search..."  required>
            </td></tr>
    <?php if($_SESSION['role']==1 ){    ?>
    
    <tr>
        <td></td>
        <td><label> GPA </label></td><td><input type="radio" name="crit" value="gpa"></td>
        <td><label> Skills </label></td><td><input type="radio" name="crit" value="skills"></td></tr>
    <tr>
        <td></td>
        <td><label> Experience </label></td><td><input type="radio" name="crit" value="exp"></td>
        <td><label> Education </label></td><td><input type="radio" name="crit" value="edu"></td>
        </tr>
    <?php  } ?>
    <tr><td>
            <br />
            <input type="submit" class="btn" value="Search" /></td></tr>
    </table>
</form>


<?php echo $result ?>




<?php include_once './footer.php'; ?>