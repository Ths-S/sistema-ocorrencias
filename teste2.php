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
    <ul>
        <?php 
            $listagem = $conn->prepare("SELECT * from tb_cadastra");
            $listagem->execute();

            while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
            ?>

                <li><?php echo $lista['id']; ?> - <?php echo $lista['email']; ?> - <?php echo $lista['nome']; ?> - <a href="editar.php?id=<?php echo $lista['id'] ?></li>

                <?php 
                endwhile;
                ?>
                </ul>
            </body>

            </html>
        ?>
    </ul>
</body>
</html>