<?php include_once './header.php'; ?>
<br />
<form method="POST" action="form.php" onsubmit=" return validateForm();" >
    <fieldset>
        <legend>Please fill the form below to register.</legend>
        <table>
            <tr><td><label >Username</label> </td><td><input type="text" id="un" onkeyup="checkCustomer()" name="username" size="32" maxlength="100" placeholder="Enter Your Username......" required/>
                </td><td><div id="userCheck" class="alert-danger"></div></td> </tr>
            <tr><td>   <label>Password</label> </td><td><input type="password" id="p1"  name="password" size="32" required/>
                </td></tr>
            <tr><td> <label>Repeat Password</label> </td><td><input type="password" id="p2" onkeyup="checkPassword()" size="32" required/>
                </td><td><div id="pword" class="alert-danger"></div></td></tr>
            <tr><td>  <label>First Name</label> </td><td><input type="text" name="firstname" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Last Name</label> </td><td><input type="text" name="lastname" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Email</label></td><td> <input type="email" id="email" onkeyup="checkEmail()" name="email" size="32" required/>
                    <br /></td><td><div id="emailCheck" class="alert-danger"></div></td></tr>
            <tr><td>    <label>Role</label> 
                </td><td>
                <select name="role" required>
                    <option value="1">Employer</option>
                    <option value="2">Job Seeker</option>
                </select>
                <br /></td></tr>
            <tr><td>    <label>Citizenship</label> </td><td><input type="text" name="citiszen" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Ethnicity</label></td><td> <input type="text" name="ethnicity" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Disability Status</label> </td><td><input type="text" name="disability" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Military Status</label> 
                </td><td><select name="military" required>
                    <option value="protected">Protected Veteran</option>
                    <option value="Not Protected">Not a Protected Veteran</option>
                    <option value="Other">Other Protected Veteran</option>
                    <option value="Opt Out">Not wish to answer</option>
                </select>
                <br /></td></tr>
            <tr><td>    <label>Phone Number</label></td><td> <input type="tel" name="phone" size="32" placeholder="###-###-####"
                                                                    pattern="^\d{3}-\d{3}-\d{4}$"  required/>
                <br /></td></tr>
            <tr><td colspan="2">    <label>Address</label></td></tr>
             <tr><td>   <label>Street</label> </td><td><input type="text" name="street" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>City</label></td><td> <input type="text" name="city" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>State</label></td><td> <input type="text" name="state" maxlength="2" size="32" required/>
                <br /></td></tr>
            <tr><td>    <label>Zip</label> </td><td><input type="number" name="zip" size="32" maxlength="5" required/>
                <br /></td></tr>
            <tr><td>    <label>Country</label></td><td> <input type="text" name="country" size="32" required/>
                <br />
                </td></tr>
            <tr><td>   <br /> <input type="submit" class="btn" value="Register"  />
                <input type="reset" class="btn" value="Reset" /></td></tr>
        </table>
    </fieldset>
</form>

<?php include_once './footer.php'; ?>
