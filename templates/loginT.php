<?php include_once './header.php'; 
$errm
?>
<p><?php 
if(isset($errm)){
echo $errm;
}
?></p>

<form method="POST" action="authenticate.php" onsubmit="checkPassword()">
    <fieldset>
        <legend>Log in.</legend>
        <table>
            <tr>
                <td><label>Username</label></td><td> <input type="text" name="username" size="32" maxlength="100" placeholder="Enter Your Username......" required/>
                    </td></tr>
            <tr> <td>   <label>Password</label></td><td> <input type="password" name="password" size="32" required/>
                    </td></tr>
                
                
            <tr><td> 
                    <br />
                    <input type="submit" class="btn" value="Log In"  />
                    <input type="reset" class="btn" value="Reset" /></td>
        </table>
    </fieldset>
</form>
Forgot your credentials? <a href="./index.php" >Click Here!</a>
<?php include_once './footer.php'; ?>