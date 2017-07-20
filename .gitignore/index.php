<?php
require 'config.php';
$req = $db->query('SELECT*FROM tasks')->fetchAll();
$uname='admin';
$pass='123';
if (isset($_POST)) 
    {   
        $name=$_POST['admin'];
        $password=$_POST['password'];
        if(($name==$uname)&&($password==$pass)){
        session_start();
        $check = 1;
        }
    }
$uplink = $uplink_1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
        <title>Beejee tasks</title>
    </head>
    <body>
       <?php
       if (!isset($_SESSION)) {
       require_once 'header.php';
        }        
        else{
            echo '<a href="logout.php"><input type="button" value="Logout"></a>';
        }
       ?>
        <br><input type="button" value="Upload your comment>>" onclick="window.location.href='upload.php'"></br>

        <div>
            <?php foreach ($req as $row) : ?>
            <map name=m<?= $row['id']?>><area shape=rect coords="170 5 195 30" href=#img<?= $row['id']?>></map> 
        <div id=wrapper>
            <p> 
                <strong>Pseudo: </strong><?= $row['username']?> </br>
                <strong>Email: </strong><?= $row['email']?> </br>
                <strong>Tasks: </strong><?= $row['text']?> </br>
                <strong>Image: </strong>
                <br><img id=img<?= $row['id']?> class=img usemap=#m<?= $row['id']?> src="<?= $row['image']?>"/>
                <a href=# class=close></a>
                <img class=expand src=http://icons.iconarchive.com/icons/icons8/ios7/16/Editing-Expand-icon.png/>
            </p>
            <?php if($check== 1){ ?>
                <form method="get" action="delete.php">
                    <button type="submit" name="delstatus" value="<?= $row['id'];?>">Delete tasks</button>
                </form>
        </div>
        <? } endforeach;?>
        </div>
        <!--
        <div>
            <ul>
                <li><a href="index.php">1</a></li>
                <li><a href="#">2</a></li>
            </ul>
        </div>
            <input type="text" placeholder="name" value="" name="username">
            <input type="email" placeholder="email" value="" name="email">
        -->
        
        
    </body>
</html>
