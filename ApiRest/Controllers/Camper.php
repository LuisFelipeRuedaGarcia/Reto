<?php
header("Content-Type: application/json");
 require_once "../Config/Conectar.php";
 require_once "../Models/Camper.php";
$Camper = new Camper();
$Body = json_decode(file_get_contents("php://input"),true);
 switch($_GET["op"]){
    case "GetAll":
        $Fetch = $Camper->Fetch();
        echo json_encode($Fetch, true);
    break;
    case "GetOne":
        $Camper->IdCamper = $Body["IdCamper"];
        $FetchOne = $Camper->FetchOne();
        echo json_encode($FetchOne, true);
    break;
    case "Insert":
/*         $Camper->IdCamper = 999;
        $Camper->NombreCamper = "NombreCamper";
        $Camper->ApellidoCamper = "ApellidoCamper";
        $Camper->FechaNacimiento = '2000-01-31';
        $Camper->IdRegion = 222;
        $Camper->Insert(); */
        $Camper->IdCamper = $Body["IdCamper"];
        $Camper->NombreCamper = $Body["NombreCamper"];
        $Camper->ApellidoCamper = $Body["ApellidoCamper"];
        $Camper->FechaNacimiento = $Body["FechaNacimiento"];
        $Camper->IdRegion = $Body["IdRegion"];
        $Camper->Insert(); 
    break;
    case "Delete":
        $Camper->IdCamper = $Body["IdCamper"];
        $Camper->Delete();
    break;
    case "Update":
        $Camper->IdCamper = $Body["IdCamper"];
        $Camper->NombreCamper = $Body["NombreCamper"];
        $Camper->ApellidoCamper = $Body["ApellidoCamper"];
        $Camper->FechaNacimiento = $Body["FechaNacimiento"];
        $Camper->IdRegion = $Body["IdRegion"];
        $OldId=$Body["OldId"];
        $Camper->Insert($OldId);
 }
?>