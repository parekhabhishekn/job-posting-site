<?php
include_once './header.php'; 
$errm
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<form method="post" action="./add_job.php">
    <fieldset>
    <legend>Fill out the information below to post the job.</legend>
    <table>
       <tr>
           <td><label>Job Type</label></td>
    <td><select name="type_job" required="true">
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>
        <option value="Contract">Contract</option>
        </select></td>
       </tr>
       
    <tr>
        <td><label>Title</label></td><td><input type="text" name="title" required="true"/></td>
    
    <tr>
        <td colspan="2"><label>Description</label></td></tr>
    <tr><td colspan="2"><textarea name="description" cols="64" rows="16" required="true"></textarea>
        </td></tr>
    <tr><td><br /><input type="submit" value="Post" class="btn"/>
            <input type="reset" value="Reset" class="btn" /></td></tr>
    </table>
    </fieldset>
</form>

<?php include './footer.php'; ?>