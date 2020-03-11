<?php
  ob_start();
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $error) {
    echo 'Error: ' . $error -> getMessage();
  }
?>