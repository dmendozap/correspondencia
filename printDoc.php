<?php
include("conexion.php");
session_start();
$idus = $_SESSION['usuario'];
mysqli_connect($conexion,"SET lc_time_names= 'es_CO'");
$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT idDocumento, date_format(fechaDocumento,'%d de %M de %Y') as fechaDocumento, ciudadDocumento, tituloDestinatario, destinatarioDocumento, dirigidoDocumento, asuntoDocumento, contenidoDocumento, remitenteDocumento, idusuario FROM documento WHERE idDocumento='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: documentos
				.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}

			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			
			
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="http://allfont.es/allfont.css?fonts=open-sans" rel="stylesheet" type="text/css" />
    <link href="dto.css" rel="stylesheet" media="screen">
    <title>AMV - Correspondencia</title>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage">
			<div>
                <br/>
			<div style="float: left; "><?php  echo $row['ciudadDocumento'] .', '. $row['fechaDocumento']; ?></div>
			<div style="float: right; line-height: 25px;"><strong><?php echo 'AMV'.date("Y").'-00'.$row['idDocumento']; ?></strong></div>
			</div>
			<div id="destinatario">
			<p><br/><br/><br/><br/><br/></p>
			<p><strong><?php echo $row['tituloDestinatario'] ?></strong></p>
                <strong><?php  echo $row['destinatarioDocumento'] ?></strong><br/>
                <?php echo $row['dirigidoDocumento'] ?>
                <p><br/><br/></p>
                <p>
                    Asunto: <strong><?php echo $row['asuntoDocumento'] ?></strong>
                </p>
                <br/><br/>
                <p  class="text-justify">

                    <?php echo $row['contenidoDocumento']; ?>
                </p>

			</div>        
        </div>

    </div>
</div>
</body>
	</html>