<?php
        /*if (isset($_SESSION['professor'])) {*/
        require "conexao.php";
        
        //$u = $_SESSION['professor'];
        
        $sql = "SELECT * from tb_cadastra where id = ". $_SESSION['id'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        /*if ($u == 1 and $row['status'] == 'Habilitado') {*/
        $professor = $_SESSION['nome'];
        $sql = "SELECT concat(ano, ' ', curso) as turma, id as turmaid from tb_turma";
        $result = $conn->query($sql);
        $i = 1;
        $a = 1;

        if ($result->num_rows > 0) {
            echo "
                
            ";

            while ($row = $result->fetch_assoc()) {

                $turmaid = $row['turmaid'];


                if (!empty($_POST['id_da_turma'])) {

                    
                    if ($_POST['id_da_turma'] == $turmaid) {

                    
                        
                    $ativo = 'active';
                    } else {
                        $ativo = '';
                    }
                } else {
                    $ativo = '';
                }
            $a++;
            /*echo "
            <li onclick='envia($turmaid)' style='cursor:pointer'class='nav-item $ativo'>
            <a class='nav-link'>
                <i class='fas fa-fw fa-chart-area'></i>
                <span>".$row["turma"]."</span></a>
                <input hidden id='$turmaid' type='submit' name='id_da_turma' value=".$turmaid.">
        </li>
            ";*/

            echo "
            <a onclick='envia($a)' style='cursor:pointer' class='collapse-item $ativo'>".$row['turma']."</a>
            <input hidden id='$a' type='submit' name='id_da_turma' value='". $turmaid."'>

            ";

            }

        }

        /*
        if ($result->num_rows>0) {
            echo "
            <!-- Divider -->
            <hr class='sidebar-divider'>
            <!-- Heading -->
            <div class='sidebar-heading'>
                Procurar aluno
            </div>
            ";
            while ($row = $result->fetch_assoc()) {
                $i++;
                $turma = str_replace(' ','',$row['turma']);
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('$turma');
                </script>");
                
                if (isset($_POST['mt'])) {
                    $mt = $_POST['mt'];
                    $part = explode(' ', $mt);
                    $id_turma = $part[1];
                    if ($row['id_t'] == $id_turma) {
                        $mostrar = "show";
                        $ativo = "active";
                    } else {
                        $mostrar = '';
                        $ativo = '';
                    }
                } else {
                    $mostrar = '';
                    $ativo = '';
                }

            
                echo "
                <li class='nav-item $ativo'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapse$i'
                    aria-expanded='true' aria-controls='collapse$i'>
                    <i class='fas fa-fw fa-wrench'></i>
                    <span>".$row['turma']."</span>
                </a>
                <div id='collapse$i' class='collapse $mostrar' aria-labelledby='heading$i'
                data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Matérias:</h6>
                ";
                $idturma = $row['turmaid'];
                $idprofessor = $_SESSION['id'];
                $sql2 = "SELECT d.nome as materia, d.id as idmateria, t.id as id from tb_turma t join tb_disciplina d on t.curso = d.curso join tb_disciplina_professor dp on d.id = dp.id_d where t.id = $idturma and dp.id_p = $idprofessor;";
                $result2 = $conn->query($sql2);
                    
                    while ($row2 = $result2->fetch_assoc()) { 
                        
                        
                        if (isset($_POST['mt'])) {
                        $materia = $part[0];
                        if ($row2['idmateria'] == $materia and $row['id_t'] == $id_turma) {
                            $ativo = "active";
                        } else {
                            $ativo = '';
                            }
                        } else {
                            $ativo = '';
                        }

                        echo "
                        <a onclick='envia($a)' style='cursor:pointer' class='collapse-item $ativo'>".$row2['materia']."</a>
                        <input hidden id='$a' type='submit' name='mt' value='".$row2["idmateria"] . ' '. $row['id'] ."'>
                        "; $a++;
                    } 
                echo "
                    </div>
                </div>
            </li>
                ";
                    }
                }
            /*} elseif ($u == 0) {
                $aluno = $_SESSION['nome'];
                $id = $_SESSION['id'];
                $a = 1;
                echo "

                <!-- Divider -->
                <hr class='sidebar-divider'>
                <!-- Heading -->
                <div class='sidebar-heading'>
                    Vizualizar Notas
                </div>

                <!-- Nav Item - Notas -->
                <li class='nav-item'>
                    <a onclick='envia($a)' class='nav-link'>
                        <i class='fas fa-fw fa-chart-area'></i>
                        <span style='cursor:pointer'>Notas</span></a>
                        <input hidden id='$a' type='submit' type='text' name='id' value='$id'>
                        
                </li>
                ";
            
            } else {
                $professor = '';
            }

        //}
            
        ?>*/