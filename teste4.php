<?php 

require 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    <?php
        $sql = "SELECT * from tb_cadastra";

        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
    ?>
<li><?php echo $row['id']; ?> - <?php echo $row['nome']; ?> - <?php echo $row['sobrenome']; ?> - <a href="teste5.php?id=<?php echo $row['id']?>">Editar</a>
    <?php
        endwhile;
    ?>

    </ul>    


</body>
</html>