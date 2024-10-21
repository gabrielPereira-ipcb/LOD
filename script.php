<?php
//fazer o script para criar um ficheiro xml. buscar todas as tabelas e de todas acs colunas todos os nomes. Abrir e fechar ......
include_once("base_dados.php");
$conn = conectar_bd();

//fazer select de todas as tabelas daquela base de dados num ciclo
$sql = "SELECT * FROM camionista";
$result = $conn->query($sql);



echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<camionistas>";


if ($result->num_rows > 0) {

    $columns = array_keys($result->fetch_assoc());

    // $result->data_seek(0);


    while ($row = $result->fetch_assoc()) {
        echo "<camionista>";

    
        foreach ($columns as $column) {
            echo "<$column>" .htmlspecialchars("<"). $column.htmlspecialchars("> "). $row[$column].  htmlspecialchars(" </").$column. htmlspecialchars("> ") ."</$column>";
        }

        echo "</camionista>";
    }
} else {
    echo "<mensagem>Nenhum motorista encontrado.</mensagem>";
}

echo "</camionistas>";


$conn->close();

?>
