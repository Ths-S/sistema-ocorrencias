<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<script>
        function envia(id) {
            x = id;
            document.getElementById(id).click();
        }
        </script>

<?php 
    session_start();
        
    if (empty($_SESSION['id'] and $_SESSION['nome'])) {
        header('Location: login.html');
    }

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
            <li class="nav-item">
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
            <li class="nav-item active ">
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
                
               

                            <form action='confirmar.php' method='post'>




                    <!-- Page Heading -->
                    <?php 
                        require "conexao.php";

                        $id = $_POST['id'];

                        $sql = "SELECT * from tb_ocorencia o join tb_aluno a on o.id_a = a.id where a.id = $id";
                        $result = $conn->query($sql);   
                         
                        $result2 = $conn->query($sql);   
                        $row2 = $result2->fetch_assoc();                
                        $nome = $row2['nome'];
                        ?>


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ocorrências do aluno(a): <?php echo $nome ?></h1>
                    <p class="mb-4">Veja as ocorrências do aluno citado acima.</p>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Vizualizar ocorrências de determinado aluno

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Ocorrência</th>
                                        <th>Motivo</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php 


                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['data']."</td>";
                                        echo "<td>".$row['ocorrencia']."</td>";
                                        echo "<td>".$row['outros']."</td>";
                                        echo "</tr>";
                                    }


                                    ?>
                                </tbody>
                                </table>
                        </div>
                        
                    </div>
               

                </div>
                <!-- /.container-fluid -->

                

            <!-- End of Main Content -->



         

                <!-- /.container-fluid -->

            </div>
                <!-- /.container-fluid -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se estiver pronto para sair da conta.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="sair.php">Sair</a>
                </div>
            </div>
        </div>
    </div>  


    <!-- Alterar -->
<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vizualizar ocorrências</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Data</th>
                                        <th>Ocorrência</th>
                                        <th>Motivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    require "conexao.php";
                                    
                                    $sql = "SELECT * from tb_ocorencia o join tb_aluno a on o.id_a = a.id where a.id = 12;";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                        $nome = '"' . $row['nome'] . '"';
                                        $turma = '"' . $row['turma'] . '"';
                                        echo "<tr>";
                                        echo "<td>".$row['data']."</td>";
                                        echo "<td>".$row['ocorrencia']."</td>";
                                        echo "<td>".$row['outros']."</td>";
                                        echo "</tr>";
                                    }


                                    ?>


                                </tbody>
                                </table>
                        



      </div>
      <div class="modal-footer"><form method="POST" action="excluir.php">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>