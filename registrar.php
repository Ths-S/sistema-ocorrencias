<?php 
    require 'conexao.php';

    $nome = $_POST['pnome'];
    $sobrenome = $_POST['snome'];
    echo $email = $_POST['email'];
    echo $data_nasc = $_POST['dt_nasc'];
    echo $senha1 = $_POST['senha'];
    echo $senha2 = $_POST['rsenha'];

    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    } else {

    }
/*
    $sql = "SELECT email from tb_professor;";
    $sql2 = "SELECT email from tb_aluno";
    $result = $conn->multi_query($sql);
    $row = $result->fetch_assoc();
    $result2 = $conn->multi_query($sql2);
    $row2 = $result2->fetch_assoc();
    */

    if ($senha1 == $senha2 ) {
        $senha = md5($senha1); 
        if (isset($tipo)) {


        } else {
            $sql = "INSERT into tb_cadastra (nome, sobrenome, dt_nasc, email, senha) values ('$nome','$sobrenome', '$data_nasc', '$email', '$senha')";
            $result = $conn->query($sql);
            if ($result) {
    
                echo "<script language='javascript'>
                window.alert('Cadastro realizado com sucesso!!! Agora entre');
                window.location.href = 'login.html';
            </script>"; 
            } else {
                echo "<script language='javascript'>
                    window.alert('Houve algum problema ao realizar o seu cadastro');
                    window.location.href = 'register.html';
                </script>"; 
            };            
        }

    } else {
        echo "<script language='javascript'>
            window.alert('as senhas não são iguais');
            window.location.href = 'register.html';
        </script>";     
    }





?>