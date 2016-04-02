<?php
print '<html>';
// Initialize variables one for each form element
// in the order they appear on the form

$firstName = "Jack";
$lastName = "Steffens";
$email = "jsteffen@uvm.edu";
$year = "2017";
$bio = "Suh duuu";
$gender = "Male";

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
   
    $dataRecord[] = $lastName;
    $dataRecord[] = $firstName;
    $dataRecord[] = $email;
    $dataRecord[] = $gender;
    $dataRecord[] = $year;
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


    if ($year = ""){
        $errorMsg[]= "Please enter what year you are in at UVM.";
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
    
	// Process form
        if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // Save Data
        
    } // end form is valid
   }

   ?>

   <h1 id="frmProfile">Profile</h1>

 

    <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">

                <h3>Please review information carefully</h3>

                        
                        <label for="txtFirstName" class="required">First Name

                            <input type="text" id="txtFirstName" name="txtFirstName"
                                 
                                   tabindex="100" maxlength="35" placeholder="First Name"
                                   <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>          
                        
                        
                        <label for="txtLastName" class="required">  Last Name

                            <input type="text" id="txtLastName" name="txtLastName"
                                  
                                   tabindex="100" maxlength="35" placeholder="Enter your first name"
                                   <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>

                        </label ><br><br>    
                       
                    
                    
                        
                            <label id="txtEmail" for="txtEmail" class="required">Email

                            <input type="text" id="txtEmail" name="txtEmail"
                                   
                                   tabindex="120" maxlength="120" placeholder="Enter valid email"
                                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   autofocus>
                            </label>

 							<br><br>

                        <br><br>
                        <fieldset class="radio">                          

                            <legend>Gender</legend>

                            <label>

                                <input type="radio" 
                                       id="radGenderMale" 
                                       name="radGender" 
                                       value="Male"
                                       <?php if ($gender == "Male") print 'checked' ?>
                                       tabindex="330">Male
                            </label>

                            <label>

                                <input type="radio" 
                                       id="radGenderFemale" 
                                       name="radGender" 
                                       value="Female"
                                       <?php if ($gender == "Female") print 'checked' ?>
                                       tabindex="340">Female
                            </label>

                            <label>

                                <input type="radio" 
                                       id="radGenderUnidentified" 
                                       name="radGender" 
                                       value="Unidentified"
                                       <?php if ($gender == "Unidentified") print 'checked' ?>
                                       tabindex="330">Unidentified
                            </label>

                        </fieldset>
                        <br><br>
                        

                            <label for="txtBio" class="required">Bio</label>

                            <textarea id="txtBio" 
                                      name="txtBio" 
                                      tabindex="200"
                                      <?php if ($emailERROR) print 'class="mistake"'; ?>
                                      onfocus="this.select()" 
                                      style="width: 25em; height: 4em;" ><?php print $bio; ?>
                            </textarea>

                        <br><br>



                        <fieldset class="buttons">
                            <p>Now Please take a second and consider your responses, then submit</p>
                            <input type="submit" id="btnSubmit" name="btnSubmit" value="Save" tabindex="900" class="button">

                </form>

</html>
