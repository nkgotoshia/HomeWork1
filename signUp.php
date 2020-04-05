<!DOCTYPE html>
<html>
<head>
<style>

  label
  {
    text-align:left;
    display: block;
    padding-bottom: 10px;
    font-family:sans-serif;
    font-size:14px;
    cursor:pointer;
    color:#795548;
  }
  form
  {
    max-width: 263px;
    margin: auto;
  }
  h1
  {
    text-align:center;
    font-family:sans-serif;
    font-weight:bold;
    color:#795548;
  }
  input
  {
    width: 100%;
  }
  body
  {
   background-color: rgba(255, 120, 0, 0.04);
  }
  .registrationInfo
  {
    text-align: center;
    width: 100%;
  }
  #registerID
  {
    width: auto;
    border:none;
    background:#FF5722;
    color:#fff;
    border-radius:5%;
    padding:3px;
    transform: translateX(85px);
  }
  .error
  {
    font-size: 7px;
    font-weight:bold;
    text-align: right;
    color: red;
    padding: 5px 0;
  }
  #HomePage
  {
    color: red;
    transform: translateX(20033px);
  }
</style>

	<title></title>
</head>
<body>

<?php 
	$ErrUserName ="";
	$userName = "";
	$lowercase = "";
	$ErrEmail= "";
	$email = "";
  $firstName = "";
  $ErrFirstName = "";
  $ErrLastName = "";
  $lastName = "";
  $ErrPasswordRepeat= "";
  $password = "";
  $ErrPassword= "";
  $repeatPassword= "";

  $userErr=0; 
  $err = 0;
  $successfully =0;

  if (isset($_POST["buttonClick"]))
  {
   if (empty($_POST["userName"])) $ErrUserName = "Enter Username ";
   else 
    {
    $userName = $_POST["userName"];
    $lowercase = strtolower($userName);

    if ($userName != $lowercase)
    {
      $ErrUserName = $ErrUserName . " Small letters only. ";
      $userErr++;
    }
    if (strlen($userName)<5 || strlen($userName)>10) 
    {
      $ErrUserName = $ErrUserName . " Min 5 and Max 10 Characters";
      $userErr++;
    } 

    if ($userErr == 0) $successfully++; 
  }
  
  if (empty($_POST["email"])) $ErrEmail = "Enter Email ";
  else 
  {
    $email = $_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) $successfully++;
    else $ErrEmail ="$email is not valid email";
  }
    
  if (empty($_POST["firstName"])) $ErrFirstName = "Enter First Name ";
  else 
  {
    $firstName = $_POST["firstName"];
    $successfully++;
  }

  if (empty($_POST["lastName"])) $ErrLastName = "Enter Last Name ";
  else 
  {
    $lastName = $_POST["lastName"];
    $successfully++;;
  }

  if (empty($_POST["password"])) $ErrPassword = "Enter Password ";
  else 
  {
    $password = $_POST["password"];
    if (strlen($password)<8 || strlen($password)>16)
    {
      $ErrPassword = $ErrPassword . " Min 8 and Max 16 Characters.";
      $err++;
    }
    if (!preg_match("#[a-z]+#", $password)) 
    {
      $ErrPassword = $ErrPassword . " You need alphabet and number symbols";
      $err++;
    }
      else if(!preg_match("#[0-9]+#", $password))
      {
        $ErrPassword = $ErrPassword . " You need alphabet and number symbols";
        $err++;
      }
    if ($err == 0) $successfully++;
  }

  if (empty($_POST["repeatPassword"])) $ErrPasswordRepeat = "Enter Repeated Password";
  else 
  {
    $repeatPassword = $_POST["repeatPassword"];

    if ($repeatPassword != $password) $passwordrepeatErr = "Enter Repeated Password ";
  }
}

?>

<h1>User Registration</h1>

<form method="post" action="signUp.php">  
  
  <label> Username: </label> <div class="registrationInfo"> <input type="text" name="userName" placeholder="Enter Username" class="user-plc"> </div>
  <label class="error"><?php echo $ErrUserName;?></label>

  <label> First Name: </label><div class="registrationInfo"> <input placeholder="Enter First Name" type="text" name="firstName">
    </div>
  <label class="error"><?php echo $ErrFirstName;?></label>

  <label> Last Name: </label><div class="registrationInfo"> <input placeholder="Enter Last Name" type="text" name="lastName"></div>
  <label class="error"><?php echo $ErrLastName;?></label>

  <label> Email: </label><div class="registrationInfo"><input placeholder="Enter Email" type="text" name="email" class="email-plc"></div>
  <label class="error"><?php echo $ErrEmail;?></label>

  <label> Password: </label> <div class="registrationInfo"> <input placeholder="Enter Passowrd" type="password" name="password" class="password-field"></div>
  <label class="error"><?php echo $ErrPassword;?></label>

  <label> Repeat Password: </label> <div class="registrationInfo"> <input placeholder="Enter Repeated Password" type="password" name="repeatPassword"></div>
  <label class="error"><?php echo $ErrPasswordRepeat;?></label>


<div class="registrationInfo" > <input type="submit" name="buttonClick" value="Registrater Now" id="registerID"> </div>
<a href="login.php" id = "HomePage">Home Page</a> 

</form>

<?php
  if ($successfully==5)
  {
    ?>

      <h3>
        <span>
<?php print("Now You're Registered As"); echo "<br>"; ?>
      </span></h3>
<?php
      print ("Username: ". $userName); echo "<br>";
      print ("Lastname: ". $lastName); echo "<br>";
      print ("Firstname: ". $firstName); echo "<br>";
      print ("Email: ". $email); echo "<br>";
  } 
  ?>
  </div>
</body>
</html>