<?php
	ob_start();
	require_once('../modelo/login.php');
	session_start();
	if(isset($_SESSION['user_id'])){
		header("location: ../index.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login V17</title>
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
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"   >
					<span class="login100-form-title p-b-34">
						Registrarse
					</span>
					<div class="wrap-input100 rs1-wrap-input200 validate-input m-b-20" data-validate="Type name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="Nombre">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs1-wrap-input200 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="email" name="useremail" placeholder="Correo electronico">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input200 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="contraseña" minlength="7">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input200 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass1" placeholder="confirmar contraseña" minlength="7">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="enviar">
							Continuar
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						
					</div>

					<div class="w-full text-center">
						<a href="index.php" class="txt3">
							Iniciar Sesion
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
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
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php
	if (isset($_POST['enviar']) ){
		$datos_registro = [ $_POST["username"], $_POST["useremail"], $_POST["pass"], $_POST["pass1"] ];
		$estado = true;
		$cond=norepet($datos_registro[1]);
		

			for($i=0; $i < count($datos_registro); $i++){
				if($datos_registro[$i] == null || $datos_registro[$i] == ''){
					$estado = false;
				}
			}
	
			if($estado){
				if ($datos_registro[2] != $datos_registro[3]) {
					echo '<script> alert ("las contraseñas no son iguales") </script>';
				}else{
					if($cond==null){
						añadirUsuario($datos_registro);
						
					}else{
						echo '<script> alert ("El correo ya est registrado") </script>';		
					}
					
				}
			}else {
				echo '<script> alert ("Se encontraron campos vacios") </script>';
			}
		

		
		
	}
?>
</body>
</html>
<?php
ob_end_flush();
?>