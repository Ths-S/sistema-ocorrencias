<?php
include "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$select = "select count(*) as total, id, nome, email,senha from tb_cadastra where email = '".$email."' and senha = '".$senha."' and status=1";

$query =  mysqli_query($conexao,$select);
$linha =  mysqli_fetch_assoc($query);

if($linha['total']==1){
    session_start();
    $_SESSION['id'] = $linha['id'];
    $_SESSION['nome'] = $linha['nome'];

    echo ("<script LANGUAGE='JavaScript'>
  window.alert('Login realizado com sucesso.');
  window.location.href='index.php';
  </script>");
}

else {
    echo '<script type="text/javascript">alert("Não é possivel logar. Consulte o administrador.");</script>';
    echo "<script>history.go(-1)</script>";

}



?>