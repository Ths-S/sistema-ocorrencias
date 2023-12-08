<?php 

    require 'conexao.php';
    $nome = $_POST['nome'];
    $id_t = $_POST['turma'];

    $sql = "INSERT into tb_aluno (nome, id_turma) values ('$nome', '$id_t')";
    $result = $conn->query($sql);
    if($result){
        header('Location: pesquisar_aluno.php');
    } else {
        echo "algo deu errado";
    }