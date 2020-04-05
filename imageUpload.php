<?php
    session_start();
    $userdir = $_SESSION["userSes"];
    $target_dir = "images/";

    if (!mkdir($concurrentdir = $target_dir . $userdir) && !is_dir($concurrentdir)){
        throw new \RuntimeExeption(sprintf('Directori "%s" was not created',$concurrentdir));
    }
    $target_file = $target_dir . $userdir . '/' . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = $_FILES["image"]["type"];
    if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      if ($_FILES["image"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      if($imageFileType !== 'image/jpeg') {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";

      } else {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION['img']=$target_file;
                header("Location:private.php");
          } else {
                echo "Sorry, there was an error uploading your file.";
          }
      }
      

    ?>