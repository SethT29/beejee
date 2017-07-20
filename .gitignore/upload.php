<?php
require 'config.php';
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        echo "<script type='text/javascript'>alert('File is an image - " . $check["mime"] . ".')</script>";
        
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        echo '<script type="text/javascript">alert("File is not an image.");</script>';
        $uploadOk = 0;
    }
    // Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    echo '<script type="text/javascript">alert("Sorry, file already exists.");</script>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    echo '<script type="text/javascript">alert("Sorry, your file is too large.");</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    echo '<script type="text/javascript">alert("Sorry, your file was not uploaded.");</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script type='text/javascript'>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.!')</script>";
        
        
    } else {
        echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.!");</script>';
    }
}

}
if(isset($_POST['username'])){
    $req=$db->prepare('INSERT INTO tasks (username,email,text,image) VALUES (?,?,?,?)');
    $image = 'img/'.basename( $_FILES['fileToUpload']['name']);
    $req->execute(array($_POST['username'],$_POST['email'],$_POST['tasks'],$image));
}
?>
<div id="Load_Comment">
            <form method="post" action="upload.php" enctype="multipart/form-data" id="usrform">
                <p><input type="text" name="username" placeholder="user"></br></p>
                <p><input type="email" name="email" placeholder="email"></br></p>
                <p><textarea rows="20" cols="20" name="tasks" placeholder="Enter Tasks here...." ></textarea></br></p>
              Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                 <input type="submit" value="Upload" name="submit">
                
            </form> 
            
</div>
<h1><input type="button" value="<<Home" onclick="window.location.href='index.php'"></h1>
    