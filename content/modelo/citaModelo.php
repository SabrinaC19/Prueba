<?php 

namespace ReporteCita\Content\modelo;

use ReporteCita\Content\config\connect\connectDB as connectDB;

use ReporteCita\Content\modelo\reporteModelo as reporteModelo;

class citaModelo extends connectDB{
	
	private $conex;

	private $fechaInicial;
	private $fechaFinal;
	private $estadoCita;
	private $tipoCita; 


	public function __construct(){
		
		parent::__construct();

		$this->conex = parent::activeDB();
	}


	
	public function consultarCita() {

		$consultaCita = $this->conex->prepare("SELECT `nroCita`, `nombreEvento`, `servicio`, `fechaCita`, `horaCita`, `tipoCita`, `estadoCita`  FROM `tblcitasreservacion` WHERE (`estadoCita` = 1 OR `estadoCita` = 2) AND `fechaCita` >= CURDATE() ORDER BY `fechaCita`, `horaCita` ASC");

		$consultaCita->execute();

		$mostrarCita = $consultaCita->fetchAll(\PDO::FETCH_OBJ);

		echo json_encode($mostrarCita);
		die();

	}


	public function reporteCita($fechaInicial, $fechaFinal, $estadoCita, $tipoCita) {

		date_default_timezone_set("America/Caracas");

		$hoy = date("Y-m-d");

		$valFecha = strtotime("{$hoy}+1 year");

		if (isset($fechaInicial) || strtotime($fechaInicial) < strtotime(date("Y-m-d")) || strtotime($fechaInicial) < strtotime($fechaFinal)) {
				
			$this->fechaInicial = $fechaInicial;

		} else {

			$respuesta = array("status" => 0, "descripcion" => "Fecha Inicial Invalida");
			echo json_encode($respuesta);
			die();
		}

		if (isset($fechaFinal) || strtotime($fechaFinal) > strtotime($fechaInicial)) {
			
			if ( strtotime($fechaFinal) < $valFecha) {

					$this->fechaFinal = $fechaFinal;
				}else {

					$respuesta = array("status" => 0, "descripcion" => "La Fecha Final Es Mayor a Un Año, Ingrese Una Menor");
					echo json_encode($respuesta);
					die();
				}	
		} else {

			$respuesta = array("status" => 0, "descripcion" => "Fecha Final Invalida");
			echo json_encode($respuesta);
			die();
		}

		if (preg_match_all("/^[0-4\-]{1}$/", $estadoCita)) {
			
			$this->estadoCita = $estadoCita;

		} else {

			$respuesta = array("status" => 0, "descripcion" => "Estado invalido");
			echo json_encode($respuesta);
			die();
		}
		
		if (preg_match_all("/^[0-2\-]{1}$/", $tipoCita)) {
			
			$this->tipoCita = $tipoCita;

		} else {

			$respuesta = array("status" => 0, "descripcion" => "Tipo de Cita invalida");
			echo json_encode($respuesta);
			die();
		}

		if (isset($this->fechaInicial) && isset($this->fechaFinal) && $this->estadoCita != 4 && $this->tipoCita != 0) {
			
			$sql = "SELECT  `nombreEvento`, `fechaCita`, `horaCita`, `servicio`, `espacio`, `razonSocial`, `tipoCita`, `estadoCita` FROM `tblcitasreservacion` WHERE `fechaCita` BETWEEN :fechaInicial AND :fechaFinal AND `estadoCita`= :estadoCita  AND `tipoCita` = :tipoCita ORDER BY `fechaCita` ASC";
			
			$execute = array(':fechaInicial' => $this->fechaInicial, ':fechaFinal' => $this->fechaFinal, ':estadoCita' => $this->estadoCita, ':tipoCita' => $this->tipoCita);
		}

		else if (isset($this->fechaInicial) && isset($this->fechaFinal) && $this->estadoCita == 4 && $this->tipoCita != 0) {

			$sql = "SELECT  `nombreEvento`, `fechaCita`, `horaCita`, `servicio`, `espacio`, `razonSocial`, `tipoCita`, `estadoCita` FROM `tblcitasreservacion` WHERE `fechaCita` BETWEEN :fechaInicial AND :fechaFinal AND `tipoCita` = :tipoCita ORDER BY `fechaCita` ASC";

			$execute = array(':fechaInicial' => $this->fechaInicial, ':fechaFinal' => $this->fechaFinal,':tipoCita' => $this->tipoCita);
		}

		else if (isset($this->fechaInicial) && isset($this->fechaFinal) && $this->estadoCita != 4 && $this->tipoCita == 0) {

			$sql = "SELECT  `nombreEvento`, `fechaCita`, `horaCita`, `servicio`, `espacio`, `razonSocial`, `tipoCita`, `estadoCita` FROM `tblcitasreservacion` WHERE `fechaCita` BETWEEN :fechaInicial AND :fechaFinal AND `estadoCita`= :estadoCita ORDER BY `fechaCita` ASC";
			
			$execute = array(':fechaInicial' => $this->fechaInicial, ':fechaFinal' => $this->fechaFinal, ':estadoCita' => $this->estadoCita);

		}

		else if (isset($this->fechaInicial) && isset($this->fechaFinal) && $this->estadoCita == 4 && $this->tipoCita == 0) {

			$sql = "SELECT  `nombreEvento`, `fechaCita`, `horaCita`, `servicio`, `espacio`, `razonSocial`, `tipoCita`, `estadoCita` FROM `tblcitasreservacion` WHERE `fechaCita` BETWEEN :fechaInicial AND :fechaFinal ORDER BY `fechaCita` ASC";
			
			$execute = array(':fechaInicial' => $this->fechaInicial, ':fechaFinal' => $this->fechaFinal);

		} else {

			$respuesta = array("status" => 0, "descripcion" => "Ingrese Parámetros Correcto Para Elaborar el Reporte");
			echo json_encode($respuesta);
			die();
		}

		try {
			
			$consultaReporte = $this->conex->prepare($sql);

			$consultaReporte->execute($execute);

			$mostrarReporte = $consultaReporte->fetchAll();

			if (isset($mostrarReporte[0])) {
				
				$pdf = new reporteModelo();

				$pdf->SetTitle("Reporte de Citas");

				return $pdf->crearReporteCita($mostrarReporte);

			} else {

				return ("<script>
	            
		           			const Toast = Swal.mixin({
		            			toast: true,
		           				position: 'top-end',
		            			showConfirmButton: false,
		            			timer: 3000,
		            			timerProgressBar: true,
		           	 			didOpen: (toast) => {
		              			toast.addEventListener('mouseenter', Swal.stopTimer)
		              			toast.addEventListener('mouseleave', Swal.resumeTimer)
		            		}
		         			 })

	          				Toast.fire({
	            				icon: 'error',
	            				title: 'No Existen Citas con la Solicitud Ingresada'
	          				})
	       				</script>");
			}

		} catch (Exception $error) {
		
			return $error;	
		
		}		
	}
}

 ?>