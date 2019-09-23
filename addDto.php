<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AMV - Correspondencia</title>

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
			<h2>Documentos &raquo; Agregar Documento</h2>
			<hr />

			<?php

			if(isset($_POST['addDto'])){
				$fechaDocumento		   = mysqli_real_escape_string($con,(strip_tags($_POST["fechaDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$ciudadDocumento		   = mysqli_real_escape_string($con,(strip_tags($_POST["ciudadDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$destinatarioDocumento	= mysqli_real_escape_string($con,(strip_tags($_POST["destinatarioDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$asuntoDocumento			= mysqli_real_escape_string($con,(strip_tags($_POST["asuntoDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$contenidoDocumento	   = mysqli_real_escape_string($con,(strip_tags($_POST["contenidoDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$remitenteDocumento	   = mysqli_real_escape_string($con,(strip_tags($_POST["remitenteDocumento"],ENT_QUOTES)));//Escanpando caracteres 
				$idusuario		 			= mysqli_real_escape_string($con,(strip_tags($_POST["idusuario"],ENT_QUOTES)));//Escanpando caracteres
				$estadoDocumento	   	= mysqli_real_escape_string($con,(strip_tags($_POST["estadoDocumento"],ENT_QUOTES)));//Escanpando caracteres  


				
			

				$cek = mysqli_query($con, "SELECT * FROM documento WHERE idDocumento='$idDocumento'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO documento (fechaDocumento, ciudadDocumento, destinatarioDocumento, asuntoDocumento, contenidoDocumento, remitenteDocumento, idusuario, estadoDocumento)  VALUES ('$fechaDocumento', '$ciudadDocumento', '$destinatarioDocumento', '$asuntoDocumento', '$contenidoDocumento', '$remitenteDocumento', '$idusuario', '$estadoDocumento')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';

						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Ciudad</label>
					<div class="col-sm-4">
						<select name="ciudadUsuario" class="form-control">
							<option value=""> ----- </option>
                           <option value="Barranquilla">Barranquilla</option>
									<option value="Bogota">Bogota</option>
									<option value="Bucaramanga">Bucaramanga</option>
									<option value="Cali">Cali</option>
									<option value="Cartagena">Cartagena</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha del Documento</label>
					<div class="col-sm-4">
						<input type="date" name="fechaDocumento" class="input-group date form-control" value="2012-10-08" class="date" required >
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirigido a</label>
					<div class="col-sm-4">
						<input type="text" name="destinatarioDocumento" class="form-control" placeholder="Dirigido a..." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Asunto</label>
					<div class="col-sm-4">
						<input type="text" name="asuntoDocumento" class="form-control" placeholder="Asunto " required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contenido</label>
					<div class="col-sm-4">
						<textarea name="contenidoDocumento" class="form-control" placeholder="Contenido del documento"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Remitente</label>
					<div class="col-sm-4">
						<input type="text" name="remitenteDocumento" class="form-control" placeholder="Remitente " required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="idusuario" class="form-control" placeholder="usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado Documento</label>
					<div class="col-sm-4">
						<select name="estadoDocumento" class="form-control">
							<option value=""> ----- </option>
                           <option value="Edicion">Edicion</option>
									<option value="Por Aprobar">Por Aprobar</option>
						</select>
					</div>
				</div>
				
				
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="addDto" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="documentos.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
</body>
</html>