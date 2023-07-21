<?php
include('connect.php');
$id = ($_POST['id']);
$qry = "SELECT `id`, `stateName` FROM `state` WHERE countryId='$id'";
$stmt = $con->prepare($qry);
$stmt->execute();
$arrState=$stmt->fetchAll(PDO::FETCH_ASSOC);
$html='';
foreach($arrState as $state){
    $html.= '<option value='.$state['id'].'>'.$state['stateName'].'</option>';
}
echo $html;
$sid = ($_POST['sid']);
$qry = "SELECT `id`, `distName` FROM `dist` WHERE stateId='$sid'";
$stmt = $con->prepare($qry);
$stmt->execute();
$arrDist=$stmt->fetchAll(PDO::FETCH_ASSOC);
$html='';
foreach($arrDist as $dist){
    $html.= '<option value='.$dist['id'].'>'.$dist['distName'].'</option>';
}
echo $html;
?>