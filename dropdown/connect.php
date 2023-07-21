<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=dropdown","root","");
}catch(PDOExection $e){
    echo $e->getMessage();
}
?>