<?php

//para ver los errores
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("config.php");

    $config = new Config();

    $config->setNombres($_POST['nombres']);
    $config->setDireccion($_POST['direccion']);
    $config->setLogros($_POST['logros']);
    $config->setIngles($_POST['ingles']);
    $config->setSer($_POST['ser']);
    $config->setReview($_POST['review']);
    $config->setSkills($_POST['skills']);


    $config-> insertData();

    echo "<script> alert('Los datos Fueron Guardados Satisfactoriamente'); document.location='estudiantes.php'</script>";

}


?>