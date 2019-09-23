
<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='index.html'>Login</a>";

   header('Location: http://localhost/correspondencia/index.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/correspondencia/index.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='index.html'>Inicia Sesion</a>";
exit;
}
?>
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

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Usuarios</h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM usuario WHERE idusuario='$nik'");
				// escaping, additionally removing everything that could be (html/javascript-) code
			
				
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM usuario WHERE idusuario='$nik'");
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
					<th>Nombre</th>
					<th>Apellidos</th>
                    
                    <th>Ciudad</th>
                    <th>Acciones</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($con, "SELECT * FROM usuario");
				}else{
					$sql = mysqli_query($con, "SELECT * FROM usuario");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							
							<td>'.$row['idusuario'].'</td>
							<td><a href="profile.php?nik='.$row['idusuario'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombreUsuario'].'</a></td>
                            <td>'.$row['apellidoUsuario'].'</td>
                            
							<td>'.$row['ciudadUsuario'].'</td>
							
                            
							
							<td>

								<a href="edit.php?nik='.$row['idusuario'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$row['idusuario'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombreUsuario'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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