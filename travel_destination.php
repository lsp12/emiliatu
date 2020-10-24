<?php
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');
    
?>
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destino</h3>
                        <p>Diseño perfecto de píxeles con contenidos asombrosos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- where_togo_area_start  -->
    


    <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Personas</th>
                    <th scope="col">Total</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $id=$_SESSION['user_id'];
                    $lista=CarritoEl($id);
                    $aux=0;
                    $imagen='';
                    $nombre='';
                    $total=0;
                    $destino="";
                    foreach ($lista as $key) {
                      $aux++;
                    
                    
                      $total+=$key['precio'];
                    
                    }
                    foreach ($lista as $li) {
                      
                      if($li['id_destino']==$destino){
                        
                        $imagen=$li['imagen'];
                        $nombre=$li['nombre'];
                        
                        
                      }else{
                      
                        echo '<tr>
                        <td>
                          <div class="media">
                            <div class="d-flex thumb">
                              <img src="assets/img/destination/'.$li["imagen"].'" style="height: 10rem;" alt="" />
                            </div>
                            
                          </div>
                        </td>
                        <td>
                        
                          <h5>'.$li["nombre"].'</h5>
                        </td>
                        <td>
                          <div class="product_count">
                          
                          '.$aux.'
                        
                          
                          </div>
                        </td>
                        
                        <td>
                        
                          <h5 name="precio" id="demo">'.$total.'</h5>
                        
                        </td>
                        
                          <td>
                            <div class="d-flex flex-row">
                              
                              
                              <a href="Rdestino.php?id_des='.$li["id_destino"].'" class="p-2 boxed-btn4"><h4 style="color: white;">cancelar</h4></a>
                            </div>
                          <td>
                        </tr>';
                      }
                      $destino=$li['id_destino'];
                    }
                    
                    $id=$_SESSION['user_id'];
                    if($id==null){
 
                      header("location: login/index.php");
                      }
                    
                  ?>
                  

                  
                  
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>
    </section>


   <?php include_once('componentes/footer.php'); ?>
    
</body>

</html>