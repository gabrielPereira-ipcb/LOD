<?php
// Abrir o arquivo para escrita
$fp = fopen("empCamXSD.xml", "w");

if (!$fp) {
    die("Erro ao abrir o arquivo para escrita.");
}

include_once("base_dados.php");
$conn = conectar_bd();

// Escreve o cabeçalho do XML
fwrite($fp, "<?xml version='1.0' encoding='UTF-8'?>\n");
fwrite($fp, "<database>\n");

// Obter todas as tabelas do banco de dados
$sql = "SHOW TABLES FROM lodtransdb";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_row($result)) {
        $tableName = $row[0];

        // Adicionar nome da tabela no XML
        fwrite($fp, "\t<table name='$tableName'>\n");

        // Obter as colunas da tabela
        $columnsSql = "SHOW COLUMNS FROM $tableName";
        $columnsResult = mysqli_query($conn, $columnsSql);

        if ($columnsResult && mysqli_num_rows($columnsResult) > 0) {
            while ($column = mysqli_fetch_assoc($columnsResult)) {
                $columnName = $column['Field'];
                $columnType = $column['Type'];

                // Adicionar coluna no XML
                fwrite($fp, "\t\t<column name='$columnName' type='$columnType' />\n");
            }
        }

        fwrite($fp, "\t</table>\n");
    }
} else {
    fwrite($fp, "\t<error>Nenhuma tabela encontrada no banco de dados.</error>\n");
}

// Fechar a tag principal do XML
fwrite($fp, "</database>\n");

// Fechar o arquivo e a conexão
fclose($fp);
mysqli_close($conn);

echo "Arquivo empCamXSD.xml criado com sucesso!";
?>

