<?php
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');
    $id=$_SESSION['user_id']; 
      
      if($id==null){
 
        header("location: login/index.php");
        }
      /* echo $id; */
    
?>
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destino</h3>
                        
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
                    <th scope="col">Estado de pago</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $id=$_SESSION['user_id'];
                  echo $id;
                    $lista=Compras($id);
                
                    foreach ($lista as $li) {
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
                          
                          '.$li["boletos"].'
                        
                          
                          </div>
                        </td>
                        
                        <td>
                        
                          <h5 name="precio" id="demo">'.$li["costo"].'</h5>
                        
                        </td>
                        <td>
                          '.$li["Estado_pago"].'
                        </td>
                          <td>
                            <div class="d-flex flex-row">
                              
                              
                              <a href="Rdestino.php?id_compra='.$li["id"].'" class="p-2 boxed-btn4"><h4 style="color: white;">cancelar</h4></a>
                            </div>
                          <td>
                        </tr>';
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