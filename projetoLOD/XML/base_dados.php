<?php
    function conectar_bd(){
        $conn = mysqli_connect("localhost","root","","lodtransdb")
            or die("não foi possivel conectar a base de dados");

        return $conn;
    }

    function desconectar_bd($conn){
        mysqli_close($conn);
    }
?>