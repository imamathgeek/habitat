
<?php

include "../top.php";
include "../nav.php";
include "../lib/validation-functions.php";

$array = array($username);
$person = $db->select('tblPerson', $array);


// Initialize variables one for each form element
// in the order they appear on the form
print'<html>';


$firstName = $person['fldFirstName'];
$lastName = $person['fldLastName'];
$email = $person['fldEmail'];
$year = $person['fldYear'];
$bio = $person['fldBio'];
$onOff = $person['fldOnCampus'];
$gender = $person['fldGender'];
$submitted = false;


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
    $year = htmlentities($_POST["txtYear"], ENT_QUOTES, "UTF-8");
    $bio = htmlentities($_POST["txtBio"], ENT_QUOTES, "UTF-8");
    
    $dataRecord[] = $firstName;
    $dataRecord[] = $lastName;
    $dataRecord[] = $year;
    $dataRecord[] = $email;
    $dataRecord[] = $gender;
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

  /*  if (($year = "")){
        $errorMsg[]= "Please enter what year you are in at UVM (Integer with a value of at least 1).";
>>>>>>> Stashed changes
        $yearERROR = true;
    }

    else if (!verifyNumeric($year)){
        $errorMsg[] = "Your year must be a numeric value.";
        $yearERROR = true;
    }
	*/

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
  		
  		$submitted = true;
  		// save data to database
  		
   }
   	
  else{
  


   <h1 id="frmProfile">Profile</h1>
   ?>


   <h1 id="frmProfile">Account</h1>
<h2><a href="?editId=<?php print $person['pmkId'];?>">Edit</a></h2>
	
 
<?php if (isset($_GET['editId'])) {
    $startRecord = (int) $_GET['editId'];
?>
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

                            <label for="txtYear" class="required">Year

                             <input type="text" id="txtYear" name="txtYear"
                   			     value = "<?php print $person['fldYear'];?>"
                                  tabindex="100" maxlength="35" placeholder="Year"
                                <?php if ($yearERROR) print 'class="mistake"'; ?>
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
                <?php }
                else {
                
                	print '<p>Name: '.$person['fldFirstName'].' '.$person['fldLastName'].'</p>';
                	print '<p>Gender: '.$person['fldGender'].'</p>';
                	print '<p>Email: '.$person['fldEmail'].'</p>';
                	print '<p>Year: '.$person['fldYear'].'</p>';
                	print '<p>On/Off Campus: ';
                	if($person['fldOnCampus']){
                		print "On";
                	}
                	else{
                		print "Off";
                    }
                    print '</p>';
                    print '<p>Bio: '.$person['fldBio'].'</p>';
                    
                	
                
                }
                
                }
                
                 ?>
             </html>