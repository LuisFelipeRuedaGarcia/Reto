<?php
class Conectar{
    protected $DbCnx;
    Public function __construct()
    {
        $this->DbCnx = new PDO("mysql:host=localhost;dbname=CampusLands","campus","campus2023",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    }
}
?>