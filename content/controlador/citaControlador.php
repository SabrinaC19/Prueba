<?php 

use ReporteCita\Content\component\headElement as headElement;
use ReporteCita\Content\component\initComponent as initComponent;
use ReporteCita\Content\modelo\citaModelo as citaModelo;

	$dateModel = new citaModelo();

	$_css = new headElement();
	$_comp = new initComponent();

	if (isset($_GET["type"])) {

	
	if ($_GET["type"] == "consultar") {
		
		//instancia

		if (isset($_POST["consultarCita"])) {
			
			$mostrar = $dateModel->consultarCita();
		}
		

		if (isset($_POST["obtenerCita"])) {
			
			$mostrarData = $dateModel->obtenerCita($_POST["nroCita"]);
		}

		if (isset($_POST["updateCita"])) {

			if ($_POST["fechaNueva"] == "") {
				$_POST["fechaNueva"] = null;
			}

			if ($_POST["horaNueva"] == "") {
				$_POST["horaNueva"] = null;
			}

			$modificarData = $dateModel->getModificarCita($_POST["nroCita"], $_POST["fechaNueva"], $_POST["horaNueva"]);
		}


		if (isset($_POST["fechaIncio"]) && isset($_POST["fechaFinal"]) && isset($_POST["rEstadoCita"]) && isset($_POST["rTipoCita"])) {

				$data = $dateModel->reporteCita($_POST["fechaIncio"], $_POST["fechaFinal"], $_POST["rEstadoCita"], $_POST["rTipoCita"]);

		}


		if (isset($_POST["eliminarCita"])) {
			
			$dateModel->getAnularCita($_POST["nroCita"]);
		}

		// vista
		if (file_exists('vista/consultarCitaVista.php')) {

			require_once('vista/consultarCitaVista.php');

		} else {

			die("<script>window.location='?url=cita&type=consultar'</script>");
		}
	}

	else if ($_GET["type"] == "login") {
		
		// vista
		if (file_exists('vista/loginVista.php')) {

			require_once('vista/loginVista.php');

		} else {

			die("<script>window.location='?url=cita&type=consultar'</script>");
		}
	}

	else {

		die("<script>window.location='?url=cita&type=consultar'</script>");
	}

}

else {
	die("<script>window.location='?url=cita&type=consultar'</script>");
}

 ?>