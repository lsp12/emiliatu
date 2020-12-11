<?php

ob_start();
session_start();
$id=$_SESSION['user_id'];
if($id==null){
 
	header("location: login/index.php");
	}
require_once("modeloPg/general2.php");
	$id_us=$_GET['id_us'];
	$id_des=$_GET['id_des'];
	$id_carr=$_GET['id_carr'];
	$id_ruta=$_GET['id_ruta'];
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Comprar Destino</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" >
					<span class="login100-form-title p-b-32">
						Metodo de Pago
					</span>
					<span class="txt1 p-b-11">
						Destino
					</span>
					
					<span class="login100-form p-b-32"   >
					<?php
					$fecha1=Fecha($id_ruta);
					echo $fecha1[0]['nombre'];
					?>
					</span>

					<span class="txt1 p-b-11">
						Fecha de Salida
					</span>
					
					<span class="login100-form p-b-32"   >
					<?php
					$fecha1=Fecha($id_ruta);
						
						
					echo $fecha1[0]['fecha'];
						
						
					?>
					</span>
					
					<span class="txt1 p-b-11">
						Cantidad de personas
					</span>
					<?php 
					$fecha =Dispon($id_ruta);
						$aux=0;
							if($fecha == null):
								 $aux=0; 
							else:
								 foreach ($fecha as $li) {
									$aux+=$li['boletos'];
								 }
							endif;
						?>
					<div class="wrap-input100 validate-input m-b-36 p-b-11" data-validate = "Username is required">
						<!-- <input class="input100" type="text" name="username" > -->
						<input type="number" class="input-number input100" id="calcular" name="pasajero" value="1" min="1" max="<?php echo 40-$aux; ?>" onchange="myFunction()" required>
						<span class="focus-input100"></span>
						<span class="txt1 p-b-11">
						

						Asientos maximo disponibles <?php echo 40-$aux; ?>
						</span>
					</div>

					
					


					
					<span class="txt1 p-b-11">
						Precio Unitario
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<!-- <i class="fa fa-eye"></i> -->
						</span>
						<input class="input100" type="text" name="pass" readonly value="15" readonly>
						<span class="focus-input100"></span>
					</div>

					<span class="login100-form p-b-12">
						Total
					</span>
					<span class="login100-form p-b-32"   >
					<span>USD </span><input name="total" id="demo" value="15">
					</span>

					<span class="login100-form p-b-2">
						Tipo de pago
					</span>
					<!-- <div class="flex-sb-m w-full p-b-20">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							
						</div>	
					</div> -->
					<div class="flex-sb-m w-full p-b-20">
						<select class="form-control" name="Tipo" required>
							<option>-------</option>
							<option value="Credito">Credito</option>
							<option value="Debito">Debito</option>
							
						</select>
					</div>

					<div class="container-login100-form-btn p-b-5">
						<button class="login100-form-btn mr-3" name="enviar">
							Comprar
						</button>
						<a href="../index.php" class="login100-form-btn ml-5">Cancelar</a>
					</div>
					
				</form>
				
				<div class="container-login100-form-btn p-t-10">
				<h3>o paga con</h3>
				<form
          action="https://www.paypal.com/cgi-bin/webscr"
          method="post"
          target="_top"
        >
          <input type="hidden" name="cmd" value="_s-xclick" />
          <input type="hidden" name="hosted_button_id" value="8WL36TRP2ZZ74" />
          <input
            type="image"
            src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif"
            name="submit"
            alt="PayPal - The safer, easier way to pay online!"
          />
          <img
            alt=""
            src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif"
            width="1"
            height="1"
          />
		</form>
		</div>
				<?php
					
					if(isset($_POST["enviar"])){
						
						$pasejeros=$_POST["pasajero"];
						$cantidad=$_POST["total"];
						$tipo=$_POST["Tipo"];
						enviar_email($id_us,$id_des, $pasejeros, $cantidad, $id_ruta,$tipo);
						
						Compra($id_us,$id_des, $pasejeros, $cantidad, $id_ruta, $tipo);
						EliminarC($id_carr);
						header("location: ../travel_destination.php");
					}
					
				?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
    
    function myFunction() {
    let x = document.getElementById("calcular").value;
    x= x*15;
    document.querySelector("#demo").value = x;
}

  </script>
</body>
</html>
<?php ob_end_flush(); ?>