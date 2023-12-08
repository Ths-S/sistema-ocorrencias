<?php 

    require 'conexao.php';
    $ano = $_POST['ano'];
    $curso = $_POST['curso'];

    $sql = "INSERT into tb_turma (ano, curso) values ('$ano', '$curso')";
    $result = $conn->query($sql);
    if($result){
        header('Location: pesquisar_turma.php');
    } else {
        echo "algo deu errado";
    }