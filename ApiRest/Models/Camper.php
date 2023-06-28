<?php
//Cometado, usar sólo para pruebas de funciones directamente en el archivo de modelo ( http://localhost/ArTeM01-047/Reto/ApiRest/Models/Camper.php )
/* 
require_once "../Config/Conectar.php"; */

class Camper extends Conectar{
    private $IdCamper;
    private $NombreCamper;
    private $ApellidoCamper;
    private $FechaNacimiento;
    private $IdRegion;
    public function __construct($IdCamper=0, $NombreCamper=NULL, $ApellidoCamper=NULL, $FechaNacimiento=NULL, $IdRegion=NULL)
    {
        $this->IdCamper = $IdCamper;
        $this->NombreCamper = $NombreCamper;
        $this->ApellidoCamper = $ApellidoCamper;
        $this->FechaNacimiento = $FechaNacimiento;
        $this->IdRegion = $IdRegion;
        Parent::__construct();
    }

    public function __get($Property){
        if(property_exists($this, $Property)){
            return $this->$Property;
        }
    }

    public function __set($Property, $Value){
        if(property_exists($this, $Property)){
            $this->$Property= $Value;
        }
    }

    public function Fetch(){
try {
    $stm=$this->DbCnx->prepare("SELECT * FROM Campers");

    $stm->execute();

    return $stm->fetchAll();

} catch (PDOException $e) {
    return $e->getMessage();
}
    }

public function FetchOne(){
    try {
        $stm=$this->DbCnx->prepare("SELECT * FROM Campers WhERE IdCamper = ?");
        $stm->execute([$this->IdCamper]);
        return $stm->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
        }


public function Insert(){
    try {
        $stm=$this->DbCnx->prepare("INSERT INTO Campers VALUES (?,?,?,?,?)");
        $stm->execute([$this->IdCamper,
        $this->NombreCamper,
        $this->ApellidoCamper,
        $this->FechaNacimiento,
        $this->IdRegion]);

    } catch (PDOException $e) {
        return $e->getMessage();
    }
        }


public function Delete(){
    try {
        $stm=$this->DbCnx->prepare("DELETE FROM Campers WHERE IdCamper = ?");
        $stm->execute([$this->IdCamper]);

    } catch (PDOException $e) {
        return $e->getMessage();
    }
        }


public function Update($OldId){
    try {
        $stm=$this->DbCnx->prepare("UPDATE Campers SET IdCamper = ?,
        NombreCamper = ?,
        ApellidoCamper = ?,
        FechaNacimiento = ?,
        IdRegion = ? WHERE IDCamper = ?");
        $stm->execute([$this->IdCamper,
        $this->NombreCamper,
        $this->ApellidoCamper,
        $this->FechaNacimiento,
        $this->IdRegion,$OldId]);

    } catch (PDOException $e) {
        return $e->getMessage();
    }
        }

}


$Camper = new Camper();
//solo Fetch
/* $Fetch =$Camper->Fetch(); 
var_dump($Fetch);
*/


//Sólo Fetch One
/* $Camper->IdCamper=333;
echo$Camper->IdCamper;
$FetchOne = $Camper->FetchOne();
var_dump($FetchOne); */


//Insert y Fetch para comprobar el insert
/* $Camper->IdCamper = 999;
$Camper->NombreCamper = "NombreCamper";
$Camper->ApellidoCamper = "ApellidoCamper";
$Camper->FechaNacimiento = '2000-01-31';
$Camper->IdRegion = 222;

$Camper->Insert(); 
$Fetch =$Camper->Fetch(); 
var_dump($Fetch);
*/


//Fetch Delete y Fetch de nuevo para comprobar el cambio (la eliminación) 
/* $Fetch =$Camper->Fetch(); 
var_dump($Fetch);
echo "<br>se borra<br>";
$Camper->IdCamper = 999;
echo$Camper->IdCamper;
$Camper->Delete();

$Fetch =$Camper->Fetch(); 
var_dump($Fetch); */


//Fetch Update y Fetch de nuevo para comprobar el cambio (la actualización) 
/* $Fetch =$Camper->Fetch(); 
var_dump($Fetch);
echo "<br>se Actualiza<br>";
$Camper->IdCamper = 777;
$Camper->NombreCamper = "jhon";
$Camper->ApellidoCamper = "Doe";
$Camper->FechaNacimiento = '1999-12-24';
$Camper->IdRegion = 111;
$Camper->Update(999);

$Fetch =$Camper->Fetch(); 
var_dump($Fetch); */

?>