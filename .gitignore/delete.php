<?php
require 'config.php';
$delstatus = $_GET['delstatus'];
$req = $db->query('DELETE FROM tasks WHERE id= '.$_GET['delstatus'].'');

header('Location:index.php');