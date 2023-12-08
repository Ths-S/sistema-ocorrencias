<?php
session_start();
include('conexao.php');
$conn
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

    $listar = $conn->prepare("SELECT * FROM tb_cadastra where id='id'");
    $listar->execute();
    $lista = $listar->fetch(PDO::FETCH_ASSOC);

    ?>

    

    <form method="POST";
        <input type='text' name='nome' placeholder='Nome' value='<?php echo $lista["nome"]; ?> '> 
        <input type='text' name='sobrenome' placeholder='Sobrenome' value='<?php echo $lista["nome"]; ?>'>
        <input type='text' name='email' placeholder='E-Mail' value='<?php echo $lista["nome"]; ?>'> 
        <input type='submit' name='editar' placeholder='' value='Editar'>


</body>
</html>
