<?php 

namespace ReporteCita\Content\modelo;

use \FPDF;

	class reporteModelo extends FPDF{

		//Header
		public function Header(){

			global $title;

		    date_default_timezone_set("America/Caracas");

		    $fechaHoy = date("d/m/Y");

			$horaHoy = date("h:i A");

		    // Logo
		    $this->Image('assets/img/rombo.png',-1,-4,70);
		    $this->Image('assets/img/Logo white.png',33,15,25);
		    // Times 25
		    $this->SetFont('Times','B',26);
		    //Bajar en Y
		    $this->SetY(26);
		    // Movernos a la derecha
		    $this->Cell(69);
		    // Título
		    $this->Cell(53,10,$this->metadata['Title'],0,1,'C');
		    // Salto de línea
		    $this->SetFont('Times','B',12);

		    // Detalles
		    $this->SetY(47);
		    $this->Cell(350,1,'Detalles:',0,1,'C');

		    //Hora y Fecha
		    $this->SetFont('Times','',11);
		    $this->Ln(5);
			$this->Cell(338,1,'Fecha: '.$fechaHoy,0,1,'C');
			$this->Ln(5);
			$this->Cell(341,1,'Hora: '.$horaHoy,0,1,'C');

			//Salto de linea Tabla
		    $this->Ln(9);
		}

	// Pie de página
		public function Footer(){

				$this->SetY(-30.5);

				$this->SetFont('Times','B',8);

				$this->Cell(0,10,'__________________________________________',0,0,'C');

				$this->SetY(-25	);

				$this->SetFont('Times','I',8);

				$this->Cell(0,10,'Firma',0,0,'C');

		    // Posición: a 1,5 cm del final
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
		}

		//Reporte Personal


		public function crearReporteCita($mostrarReporte) {

			$this->AliasNbPages();
				$this->AddPage();

				$this->SetFont('Times','B',12);
				$this->SetDrawColor(255, 255, 255);
				$this->SetFillColor(156, 11, 11);
				$this->SetTextColor(236, 236, 236);

				$this->Cell(35,10,'Evento','L',0,'C',1);
				$this->Cell(30,10,'Fecha','L',0,'C',1);
				$this->Cell(25,10,'Hora','L',0,'C',1);
				$this->Cell(35,10,'Tipo de Cita','L',0,'C',1);
				$this->Cell(30,10,'Servicio','L',0,'C',1);
				$this->Cell(30,10,'Estado de Cita','L',1,'C',1);
				$this->Ln(0.4);


				foreach ($mostrarReporte as $row) {

					$tipoCita = ($row["tipoCita"] == 1)? "Persona Natural": "Empresa Jurídica";
	
					$fecha = date("d-m-Y",strtotime($row["fechaCita"]));

					$hora = date("h:i A", strtotime($row["horaCita"]));

					if ($row["estadoCita"] == 0) { $estado = "Rechazada";}

					else if ($row["estadoCita"] == 1) { $estado = "Por Aceptar";}

					else if ($row["estadoCita"] == 2) { $estado = "Aceptada";}

					else if ($row["estadoCita"] == 3) { $estado = "Cancelada";}

					$this->SetFont('Times','',12);
					$this->SetDrawColor(174, 174, 174);
					$this->SetFillColor(244, 245, 244);
					$this->SetTextColor(0,0,0);
					$this->SetLineWidth(0.4);

					$this->Cell(35,11,utf8_decode($row["nombreEvento"]),'B',0,'C',1);
					$this->Cell(30,11,$fecha,'B',0,'C',1);
					$this->Cell(25,11,$hora,'B',0,'C',1);
					$this->Cell(35,11, utf8_decode($tipoCita),'B',0,'C',1);
					$this->Cell(30,11,utf8_decode($row["servicio"]),'B',0,'C',1);
					$this->Cell(30,11,$estado,'B',1,'C',1);
					$this->Ln(0.4);

				}

			$this->Output();
		}

	}




 ?>