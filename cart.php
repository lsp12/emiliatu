<?php
 
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');

   
    
?>

  <main>
      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12 p-4">
                          <div class="hero-cap text-center">
                              <h2>Lista de carrito</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <?php $id=$_SESSION['user_id']; 
      
      if($id==null){
 
        header("location: login/index.php");
        }
      /* echo $id; */
      ?>
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Personas</th>
                    <th scope="col">Asientos disponibles</th>
                    <th scope="col">Total</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $lista=CarritoEle($id);
                 
                     foreach ($lista as $li) {
                      $fecha =Dispon($li["id_ruta"]);
                             $aux=0;
                               if($fecha == null):
                                  $aux=40; 
                               else:
                                  foreach ($fecha as $lis) {
                                   $aux+=$lis['boletos'];
                                  }
                                  $aux=40-$aux;
                               endif;
                      echo '
                      
                        <tr class="text-center">
                          <td>
                            <div class="media">
                              <div class="d-flex thumb">
                                <img src="assets/img/destination/'.$li["imagen"].'" style="height: 7rem;" alt="" />
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
                          
                          <div>
                          <p> <h5> disponibles : '.$aux.' </h5></p>
                          
                      </div>
                          </td>
                          <td class="my-fake-form">
                            <h5 name="precio" class="demo" id="posting-value-1">$15</h5>
                          </td>
                            <td class="ml-4">
                              <div class="d-flex flex-row">
                                <a href="pago/pago.php?id_us='.$id.'&id_des='.$li["destino"].'&id_carr='.$li["id_compra"].'&id_ruta='.$li["id_ruta"].'" class="p-2 btn btn-success" id="submit-form-link">Comprar</a>
                                <a href="Rdestino.php?id_des='.$li["destino"].'" class="p-2"><img src="assets/img/svg_icon/basura.svg" alt="eliminar" style="height: 2rem;"></a>
                              </div>
                            <td>
                        </tr>
                      
                      ';
                    }
                    
                  ?>
                  
                        
                  
                  
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="#">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
              </div> -->
            </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
  </main>
  <?php include_once('componentes/footer.php');?>
  
  <script>
    
    function myFunction() {
    let x = document.getElementById("calcular").value;
    x= x*15;
    document.querySelector(".demo").innerHTML = "$"+x;
}

  </script>
</body>
</html>
<?php ob_end_flush(); ?>