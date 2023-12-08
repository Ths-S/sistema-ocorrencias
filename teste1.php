<?php 
        require 'conexao.php';
        $sql = "select cast(count(*)*100 / (select count(*) from tb_ocorencia) as dec(3,0)) as quantidade, ocorrencia from tb_ocorencia group by ocorrencia order by quantidade desc limit 4;";
        $result = $conn->query($sql);
        $abc = 0;
        while ($row = $result->fetch_assoc()) {
            $abc = $abc + intval($row['quantidade']);

        }
        echo $abc;