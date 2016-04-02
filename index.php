<?php
include "top.php";
?>

<article id="main">
    <?php
    
    if (isset($_POST["btnSubmit"]) && !$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";
        // If its the first time coming to the form or there are errors we are going
        // to display the form.
        

        if (!$mailed) {
            print "<p> Im sorry something went wrong. Try again later </p> ";
        }

        print "<h1> Thank you for signing up, Hope you enjoy.</h1>";

    } else if ($errorMsg) {
        print '<div id="errors">';
        print "<ul>\n";
        foreach ($errorMsg as $err) {
            print "<li>" . $err . "</li>\n";
        }
        print "</ul>\n";
        print '</div>';
    }
    
    if (!isset($_POST["btnSubmit"]) || $errorMsg) {
    
    ?>
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
                           value="<?php print $username1; ?>"
                           tabindex="100"  maxlength="45" placeholder="Enter your username"
                           <?php if ($usernameERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()"
                           autofocus>
                </label>
                </fieldset>


            </fieldset> <!-- ends contact -->
           
            <fieldset class="buttons">
             
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
            </fieldset> <!-- ends buttons -->
            <!-- Ends Wrapper -->
        </form>
        <?php
    }// end body submit
    ?>


</article>

<?php
include "footer.php";
if ($debug)
    print "<p>END OF PROCESSING</p>";
?>

