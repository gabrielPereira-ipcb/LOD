<?php
include_once("base_dados.php");
$conn = conectar_bd();

// Nome do arquivo XML
$xmlFile = 'teste.xml';

// Abre o arquivo para escrita
$fp = fopen($xmlFile, 'w');

if (!$fp) {
    die('Erro ao abrir o arquivo XML para escrita.');
}

// Início do XML
fwrite($fp, "<?xml version='1.0' encoding='UTF-8'?>\n");
fwrite($fp, "<camionistas>\n");

// Seleciona todas as tabelas na base de dados (adaptar ao seu caso)
$tablesResult = $conn->query("SHOW TABLES");

if ($tablesResult->num_rows > 0) {
    while ($tableRow = $tablesResult->fetch_array()) {
        $tableName = $tableRow[0];
        
        // Fazer select de todas as colunas de cada tabela
        $sql = "SELECT * FROM $tableName";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $columns = array_keys($result->fetch_assoc());
            $result->data_seek(0); // Retornar ao início do resultado

            // Itera pelos dados
            while ($row = $result->fetch_assoc()) {
                fwrite($fp, "\t<camionista>\n");

                foreach ($columns as $column) {
                    $value = htmlspecialchars($row[$column], ENT_QUOTES, 'UTF-8');
                    fwrite($fp, "\t\t<$column>$value</$column>\n");
                }

                fwrite($fp, "\t</camionista>\n");
            }
        } else {
            fwrite($fp, "\t<mensagem>Nenhum motorista encontrado na tabela $tableName.</mensagem>\n");
        }
    }
}

// Fechar a tag principal
fwrite($fp, "</camionistas>\n");

// Fecha o arquivo XML
fclose($fp);

echo "Arquivo XML '$xmlFile' criado com sucesso.";

$conn->close();
?>
