<?php 
    require 'conexao.php';
    
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE from tb_aluno where id = $id";
        $result = $conn->query($sql);
        if ($result) {
            echo "<script language='javascript'>
            window.location.href = 'editar_aluno.php';
            </script>";
            

        } else {
            echo "<script language='javascript'>window.alert('Comando não execultado');</script>";
        }
    } else {
        echo "<script language='javascript'>window.alert('Algo deu errado');</script>";

    }
?>