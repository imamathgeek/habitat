
<?php
include "top.php";
include "lib/validation-functions.php";
$array = array($username);
$person = $db->select('tblPerson', $array);
// Initialize variables one for each form element
// in the order they appear on the form
//include "top.php";
print'<html>';
$firstName = "Jack";
$lastName = "Steffens";
$email = "jsteffen@uvm.edu";
$year = $person['fldYear'];
$bio = $person['fldBio'];
$onOff = $person['fldOnCampus'];
$gender = $person['fldGender'];
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$firstNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;
$genderERROR = false;
$yearERROR = false;
$bioERROR = false;
// create array to hold error messages 
$errorMsg = array();
// array used to hold form values 
$dataRecord = array();
if (isset($_POST["btnSubmit"])) {
    // Collect field data
    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $lastName =  htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
    // $year = 
    $bio = htmlentities($_POST["txtBio"], ENT_QUOTES, "UTF-8");
    
    $dataRecord[] = $firstName;
    $dataRecord[] = $lastName;
    $dataRecord[] = $email;
    $dataRecord[] = $gender;
   // $dataRecord[] = $year;
    $dataRecord[] = $bio;
    // Validation
    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have extra character.";
        $firstNameERROR = true;
    }
    
    if ($lastName == "") {
        $errorMsg[] = "Please enter your last name";
        $lastNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {
        $errorMsg[] = "Your last name appears to have extra character.";
        $lastNameERROR = true;
    }
    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }
    if (($year = "") | ($year < 1)){
        $errorMsg[]= "Please enter what year you are in at UVM.(Integer with a value of at least 1)";
        $yearERROR = true;
    }
    else if (!verifyNumeric($year)){
        $errorMsg[] = "Your year must be a numeric value.";
        $yearERROR = true;
    }
    
    if(!verifyAlphaNum($bio)){
        $errorMsg[] = "Your bio appears to have extra characters";
        $bioERROR = true;
    }
  if (!empty($errorMsg)){
    print '<ul>';
    foreach($errorMsg as $error){
      print '<li>'.$error.'</li>';
    }
    print '</ul>';
  }
    
    }
    
    
    
  // Process form
  if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
      print '<p>Your information has been updated.</p>';
      
      // save data to database
   }
    
  else{
   ?>

   <h1 id="frmProfile">Sign Up</h1>

 

    <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">

                <p>Please insert your information</p>

                        
                        <label for="txtFirstName" class="required">First Name

                            <input type="text" id="txtFirstName" name="txtFirstName"
                                 value="<?php print $person['fldFirstName'];?>"
                                   tabindex="100" maxlength="35" placeholder="First Name"
                                   <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>          
                        
                        
                        <label for="txtLastName" class="required">  Last Name

                            <input type="text" id="txtLastName" name="txtLastName"
                                  value="<?php print $person['fldLastName'];?>"
                                   tabindex="100" maxlength="35" placeholder="Enter your first name"
                                   <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>

                        </label ><br><br>    
                       
                    
                    
                        
                            <label id="txtEmail" for="txtEmail" class="required">Email

                            <input type="text" id="txtEmail" name="txtEmail"
                                   value="<?php print $person['fldEmail'];?>"
                                   tabindex="120" maxlength="120" placeholder="Enter valid email"
                                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   autofocus>
                            </label>

                            <label for="intYear" class="required">Year

                             <input type="number" id="intYear" name="intYear"
                   
                                  tabindex="100" maxlength="35" placeholder="Year"
                                <?php if ($yearERROR) print 'class="mistake"'; ?>
                                  onfocus="this.select()"
                                  autofocus>
                             </label> 

              <br><br>

              <fieldset class="radio">                          

                            <legend>On/Off Campus</legend>

                            <label>

                                <input type="radio" 
                                       id="radOnCampus" 
                                       name="radOnOffCampus" 
                                       value="On"
                                       <?php if ($onOff == 1) print 'checked' ?>
                                       tabindex="330">On
                            </label>

                            <label>

                                <input type="radio" 
                                       id="radOffCampus" 
                                       name="radOnOffCampus" 
                                       value="Off"
                                       <?php if ($onOff == 0) print 'checked' ?>
                                       tabindex="340">Off
                            </label>

                        </fieldset>

                        <br><br>
                        <fieldset class="radio">                          

                            <legend>Gender</legend>

                            <label>

                                <input type="radio" 
                                       id="radGenderMale" 
                                       name="radGender" 
                                       value="Male"
                                       <?php if ($gender == "Male" || $gender == "male") print 'checked' ?>
                                       tabindex="330">Male
                            </label>

                            <label>

                                <input type="radio" 
                                       id="radGenderFemale" 
                                       name="radGender" 
                                       value="Female"
                                       <?php if ($gender == "Female" || $gender == "female") print 'checked' ?>
                                       tabindex="340">Female
                            </label>

                            <label>

                                <input type="radio" 
                                       id="radGenderOther" 
                                       name="radGender" 
                                       value="Other"
                                       <?php if ($gender == "Other" or $gender == "other") print 'checked' ?>
                                       tabindex="330">Other
                            </label>

                        </fieldset>
                        <br><br>
                        

                            <label for="txtBio" class="required">Bio</label>

                            <textarea id="txtBio" 
                                      name="txtBio" 
                                      tabindex="200"
                                      value="<?php print $person['fldBio'];?>"
                                      <?php if ($emailERROR) print 'class="mistake"'; ?>
                                      onfocus="this.select()" 
                                      style="width: 25em; height: 4em;" ><?php print $bio; ?>
                            </textarea>

                        <br><br>



<<<<<<< HEAD
<article id="main">
    <p id="description">Looking for your prefect roommate? Look no further! Habitat has you covered! Find other students at UVM who exhibit similar behaviors to yourself and find your perfect home - your habitat.</p>
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">
        <fieldset class="wrapper">
            <p>Sign Up!</p>

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
        
         <!-- gender -->
        <fieldset class="radio">
            <label>What is your gender?</label>
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


        </fieldset> <!-- ends contact -->

        <legend>Brief Bio</legend>
        <fieldset  class="textarea">

                    <label for="txtContent" class="required"> </label>
                    <textarea id="txtContent" 
                              name="txtContent" 
                              tabindex="500"
            <?php if ($contentERROR) print 'class="mistake"'; ?>
                              onfocus="this.select()" 
                              style="width: 20em; height: 5em;" ><?php print 
                              $content; ?></textarea>
                    <!-- NOTE: no blank spaces inside the text area -->
                </fieldset>

       
        <fieldset class="buttons">
         
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
        </fieldset> <!-- ends buttons -->
        <!-- Ends Wrapper -->
    </form>
</article>
</body>
</html>
=======
                        <fieldset class="buttons">
                            <label>Submit</label>
                            <input type="submit" id="btnSubmit" name="btnSubmit" value="Save" tabindex="900" class="button">

                </form>
                <?php } ?>
             </html>
>>>>>>> abd706fa1c929d81e51a86724e3fb20045a83dd8
