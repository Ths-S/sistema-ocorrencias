<?php
require 'conexao.php';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify if the email already exists
$email = $_POST['email'];
$check_email_query = "SELECT COUNT(*) as total FROM tb_cadastra WHERE email = ?";
$stmt = $conn->prepare($check_email_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();

if ($total >= 1) {
    echo '<script type="text/javascript">alert("Este email já está cadastrado. Tente novamente com um email diferente.");</script>';
    echo "<script>history.go(-1)</script>";
} else {
    // The email doesn't exist, so we can insert the new record
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $insert = "INSERT INTO tb_cadastra (nome, sobrenome, email, senha, status) VALUES (?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha);

    if ($stmt->execute()) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Cadastro realizado com sucesso.')
                window.location.href='logar.php';
                </SCRIPT>");
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Existem inconsistências em seu agendamento. Tente novamente.')
        window.location.href='cadastro.html';
        </SCRIPT>");
    }
}

// Close the database connection
$conn->close();
?>