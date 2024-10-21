<?php

include_once("base_dados.php");
$conn = conectar_bd();

$fp = fopen("camionagem.xml","w");

fprintf($fp,"<?xml version='1.0' encoding='UTF-8'?>\n");
fprintf($fp,"<camionistas>\n");

$resultadoTabelas = $conn-> query("SHOW TABLES");
?>