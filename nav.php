<?php

session_start();
$idus = $_SESSION['usuario'];


?>	
<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Inicio</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav ">
					<li><a href="usuarios.php">Usuarios</a></li>
					<li><a href="add.php">Agregar Usuario</a></li>
					<li><a href="documentos.php">Documentos Internos</a></li>
					<li><a href="addDto2.php">Agregar Documento Interno</a></li>




				</ul>

				<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $idus; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
				
			</div><!--/.nav-collapse -->
	</div>
