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
        <h2>Documentos &raquo; Editar datos</h2>
        <hr />

        <?php
        // escaping, additionally removing everything that could be (html/javascript-) code
        if(filter_input(INPUT_POST, 'btnGuardar')) {

            /*propiedades del archivo*/
            $archivo_nombre = $_FILES['archivo']['name'];
            $archivo_tipo = $_FILES['archivo']['type'];
            $archivo_temp = $_FILES['archivo']['tmp_name'];
            $idDocumento = $_GET["nik"];



        }
        echo $idDocumento;
        echo $archivo_nombre;


?>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label  class="col-sm-3 control-label" for="img">Ajuntar evidencia para el documento <?php echo $idDocumento;?> </label>
                <div class="col-sm-4">
                    <input type="file" name="archivo" class="form-control" title="Buscar archivo..." required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-6">
                    <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar Evidencia">
                    <a href="documentos.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>
</html>