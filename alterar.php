<?php 
require 'conexao.php';

    $sql="SELECT * from tb_usuario where email = '$email'";
    require 'conexao.php';
    $result = $base->query($sql);
    
    if ($result->num_rows>0) {
        echo "resultado encontrado"; 
        $sql="UPDATE tb_usuario set senha = '$senha' where email = '$email'";
        $result = $base->query($sql);
        echo "ok";
    } else {
        echo "resultado não encontrado  ";
    }