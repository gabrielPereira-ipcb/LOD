<?php

include_once("base_dados.php");
$conn = conectar_bd();

$fp = fopen("camionagem.xml","w");

fprintf($fp,"<?xml version='1.0' encoding='UTF-8'?>\n");
fprintf($fp,"<camionagem>\n");

$mostraTabela = $conn-> query("SHOW TABLES");
if ($mostraTabela->num_rows > 0) {
    while ($row = $mostraTabela->fetch_array()) {
        $nomeTabela = $row[0];

        $sql = "SELECT * FROM $nomeTabela";
        $tabelas = $conn->query($sql);

        if ($tabelas->num_rows > 0) {
            $colunas = array_keys($tabelas->fetch_assoc());
            $tabelas->data_seek(0);

            while ($row = $tabelas->fetch_assoc()) {
                fprintf($fp,"\t<$nomeTabela>\n");

                foreach ($colunas as $coluna) {
                    fprintf($fp,"\t\t<$coluna>$row[$coluna]</$coluna>\n");
                }

                fprintf($fp,"\t</$nomeTabela>\n");

            }
        }
    }
}
fprintf($fp,"</camionagem>\n");
fclose($fp);    

echo "criado com sucesso.";
$conn ->close();
?>