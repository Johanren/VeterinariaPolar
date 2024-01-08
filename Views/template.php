<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="Views/css/narvar.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<link rel="icon" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/VeterinariaPolar/Views/img/icon.jpg">
	<link rel="stylesheet" href="Views/css/bootstrap.min.css">
	<link rel="stylesheet" href="Views/css/css.css">
	<title>Veterinaria Polar</title>

</head>

<body id="body-pd">
	<header>
		<br><br><br>
		<?php
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 'inicio' && $_GET['action'] == 'ingresar' && $_GET['action'] == 'salir') {
			} else {
				$evento = new ControladorEvento();
				$evento->consultarEventoControlador();
			}
		}

		include('Views/Moduls/navar.php');
		?>
	</header>
	<section>
		<div class="col py-3">
			<?php
			$mvc = new controladorViews();
			$mvc->enlacesPaginaControlador();
			?>
		</div>
	</section>
	<script src="Views/js/file.js"></script>
	<script src="Views/js/narvar.js"></script>
	<script src="Views/js/agregarProblema.js"></script>
	<script src="Views/js/autocomplete.js"></script>
	<script src="Views/js/validarPassword.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>