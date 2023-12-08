<?php
$servername = "sql112.infinityfree.com";

$username = "if0_34931531";
$password = "34sRDrwXq2h15sx";
$database = "if0_34931531_agendamento";
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifique se o email já existe
$email = $_POST['email'];
$check_email_query = "SELECT COUNT(*) as total FROM tb_professores WHERE email = '$email'";
$result = mysqli_query($conn, $check_email_query);
$row = mysqli_fetch_assoc($result);

if ($row['total'] >= 1) {
    echo '<script type="text/javascript">alert("Este email já está cadastrado. Tente novamente com um email diferente.");</script>';
    echo "<script>history.go(-1)</script>";
} else {
    // O email não existe, então podemos inserir o novo registro
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $disciplina = $_POST['disciplina'];
    $senha = $_POST['senha'];

    $insert = "INSERT INTO tb_professores (nome, sobrenome, email, disciplina, senha) VALUES ('$nome', '$sobrenome', '$email', '$disciplina', '$senha')";
    $query = mysqli_query($conn, $insert);

    if ($query) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Cadastro realizado com sucesso.')
                window.location.href='logar.html';
                </SCRIPT>");
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Existem inconsistências em seu agendamento. Tente novamente.')
        window.location.href='cadastro.html';
        </SCRIPT>");
    }
}

mysqli_close($conn);
?>
