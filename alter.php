<?php 
    require 'conexao.php';
    
    $aluno = $_POST['aluno'];
    $turma = $_POST['id_turma'];
    $id_aluno = $_POST['id_aluno'];

    $sql = "UPDATE tb_aluno set nome = '$aluno', id_turma = $turma where id = $id_aluno";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script language='javascript'>
        window.location.href = 'editar_aluno.php';</script>
        ";

    }