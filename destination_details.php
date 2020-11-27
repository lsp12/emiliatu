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
                            $fecha_actual = strtotime(date("y-m-d"));
                            
                            

                              echo "<p>Fecha de salida: <br>";
                            $id=$_SESSION['user_id'];
                            foreach ($destino as $li) {
                                $num=$li['ID'];
                                $fechaa=$li['fecha'];
                                $fecha_entrada = strtotime($fechaa);
                                $fecha =Dispon($num);
                                $aux=0;
                                    if($fecha == null):
                                        $aux=40; 
                                    else:
                                        foreach ($fecha as $li) {
                                        $aux+=$li['boletos'];
                                        }
                                        $aux =40-$aux;
                                    endif; 
                                if($fecha_actual <= $fecha_entrada)
                                {
                                    echo '<a href="Rdestino.php?id='.$descri[0]["id_destino"].'&id_usu='.$id.'&id_ruta='.$num.'" class="boxed-btn4">'.$fechaa.'</a></p>';
                                    echo '<h5> Asientos disponibles: '.$aux.' </h5>';
                                }else{
                                    
                                    }
                               
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

    