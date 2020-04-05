<?php

$empty_user='';
$empty_password='';

if(isset($_POST["submit"]))
{

    if(preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$_POST["username"]))
    {
        
    }

    else if(empty($_POST["username"]) || strlen($_POST["username"])<3)
    {
        $empty_user="Not Enough Characters (min 3)";
    }

    else
    {
        $empty_user="Invalid Username";
    }

    if(preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$_POST["password"])) 
    {
        
    }

    else if(empty($_POST["password"]))
    {
        $empty_password="Insert Password";
    }
    else if(strlen($_POST["password"])<6 || strlen($_POST["password"])>18)
    {
        $empty_password="Min 6 - 18 Max";
    }

    else
    {
        $empty_password="(At least one digit and Capital letter)";
    }

    if(empty($empty_user) == true || empty($empty_password) == true)
    {
        header("Location:private.php");
        session_start();
        $_SESSION["userSes"]=$_POST["username"];
        $_SESSION["passwordSes"]=$_POST["password"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nika Gotoshia</title>
     <style>
    *
    {
        margin:0;
        box-sizing:border-box;
        padding:0;
    }
    div
    {

        flex-direction: column;
        display:flex;
        justify-content:space-between;
        padding-bottom:20px;
    }
    label
    {
        padding-bottom: 10px;
        font-family:sans-serif;
        font-size:14px;
        cursor:pointer;
        color:#795548;
    } 
    input
    {
        height: 22px;
        padding-left:5px;
        border: 1px solid #e78e0c;
        cursor:pointer;
    } 
    section
    {
        padding-top:120px;
        max-width:250px;
        margin:auto;
    }
    label:after,input:after
    {
        display:block;
        content:" ";
        clear:both;
    }
    h1
    {
        text-align:center;
        padding-bottom:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:#795548;
    }
    body
    {
         background-color: rgba(255, 120, 0, 0.04);
    }
    #sub
    {
        padding:0;
        border:none;
        float:right;
        display:block;
        background:#FF5722;
        color:#fff;
        border-radius:5%;
        width:55px;
        padding:3px;
    }
    #sub:after
    {
        display:block;
        clear:both;
        content:" ";
    }
    .red-text
    {
        margin:0;
        color:red;
        font-size:10px;
    }
    .red-field
    {
        position:absolute;
        right:0;
        bottom:0;
        padding:0px;
        padding-bottom:5px;
        padding-right:5px;
    }
    .box
    {
        display:block;
        padding:0;
        position:relative;
    }
    .red-text
    {
        padding:0;
    }
    a
    {
        color: red;
    }
    
    </style>
</head>
<body>
<section>
<h1>Login</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

<div class="box">
    <div>
    <label for="user-ident">Username</label>
    <input type="text" name="username" id="user-ident" placeholder="Username">
    </div>

    <div class="red-field">
    <div class="red-text"><?php echo $empty_user; ?></div>

</div>

</div>

<div class="box">

    <div>
        <label for="pass-ident">Password</label>
        <input type="password" name="password" id="pass-ident" placeholder="Password">
    </div>

    <div class="red-field">
        <div class="red-text"><?php echo $empty_password; ?></div>
</div>

</div>

<input type="submit" id="sub" name="submit">
<a href="signUp.php">Registration</a>
</form>

</section>

</body>
</html>