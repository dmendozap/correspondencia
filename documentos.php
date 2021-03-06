<?php 
	session_start();
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
	<link href="http://allfont.es/allfont.css?fonts=open-sans" rel="stylesheet" type="text/css" />
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Documentos</h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM documento WHERE idDocumento='$nik'");
				// escaping, additionally removing everything that could be (html/javascript-) code
			
				
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM documento WHERE idDocumento='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
				
                    <th>id</th>
							<th>fecha</th>
							<th>Destinatario</th>
                    	<th>Remitente</th>
                    	<th>Asunto</th>
                    	<th>Estado</th>
 							<th>Generado por</th>
							<th>Acciones</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($con, "SELECT d.*, concat(u.nombreUsuario,' ', u.apellidoUsuario) as usuario FROM documento as d INNER JOIN usuario as u ON d.idusuario = u.idusuario where u.correoUsuario='$idus'");
				}else{
					$sql = mysqli_query($con, "SELECT d.*, concat(u.nombreUsuario,' ', u.apellidoUsuario) as usuario FROM documento as d INNER JOIN usuario as u ON d.idusuario = u.idusuario where u.correoUsuario='$idus'");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
	
							<td><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> '.$row['idDocumento'].'</td>
							<td>'.$row['fechaDocumento'].'</td>
                     <td>'.$row['destinatarioDocumento'].'</td>
                     <td>'.$row['remitenteDocumento'].'</td>
							<td>'.$row['asuntoDocumento'].'</td>
							<td>'.$row['estadoDocumento'].'</td>
							<td>'.$row['usuario'].'</td>
							
                            
							
							<td>

								<a href="editDto.php?nik='.$row['idDocumento'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="documentos.php?aksi=delete&nik='.$row['idDocumento'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos del documento '.$row['idDocumento'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

								<a href="printDoc.php?nik='.$row['idDocumento'].'" title="Imprimir Documento" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
								<a href="saveEvidence.php?nik='.$row['idDocumento'].'" title="Adjuntar Evidencia Entrega" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; AMVSA - Departamento de Sistemas <?php echo date("Y");?></p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>