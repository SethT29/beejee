<?php

 try {
     $db = new PDO ('mysql:host=localhost; dbname=beejee','root','root');
    
} catch (Exception $exc) {
    die('Error :'.$exc->getMessage());
}