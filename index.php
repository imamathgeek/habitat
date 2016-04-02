<?php
include "top.php";

$firstNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;
$usernameERROR = false;

$gender = "Male";
$pmkID = -1;
$firstName = "Shizzy";
$lastName = "Shay";
$email = "something@uvm.edu";
$username = "something else";
$year = "Freshman";
?>

<article id="main">
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">
        <fieldset class="wrapper">
            <legend>Sign Up!</legend>

            <input type="hidden" id="hidpmkID" name="hidpmkID"
                   value="<?php print $pmkID; ?>"
                   >

            <fieldset class="contact">
            <label for="txtFirstName" class="required"> First Name
                <input type="text" id="txtFirstName" name="txtFirstName"
                       value="<?php print $firstName; ?>"
                       tabindex="100"  maxlength="45" placeholder="Enter your first name"
                      <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       autofocus>
            </label>
            </fieldset>

            <!-- last name -->
            <fieldset>
            <label for="txtLastName" class="text"> Last Name
                <input type="text" id="txtLastName" name="txtLastName"
                       value="<?php print $lastName; ?>"
                       tabindex="100"  maxlength="45" placeholder="Enter your last name"
                       <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       autofocus>
            </label>

        </fieldset>

        <!-- email -->
        <fieldset class="wrapper">
            <label for="txtEmail" class="required">Email Address </label>
            <input type="text" id="txtEmail" name="txtEmail"
                   value="<?php print $email; ?>"
                   tabindex="120" maxlength="45" placeholder="Enter a valid email address"
                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                   onfocus="this.select()" >

        </fieldset>
        
         <!-- gender -->
        <fieldset class="radio">
            <p>What is your gender?</p>
            <label><input type="radio" 
                          id="radGenderMale" 
                          name="radGender" 
                          value="Male"
                          <?php if ($gender == "Male") print 'checked' ?>
                          tabindex="330"> Male</label>
            <label><input type="radio" 
                          id="radGenderFemale" 
                          name="radGender" 
                          value="Female"
                          <?php if ($gender == "Female") print 'checked' ?>
                          tabindex="340"> Female</label>
            <label><input type="radio" 
                          id="radGenderOther" 
                          name="radGender" 
                          value="Other"
                          <?php if ($gender == "Other") print 'checked' ?>
                          tabindex="340"> Other </label>
            <label><input type="radio" 
                           id="radGenderPrefernottodisclose" 
                           name="radGender" 
                           value="Prefer not to disclose"
                           <?php if ($gender == "Prefer not to disclose") print 'checked' ?>
                           tabindex="340"> Prefer not to disclose</label>
        </fieldset>

         <fieldset class="contact">
            <label for="txtUserName" class="required"> Username
                <input type="text" id="txtUserName" name="txtUserName"
                       value="<?php print $username; ?>"
                       tabindex="100"  maxlength="45" placeholder="Enter your username"
                       <?php if ($usernameERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       autofocus>
            </label>
            </fieldset>
            
                <fieldset class="contact">
                <label for="txtUserName" class="required"> Username
                    <input type="text" id="txtUserName" name="txtUserName"
                           value="<?php print $username; ?>"
                           tabindex="100"  maxlength="45" placeholder="Enter your username"
                           <?php if ($usernameERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()"
                           autofocus>
                </label>
                </fieldset>
  
            <fieldset  class="lists">
                <label for="lstDesc"> Year </label>
                <select id="lstDesc" 
                        name="lstDesc" 
                        tabindex="520" >
                    <option <?php if ($year == "Freshman") print " selected "; ?>
                        value="Freshman"> Freshman </option>

                    <option <?php if ($year == "Sophmore") print " selected "; ?>
                        value="Sophmore"> Sophmore </option>

                    <option <?php if ($year == "Junior") print " selected "; ?>
                        value="Junior"> Junior </option>

                    <option <?php if ($year == "Senior") print " selected "; ?>
                        value="Senior"> Senior </option>

                </select>
            </fieldset>


            
             <!-- gender -->
            <fieldset class="radio">
                <p>What is your gender?</p>
                <label><input type="radio" 
                              id="radGenderMale" 
                              name="radGender" 
                              value="Male"
                              <?php if ($gender == "Male") print 'checked' ?>
                              tabindex="330"> Male</label>
                <label><input type="radio" 
                              id="radGenderFemale" 
                              name="radGender" 
                              value="Female"
                              <?php if ($gender == "Female") print 'checked' ?>
                              tabindex="340"> Female</label>
                <label><input type="radio" 
                              id="radGenderOther" 
                              name="radGender" 
                              value="Other"
                              <?php if ($gender == "Other") print 'checked' ?>
                              tabindex="340"> Other </label>
                <label><input type="radio" 
                               id="radGenderPrefernottodisclose" 
                               name="radGender" 
                               value="Prefer not to disclose"
                               <?php if ($gender == "Prefer not to disclose") print 'checked' ?>
                               tabindex="340"> Prefer not to disclose</label>
            </fieldset>

             

        </fieldset> <!-- ends contact -->
       
        <fieldset class="buttons">
         
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
        </fieldset> <!-- ends buttons -->
        <!-- Ends Wrapper -->
    </form>
</article>
</body>
</html>