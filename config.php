<?php

//para ver los errores
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

//_---------------------------------------------------

require_once("db.php");

class Config{

    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    private $ingles;
    private $ser;
    private $review;
    private $skills;
    protected $dbCnx;

    public function __construct($id = 0, $nombres = "", $direccion ="", $logros = "", $ingles="", $ser="", $review = "", $skills = ""){

        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->ingles = $ingles;
        $this->ser = $ser;
        $this->review = $review;
        $this->skills = $skills;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setLogros($logros){
        $this->logros = $logros;
    }

    public function setIngles($ingles){
        $this->ingles = $ingles;
    }

    public function setSer($ser){
        $this->ser = $ser;
    }

    public function setReview($review){
        $this->review = $review;
    }

    public function setSkills($skills){
        $this->skills = $skills;
    }

    


    //gets

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getLogros(){
        return $this->logros;
    }

    public function getIngles(){
        return $this->ingles;
    }

    public function getSer(){
        return $this->ser;
    }

    public function getReview(){
        return $this->review;
    }

    public function getSkills(){
        return $this->skills;
    }

    

    
    //insertar los datos
    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO campers (nombres, direccion, logros, ingles, ser, review, skills) values(?,?,?,?,?,?,?)");
            $stm -> execute([$this->nombres, $this->direccion, $this->logros, $this->ingles, $this->ser, $this->review, $this->skills]);
        } catch (Exception $e) {
            return $e -> getMessage();
        }
        
    }


    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM campers");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM campers WHERE id = ?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado'); document.loation='estudiantes.php'</script>";

        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }


}




?>