<?php 
$username = "root";
$password = "";
$database ="sistemaocorrenciaadvertencia";
$servename ="localhost";
$conn = mysqli_connect($servename,$username,$password,$database);

$conexao = mysqli_connect("localhost","root","");
$base =  mysqli_select_db($conexao,"sistemaocorrenciaadvertencia");


?>