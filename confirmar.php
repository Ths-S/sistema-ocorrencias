<?php 
require 'conexao.php';

 $ocorrencia = $_POST['ocorrencia'];
 $turma = $_POST['turma']; 
 $id_a = $_POST['id_a'];
 $outros = $_POST['outros'];

if ($turma == 'Selecione a Turma') {
    echo "
    <script language='javascript'>
        window.alert('Selecione a Turma');
        window.location.href = 'tables3.php';
    </script>
    ";
} else if ($ocorrencia == 'Selecione o tipo de ocorrencia') {
    echo "
    <script language='javascript'>
        window.alert('Selecione o tipo de ocorrencia ');
        window.location.href = 'tables3.php';
    </script>
    ";
} else {
    // Use prepared statements para evitar injeção de SQL
    $sql = "INSERT INTO tb_ocorencia (id_a, ocorrencia, turma, outros) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $id_a, $ocorrencia, $turma, $outros);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script language='javascript'>
            window.alert('Registrado');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo 'Erro: ' . mysqli_error($conn);
}

}

?>