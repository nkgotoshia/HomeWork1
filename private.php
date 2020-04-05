<?php 

    if(isset($_POST["submit"]))
    {
       session_destroy();
       header("Location:login.php");
    }
     session_start();
     $name=$_SESSION["userSes"];
     $password=$_SESSION["passwordSes"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <style>
        *
     {
        margin:0;
        padding:0;
        box-sizing:border-box;
     }
     h1
     {
        font-size:25px;
        padding-bottom:15px;
     }
     body
     {
        background-color: rgba(255, 120, 0, 0.04);
     } 
     p
     {
        padding-bottom:10px;
     }
     section
     {
        max-width:300px;
        margin:auto;
        padding-top:50px;
        text-align:center;
        font-family:sans-serif;
        color:#795548;
     }
     .greeting
     {
        line-height:50px;
        float:right;
        font-family:sans-serif;
        padding-right:15px;
        font-size:12px;
        color:#fff;
        font-family:sans-serif;
     }
     .greeting:after
     {
        display:block;
        content:"";
        clear:both;
     }
     .welcome
     {
        line-height:50px;
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        font-family: sans-serif;
        font-size:23px;
        color:#fff;
        letter-spacing:0.5px;
     }

     .logout
     {
        width: auto;
        padding: 5px;
        border: none;
        background:#FF5722;
        color: #fff;
        cursor:pointer;
     }
     .image-preview
     {
        max-width:170px;
        min-height:100px;
        border:2px solid #dddddd;
        margin: 20px auto;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:bold;
        color:#cccccc;
     }
     .image-preview_image
     {
        display:none;
        width:100%;
     }
     .file
     {
        padding:10px 0;
     }
     img{
        max-width:170px;
        min-height:100px;
     }
    </style>

</head>

<body>


<section>

    <h1>Profile</h1>
    <h5>Upload Picture</h5>
    <form action="imageUpload.php" method="post" enctype="multipart/form-data"> 
    <input class="file" type="file" name="image">
    <input type="submit" value="upload" name= "submit">
    </form>
    <p>Your Username:<span><?php echo "$name"; ?></span></p>
    <p>Your Password:<span><?php echo "$password"; ?></span></p>
    <img src="<?php print $_SESSION['img'];  ?>" alt="IMG">
    <form action="login.php" method="POST">
    <input type="submit" name="submit1" value="Sign Out" class="logout">
    </form>
    
</section>

</body>
</html>