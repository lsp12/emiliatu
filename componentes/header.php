<?php
    ob_start();
    require("modelo/general.php");
    /* header("location: login/index.php"); */
?>

<header>

        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="assets/img/log.jpg" alt="" style="width: 10rem;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="index.php">Inicio</a></li>
                                            <li><a href="destinos.php">Destinos</a></li>
                                            
                                           
                                            <?php
                                             if(!isset($_SESSION['user_id'])){
                                                
                                                
                                            ?>
                                            
                                            <li><a href="login/index.php">Iniciar Sesion</a></li>
                                            <?php }else{ ?>
                                            <li><a href="cerrar.php">Cerrar sesion</a></li>
                                            
                                            <?php

                                            }
                                            ?>
                                            <li>
                                            <?php
                                            if(isset($_SESSION['user_id'])){
                                                echo '<a class="" href="travel_destination.php">Compras Realizadas</a></li>';
                                            }
                                            ?>
                                            
                                            <!-- <li><a href="login/index.php">Cerrar sesion</a></li> -->
                                            <!-- <li><a href="contact.php">Contactanos</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i> +593 99 774 189</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <?php 
                                            $aux=0;
                                            if(isset($_SESSION['user_id'])){
                                                $id_as=$_SESSION['user_id'];
                                                $contador=CarritoEle($id_as);
                                                
                                                foreach ($contador as $lis) {
                                                $aux++;
                                                }
                                            }
                                            
                                            ?>
                                            
                                            <li><a href="cart.php"><img src="assets/img/svg_icon/4.svg" style="height: 1.2rem;"><span class="badge badge-light"><?php echo $aux ?> </span></a> </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
    </header>