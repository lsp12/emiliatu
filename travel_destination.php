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
                    $lista=CarritoEle();
                    foreach ($lista as $li) {
                      echo '
                      
                      <tr>
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
                      
                        <input type="number" class="input-number" id="calcular" name="quantity" value="1" min="1" max="20" onchange="myFunction()">
                    
                      
                      </div>
                    </td>
                    
                    <td>
                    
                      <h5 name="precio" id="demo">$15</h5>
                    
                    </td>
                    
                      <td>
                        <div class="d-flex flex-row">
                          <button class="boxed-btn4 " type="submit">Comprar</button>
                          
                          <a href="Rdestino.php?id_des='.$li["id_destino"].'" class="p-2"><img src="assets/img/svg_icon/basura.svg" alt="eliminar" style="height: 2rem;"></a>
                        </div>
                      <td>
                    </tr>
                    
                      ';
                    }
                    $id=$_SESSION['user_id'];
                    if($id==null){
 
                      header("location: login/index.php");
                      }
                    echo $id;
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