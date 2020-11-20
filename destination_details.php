<?php
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');
    $id_des=$_GET['id'];
    /* $id=$_SESSION['user_id']; */
    $destino=buscarDestino($id_des);
    $descri=Descripcion($id_des);
    /* $dis=Disponivilidad($id_des,$id); */
?>
    <!-- header-end -->
    <div class="destination_banner_wrap overlay">
        <div class="destination_text text-center">
            <h3><?php echo $descri[0]['nombre']; ?></h3>
            
        </div>
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info">
                        <h3>Descripcion</h3>
                        <p><?php echo $descri[0]['descripcion'];?></p>
                        <p></p>
                        
                        <?php
                          if(isset($_SESSION['user_id'])){
                              echo "<p>Fecha de salida: <br>";
                            $id=$_SESSION['user_id'];
                            foreach ($destino as $li) {
                                echo '<a href="Rdestino.php?id='.$descri[0]["id_destino"].'&id_usu='.$id.'&id_ruta='.$li['ID'].'" class="boxed-btn4">'.$li['fecha'].'</a></p>';
                              }
                        }else{
                            echo '<a href="cart.php" class="boxed-btn4">Iniciar Sesion</a></p>';
                        }
                        
                       
                        ?>
                        
                        
                        <div class="single_destination">
                            
                            <p><img src="assets/img/destination/<?php echo $descri[0]['imagen']; ?>" alt="" style="max-height: 20rem;"></p>
                        </div><br>
                        <?php
                            /* if(isset($_SESSION['user_id'])){
                                $id=$_SESSION['user_id'];
                                echo '<a href="Rdestino.php?id='.$descri[0]["id_destino"].'&id_usu='.$id.'" class="boxed-btn4 " >Anadir al Carrito</a></p>';
                            }else{
                                echo '<a href="cart.php" class="boxed-btn4">Anadir al Carrito</a></p>';
                            } */
                            
                        ?>
                        <div>
                            <p>Asientos disponibles : 4</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- newletter_area_start  -->
    <?php 
    include_once('componentes/banner-registre-email.php');
    include_once('componentes/destinos.php');
    /* include_once('componentes/servicios-adicionales.php'); */
        include_once('componentes/footer.php');
    ?>
    <!-- newletter_area_end  -->

    