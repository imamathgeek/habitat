
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

   <h1 id="frmProfile">Profile</h1>

 

    <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">

                <h3>Please review information carefully</h3>

                        
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



                        <fieldset class="buttons">
                            <p>Now Please take a second and consider your responses, then submit</p>
                            <input type="submit" id="btnSubmit" name="btnSubmit" value="Save" tabindex="900" class="button">

                </form>
                <?php } ?>
             </html>