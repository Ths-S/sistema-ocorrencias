<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de ocorrências</title>
    <!--<link rel="shortcut icon" type="imagex/png" href="">-->


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<script>
        function envia(id) {
            x = id;
            document.getElementById(id).click();
        }
        </script>

<?php 
    session_start();
    require 'conexao.php';
        
    if (empty($_SESSION['id'] and $_SESSION['nome'])) {
        header('Location: login.html');
    } else {
        $sql = "select count(*) as total from tb_ocorencia where month(data) = month(now());";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ocorrencias_m = $row['total'];

        $sql = "select cast((select count(*) as quantidade from tb_cadastra) * 100 / 5 as dec(10,0)) as porcentagem from tb_cadastra;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ocorrencias_e_m = $row['porcentagem'];

        $sql = "select count(*) as quantidade, case
        when weekday(data) = 0 then 'Segunda-Feira'
        when weekday(data) = 1 then 'Terça-Feira'
        when weekday(data) = 2 then 'Quarta-Feira'
        when weekday(data) = 3 then 'Quinta-Feira'
        when weekday(data) = 4 then 'Sexta-Feira'
        when weekday(data) = 5 then 'Sábado'
        when weekday(data) = 6 then 'Domingo' end as semana from tb_ocorencia group by semana order by quantidade desc limit 1;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ocorrencias_s = $row['semana'];



        $sql = 'select count(*) as pi from (select count(*) as q from tb_ocorencia group by id_a having q >= 3 order by q) as contagem;';        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $j = $row['pi'];
        

        

?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistema <sup>dan  </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Heading -->
            <div class="sidebar-heading">
                Cadastrar
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Registrar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inserir na tabela:</h6>
                        <a class="collapse-item" href="registrar_aluno.php">Alunos</a>
                        <a class="collapse-item" href="registrar_turma.php">Turmas</a>
                        <a class="collapse-item" href="registrar_ocorrencia.php">Ocorrências</a>

                        </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Vizualizar
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Consultar e Editar</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha a tabela:</h6>
                        <a class="collapse-item" href="editar_aluno.php">Alunos</a>
                        <a class="collapse-item" href="editar_turma.php">Turmas</a>
                        <a class="collapse-item" href="editar_ocorrencia.php">Ocorrências</a>

                        </div>
            </li>



                  <!-- Nav Item - Pages Collapse Menu -->
                  <form id='nav' action="tables3.php" method="post">  
                <!-- Barra de navegação esquerda-->    
                    
                
                </form>


                            <!-- Divider -->
            <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Dar uma ocorrência
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="inserir_do.php" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pesquisar por turma</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Selecione uma turma:</h6>


    <form id='nav' action="tables3.php" method="post">  
    <!-- Barra de navegação esquerda-->    
        <?php require 'navegacao2.php' ?>
        
    
    </form>
        </div>
    </div>
</li>


                            <!-- Divider -->
            <hr class="sidebar-divider">



                <!-- Heading -->
                <div class="sidebar-heading">
                    Outras Funções
                </div>
            

                        <!-- Nav Item - Tables -->
                        <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Alunos e Ocorrências</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables2.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Vizualizar Ocorrência</span></a>
            </li>

                

                

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            

            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                    <!-- Topbar Search -->
                    <form method='POST' action='pesquisar.php'
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="pesquisa" class="form-control bg-light border-0 small" placeholder="Pesquisar por aluno..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Pesquisar por..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php require "login-status.php"; ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Alunos 3+ registros</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $j?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                D. semana com mais casos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ocorrencias_s?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cadastros realizados
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ocorrencias_e_m?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?php echo $ocorrencias_e_m?>%" aria-valuenow="<?php echo $ocorrencias_e_m?>" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ocorrências este Mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ocorrencias_m?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Meses com mais ocorrências</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a><!--
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class=
                                            "dropdown-divider"></div>
                                            
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>-->
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Anos (turma) com mais ocorrências</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a><!--
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>-->
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> 1º Anos
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> 2º Anos
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> 3º Anos
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                        <?php

$sql = "select cast(count(*)*100 / (select count(*) from tb_ocorencia) as dec(3,0)) as quantidade, ocorrencia from tb_ocorencia group by ocorrencia order by quantidade desc limit 4;";
$result = $conn->query($sql);
$l = $result->num_rows;

$a = 'DADOS NÂO SUFICIENTES';
$b = 'DADOS NÂO SUFICIENTES';
$c = 'DADOS NÂO SUFICIENTES';
$d = 'DADOS NÂO SUFICIENTES';
$e = 'DADOS NÂO SUFICIENTES';
$p = 0;
$total = 0;
$i = 1;
$w = 0;
$x = 0;
$y = 0;
$z = 0;
while ($row = $result->fetch_assoc()) {
    if ($i == 1) {
        $w = intval($row['quantidade']);
        $a = $row['ocorrencia'];
    } elseif ($i == 2) {
        $x = intval($row['quantidade']);
        $b = $row['ocorrencia'];
    } elseif ($i == 3) {
        $y = intval($row['quantidade']);
        $c = $row['ocorrencia'];
    } elseif ($i == 4) {
        $z = intval($row['quantidade']);
        $d = $row['ocorrencia'];
        $e = 'Outros';
    } 
    $total += intval($row['quantidade']);
    $i++;
} 

$total = 100 - $total;
if ($total <= 1) {
    $total = 0;
}
//echo $w . ' '. $x . ' ' . $y . ' '. $z . ' ' . $total . ' '. $a;
}


                        echo "
                            <!-- Project Card Example -->
                            <div class='card shadow mb-4'>
                                <div class='card-header py-3'>
                                    <h6 class='m-0 font-weight-bold text-primary'>Ocorrências mais usadas</h6>
                                </div>
                                <div class='card-body'>
                                    <h4 class='small font-weight-bold'>$a <span
                                            class='float-right'>$w%</span></h4>
                                    <div class='progress mb-4'>
                                        <div class='progress-bar bg-danger' role='progressbar' style='width: $w%'
                                            aria-valuenow='$w' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                    <h4 class='small font-weight-bold'>$b <span
                                            class='float-right'>$x%</span></h4>
                                    <div class='progress mb-4'>
                                        <div class='progress-bar bg-warning' role='progressbar' style='width: $x%'
                                            aria-valuenow='$x' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                    <h4 class='small font-weight-bold'>$c <span
                                            class='float-right'>$y%</span></h4>
                                    <div class='progress mb-4'>
                                        <div class='progress-bar' role='progressbar' style='width: $y%'
                                            aria-valuenow='$y' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                    <h4 class='small font-weight-bold'>$d <span
                                            class='float-right'>$z%</span></h4>
                                    <div class='progress mb-4'>
                                        <div class='progress-bar bg-info' role='progressbar' style='width: $z%'
                                            aria-valuenow='$z' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                    <h4 class='small font-weight-bold'>$e <span
                                            class='float-right'>$total%</span></h4>
                                    <div class='progress'>
                                        <div class='progress-bar bg-success' role='progressbar' style='width: $total%'
                                            aria-valuenow='$total' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                </div>
                            </div>
                        ";
                        
                        ?>
                        </div><div class="col-xl-6 col-lg-5">

                            
                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Quantidade de ocorrências por alunos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>

                                    </div>
                                </div>
                </div>
                <!-- /.container-fluid -->

                

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Thiago S.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



    <?php 

        $sql = "select count(ocorrencia) as quantidade, m.nome as meses from tb_ocorencia o right join tb_meses m on month(o.data) = m.id group by m.nome order by m.id;";
        $result = $conn->query($sql);
        $sql2 = "select count(ocorrencia) as quantidade, m.nome as meses from tb_ocorencia o right join tb_meses m on month(o.data) = m.id group by m.nome order by m.id;";
        $result2 = $conn->query($sql2);

    ?>
    <!-- Page level custom scripts -->
    <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '"' . $row['meses'] . '"';
            echo ',';
        }
        ?>
        ],
    datasets: [{
      label: "Total de ocorrências",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
        <?php
            while ($row2 = $result2->fetch_assoc()) {
                echo $row2['quantidade'];
                echo ',';
            } 
        ?>

      ],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


    </script>
    <?php 
        $sql = 'select count(*) as quantidade, t.ano as ano from tb_ocorencia o join tb_aluno a on o.id_a = a.id join tb_turma t on t.id = a.id_turma group by t.ano order by t.ano;';
        $result = $conn->query($sql);
    
    ?>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["1º Anos", "2º Anos", "3º Anos"],
    datasets: [{
      data: [
        <?php 
            while ($row = $result->fetch_assoc()) {
                echo $row['quantidade'];
                echo ',';
            }
        ?>
      ],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

    </script>


<?php 

$sql = 'select count(*) as uma from (select count(*) as q from tb_ocorencia group by id_a having q = 1 order by q) as contagem;';
$result = $conn->query($sql);
$row1 = $result->fetch_assoc();

$sql = 'select count(*) as duas from (select count(*) as q from tb_ocorencia group by id_a having q = 2 order by q) as contagem;';
$result = $conn->query($sql);
$row2 = $result->fetch_assoc();

$sql = 'select count(*) as três from (select count(*) as q from tb_ocorencia group by id_a having q = 3 order by q) as contagem;';
$result = $conn->query($sql);
$row3 = $result->fetch_assoc();

$sql = 'select count(*) as quatro from (select count(*) as q from tb_ocorencia group by id_a having q = 4 order by q) as contagem;';
$result = $conn->query($sql);
$row4 = $result->fetch_assoc();

$sql = 'select count(*) as cinco_ou_mais from (select count(*) as q from tb_ocorencia group by id_a having q >= 5 order by q) as contagem;';
$result = $conn->query($sql);
$row5 = $result->fetch_assoc();

$l1 = $row1['uma'];
$l2 = $row2['duas'];
$l3 = $row3['três'];
$l4 = $row4['quatro'];
$l5 = $row5['cinco_ou_mais'];



?>
    <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Uma oc.", "Duas oc.", "Três oc.", "Quatro oc.", "Cinco ou +"],
    datasets: [{
      label: "Total de alunos",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
        <?php 
            echo $l1 . ', '. $l2 . ', ' . $l3 . ', ' . $l4 .', ' . $l5;  
        ?>
      ],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $l1?>,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});


    </script>

</body>

</html>