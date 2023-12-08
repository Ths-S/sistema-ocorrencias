<script type='text/javascript'>
<?php
require('conexao.php');
$sql = "select count(ocorrencia) as quantidade, m.nome as meses from tb_ocorencia o right join tb_meses m on month(o.data) = m.id group by m.nome order by m.id;
";
$result = $conn->query($sql);
$row = $result->fetch_array();
$js_array = json_encode($row);
echo "console.log($js_array[9]);";
?>
</script>