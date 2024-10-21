<?php

include_once("base_dados.php");
$conn = conectar_bd();

$sql = 'SHOW DATABASES';
$result = $conn->query($sql);

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo '<empresa_camionagem>';

/*
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        echo '<motorista>';
        echo '<nome>' ($row['nome'])
    }
}
*/

//$set = mysql_query('SHOW DATABASES;');
while ($row = $result -> fetch_array())
{
   echo $row;
}

?>