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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Consultar e Editar</span>
                </a>
                <div id="collapseUtilities2" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha a tabela:</h6>
                        <a class="collapse-item active" href="editar_aluno.php">Alunos</a>
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
                        <h1 class="h3 mb-2 text-gray-800">Consultar e editar alunos</h1>
                        <p class="mb-4">Consulte alunos e edite seus valores referentes ao  <a target="_blank"
                            href="index.php">banco de dados</a>.</p>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Editar e excluir aluno</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Turma</th>
                                                <th>Excluir</th>

                                                <th>Atualizar</th>

                                            </tr>
                                        </thead>

                                        <tbody>


                                    <?php 

                                    require "conexao.php";

                                    $sql = "SELECT a.nome as aluno, concat(t.ano ,' ', t.curso) as turma, a.id as id from tb_aluno a join tb_turma t on t.id = a.id_turma order by a.nome";
                                    $result = $conn->query($sql);
                                    $i = -500;
                                    while ($row = $result->fetch_assoc()) {
                                        $i++;
                                        $aluno = $row['aluno'];
                                        $aluno1 = '"'.$row['aluno'].'"';
                                        $turma = $row['turma'];
                                        $id = $row['id'];

                                        echo "<tr>
                                            <th id='$i' style='font-weight: 500'>$aluno</th>
                                            <th id='a$i'style='font-weight: 500'>$turma</th>
                                            <th style='font-weight: 500;text-align: center''><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' onclick='excluir($id, $aluno1)'>Excluir</button></th>
                                            <th style='font-weight: 500;text-align: center''><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal11' onclick='alterar($id, $aluno1)'>Alterar</button></th>

                                        </tr>
                                        ";
                                    }                                
                                    ?>
                                    <script>


                                        </script>
                                        </tbody>
                                    </table>
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
                        <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione sair para sair da conta</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="sair.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        
    <!-- Excluir -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir aluno</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            Tem certeza que deseja excluir o aluno: <br><a id='aluno'>

        </div>
        <div class="modal-footer"><form method="POST" action="excluir.php">
            <div id='input_excluir'></div><button type="submit" class="btn btn-danger">Sim</button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Alterar -->
    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form method="post" action="alter.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome completo do aluno:</label>
                                <div id='input_alterar'><input type="text" name="aluno" class="form-control" id="exampleInputText" aria-describedby="emailHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Turma a que está inserido:</label>
                                <label for="exampleFormControlSelect1"></label><select name="id_turma" class="form-control" id="exampleFormControlSelect1">


                                <?php 
        
                                        $sql = "SELECT concat(ano, ' ', curso) as turma, id from tb_turma order by ano";
                                        $result = $conn->query($sql);
                                        $selected = "selected";

                                        while ($row = $result->fetch_assoc()) {
                                            $turma = $row['turma'];
                                            $id = $row['id'];
                                            $selected = '';

                                            echo "
                                                <option $selected value='$id'>$turma</option>
                                            ";
                                        }                                
                                ?> 
                                </select>
                                
                            </div>




        </div>
        <div class="modal-footer"><form method="POST" action="excluir.php">
                <button type="submit" class="btn btn-warning">Sim</button></form>

        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        </div>
        </div>
    </div>
    </div>

        <script>
            function alterar(id, aluno) {
                document.getElementById('input_alterar').innerHTML = '<input type="text" name="aluno" value="'+aluno+'" class="form-control" id="exampleInputText" aria-describedby="emailHelp"><input hidden value="'+id+'" name="id_aluno">';


            }
            function excluir(id, aluno) {
                console.log(id);
                document.getElementById('aluno').innerHTML = aluno;
                document.getElementById('input_excluir').innerHTML = '<input name="id" value="'+id+'" hidden><input name="aluno" value="'+aluno+'" hidden>';
            }
        </script>



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