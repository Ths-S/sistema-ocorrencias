<?php 
        require "conexao.php";

    $sql = "SELECT * FROM tb_ocorencia";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['data']."</td>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['turma']."</td>";
        echo "<td>".$row['ocorrencia']."</td>";
        echo "<td>".$row['outros']."</td>";
        echo "</tr>";
    }
    ?>

    