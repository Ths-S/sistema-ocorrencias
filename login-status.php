<?php 

                                        if (isset($_SESSION['nome'])) {
                                            echo "
                                            </span>
                                        <!-- Nav Item - User Information -->
                                        <li class='nav-item dropdown no-arrow'>
                                            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
                                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <span class='mr-2 d-none d-lg-inline text-gray-600 small'>

                                                    <!-- nome vai aqui-->
                                                    ".$_SESSION['nome']." &nbsp

                                            <img class='img-profile rounded-circle'
                                                src='img/undraw_profile.svg'>
                                            </a>
                                            <!-- Dropdown - User Information -->
                                                <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                                aria-labelledby='userDropdown'>
                                                <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>
                                                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                                    Sair
                                                </a>
                                            </div>
                                        </li>
                                        ";
                                        } else {

                                            header('Location: login.html');



                                            /*
                                            echo "
                                            <li class='nav-item no-arrow'>
                                                <a class='nav-link' href='login.html' role='button'
                                                aria-expanded='true'>
                                                <button class='btn btn-primary'>Entrar</button>
                                            </a>
                                            </li>
    
                                            <li class='nav-item no-arrow'>
                                                <a class='nav-link' href='register.html' role='button'
                                                aria-expanded='true'>
                                                <button class='btn btn-secondary '>Cadastrar</button>
                                            </a>
                                            </li>
                                            ";
                                         */}
                                    ?>