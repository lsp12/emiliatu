<div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Destinos Populares</h3>
                        <p>Recorre el pais y visita los lugares mas hermosos para para el tiempo 
                            con tu familia o amigos.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                require_once("modelo/general.php");
                $fila=mostrarDestino();
                
                foreach ($fila as $fli) {
                    
                    echo '
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="assets/img/destination/'.$fli["imagen"].'" alt="">
                            </div>
                            <div class="content">';
                            if(isset($_SESSION['user_id'])){
                                $id=$_SESSION['user_id'];
                                echo '
                                <p class="d-flex align-items-center">'.$fli["nombre"].'
                                <a href="destination_details.php?id='.$fli["id_destino"].'">infromacion</a>
                                
                            </div>
                        </div>
                    </div>
                                ';
                            }else{
                                echo '
                                <p class="d-flex align-items-center">'.$fli["nombre"].'
                                <a href="destination_details.php?id='.$fli["id_destino"].'">infromacion</a>
                                
                            </div>
                        </div>
                    </div>
                    ';     
                           
                            }
                                
                }
            ?>
            </div>
        </div>
    </div>
    