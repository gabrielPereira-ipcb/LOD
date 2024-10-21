<!-- <?php
    $fp = fopen("empCam","w");
    include_once("base_dados.php");
    $conn = conectar_bd();

    $sql = "SHOW TABLES FROM lodtransdb";  //aparecer mais tarde de forma dinamica

    $result = mysqli_query($conn, $sql);
    $hn = "<!ELEMENT lodtransdb (";
    while( $tab = mysqli_fetch_row($result) ) 
        $hn .= $tab[0]. ',';

        fprintf($fp,'', $hn);

        fclose($fp);


?> -->


<?php
// Abrir o arquivo para escrita
$fp = fopen("empCam.xml", "w");

include_once("base_dados.php");
$conn = conectar_bd();

// SQL para pegar as tabelas do banco de dados de forma dinâmica
$sql = "SHOW TABLES FROM lodtransdb";
$result = mysqli_query($conn, $sql);

// Iniciar a estrutura do DTD em XML
$hn = "<!ELEMENT empresa_camionagem (";

// Loop para adicionar as tabelas na estrutura DTD
$tables = [];
while( $tab = mysqli_fetch_row($result) ) {
    $tables[] = $tab[0]; // Armazena cada tabela num array
}

// Adicionar as tabelas separadas por vírgula
$hn .= implode(',', $tables);

// Fechar a declaração do DTD
$hn .= ")>\n";

// Escrever a estrutura no arquivo XML
fprintf($fp, '%s', $hn);

// Fechar o arquivo
fclose($fp);

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
