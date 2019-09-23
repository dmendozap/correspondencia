<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : http://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del Usuario &raquo; Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM usuario WHERE idusuario='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$idusuario		     = mysqli_real_escape_string($con,(strip_tags($_POST["idusuario"],ENT_QUOTES)));//Escanpando caracteres 
				$nombreUsuario		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombreUsuario"],ENT_QUOTES)));//Escanpando caracteres 
				$apellidoUsuario	 = mysqli_real_escape_string($con,(strip_tags($_POST["apellidoUsuario"],ENT_QUOTES)));//Escanpando caracteres 
				$correoUsuario	 = mysqli_real_escape_string($con,(strip_tags($_POST["correoUsuario"],ENT_QUOTES)));//Escanpando caracteres 
				$dependenciaUsuario     = mysqli_real_escape_string($con,(strip_tags($_POST["dependenciaUsuario"],ENT_QUOTES)));//Escanpando caracteres 
				$passwordUsuario		 = mysqli_real_escape_string($con,(strip_tags($_POST["passwordUsuario"],ENT_QUOTES)));//Escanpando caracteres 
				 
				
				$update = mysqli_query($con, "UPDATE usuario SET nombreUsuario='$nombreUsuario', apellidoUsuario='$apellidoUsuario', correoUsuario='$correoUsuario', dependenciaUsuario='$dependenciaUsuario', passwordUsuario='$passwordUsuario' WHERE idUsuario='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">idUsuario</label>
					<div class="col-sm-4">
						<input type="text" name="idusuario" value="<?php echo $row ['idusuario']; ?>" class="form-control" readonly placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="nombreUsuario" value="<?php echo $row ['nombreUsuario']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellidos</label>
					<div class="col-sm-4">
						<input type="text" name="apellidoUsuario" value="<?php echo $row ['apellidoUsuario']; ?>" class="form-control" placeholder="Lugar de nacimiento" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">E-mail</label>
					<div class="col-sm-4">
						<input type="text" name="correoUsuario" value="<?php echo $row ['correoUsuario']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Dependencia</label>
					<div class="col-sm-4">
						<input type="text" name="dependenciaUsuario" value="<?php echo $row ['dependenciaUsuario']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">password</label>
					<div class="col-sm-4">
						
						<input type="text" name="passwordUsuario" value="<?php echo $row ['passwordUsuario']; ?>" class="form-control" placeholder="Puesto" required>
					</div>
                    
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html><?php
include("conexion.php");
?>
