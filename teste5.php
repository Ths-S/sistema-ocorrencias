<?php
session_start();
include('conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_GET['id'])):
        $id = $_GET['id'];
    endif;

    $sql = ("SELECT * FROM tb_cadastra where id='$id'");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(isset($_POST['editar'])):
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];

        $alterar = $conn->prepare("UPDATE tb_cadastra set nome = '$nome', sobrenome = '$sobrenome', email = '$email' where id='$id'");
        $alterar->execute();

        if($alterar):
            header('Location: teste5.php');
        endif;

    ?>



    

    <form method="POST";
        <input type='text' name='nome' placeholder='Nome' value='<?php echo $row["nome"]; ?> '> 
        <input type='text' name='sobrenome' placeholder='Sobrenome' value='<?php echo $row["sobrenome"]; ?>'>
        <input type='text' name='email' placeholder='E-Mail' value='<?php echo $row["email"]; ?>'> 
        <input type='submit' name='editar' placeholder='' value='Editar'>


</body>
</html>
