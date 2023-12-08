<?php 
    require 'conexao.php';
    
    $id = $_POST['id'];
    $ano = $_POST['ano'];
    $curso = $_POST['curso'];

    echo $sql = "UPDATE tb_turma set ano = '$ano', curso = '$curso' where id = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script language='javascript'>
        window.location.href = 'editar_turma.php';</script>
        ";

    } else {

    }