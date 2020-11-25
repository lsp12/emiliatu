<?php
	session_start();
	require_once('../modelo/login.php');
	if(isset($_SESSION['user_id'])){
		header("location: ../index.php");
	}
	if(isset($_POST['enviar'])){
		$email = $_POST["username"];
		$clave = $_POST["pass"];
		if($email != '' || $clave != ''){
			$res = confirmar($email);
			if($res != []){
				// al general el password hast retonar una cadena mayor a 50
				// el campo clave solo acepta 50 caracteres, modificala para que soporte 100.
				if(password_verify($clave, $res[0]['clave']) > 0){
					if ("admin@gmail.com"==$email) {
						$_SESSION['user_id']=$res[0]['id_user'];
						header('location: ../admin/admin-1.php');
					}else{
						$_SESSION['user_id']=$res[0]['id_user'];
						header('location: ../index.php');
						
					}
					
				}else{
					echo '<script> alert ("Datos incorrectos, revise y vuelva ha intentarlo") </script>';	
				}		
			}else{
				echo '<script> alert ("Datos incorrectos, revise y vuelva ha intentarlo") </script>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio de sesion</title>
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
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-34">
						CUENTA DE INGRESO
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="email" name="username" placeholder="Correo electronico">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="enviar">
							Iniciar Sesion
						</button>
						
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						
					</div>

					<div class="w-full text-center">
						<a href="registro.php" class="txt3">
							Registrarse
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

</body>


</html>