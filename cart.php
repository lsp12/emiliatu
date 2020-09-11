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
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Lista de carrito</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <?php $id=$_SESSION['user_id']; ?>
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
                          <td class="my-fake-form>
                          
                            <h5 name="precio" class="demo" id="posting-value-1">$15</h5>
                          
                          </td>
                          
                            <td>
                              <div class="d-flex flex-row">
                                
                                <a href="pago/pago.php?id_us='.$id.'&id_des='.$li["id_destino"].'" class="p-2 boxed-btn4" id="submit-form-link">Comprar</a>
                                <a href="Rdestino.php?id_des='.$li["id_destino"].'" class="p-2"><img src="assets/img/svg_icon/basura.svg" alt="eliminar" style="height: 2rem;"></a>
                              </div>
                            <td>
                        </tr>
                      
                      ';
                    }
                    
                    if($id==null){
 
                      header("location: login/index.php");
                      }
                    echo $id;
                  ?>
                  
                        
                  
                  <tr class="bottom_button">
                    <td>
                    
                      <a class="btn_1" href="#">Update Cart</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="cupon_text float-right">
                        <a class="btn_1" href="#">Close Coupon</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                      <h5>$2160.00</h5>
                    </td>
                  </tr>
                  <tr class="shipping_area">
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            Flat Rate: $5.00
                            
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Free Shipping
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Flat Rate: $10.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li class="active">
                            Local Delivery: $2.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select>
                        <select class="shipping_select section_bg">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select>
                        <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                        <a class="btn_1" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="#">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
              </div>
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
    document.querySelector("#demo").innerHTML = "$"+x;
}

  </script>
</body>
</html>
<?php ob_end_flush(); ?>