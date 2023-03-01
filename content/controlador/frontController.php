<?php 

	namespace ReporteCita\Content\controlador;

	use ReporteCita\Content\config\settings\sysConfig as sysConfig;

	class frontController extends sysConfig {

		private $url;
		private $directory;
		private $controller;

		public function __construct ($request){

			if (isset($_REQUEST["url"])) {
				
				$this->url = $_REQUEST["url"];
				$objSys = new sysConfig();
				$this->directory = $objSys->_Dir_();
				$this->controller = $objSys->_Contro_();
				$this->_ValidarUrl();

			} else {

				die("<script>location='?url=cita'</script>");
			}

		}

		private function _ValidarUrl() {

			$validar = preg_match_all("/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/", $this->url);

			if ($validar == true) {
				
				$this->_loadPage($this->url);
			
			} else {

				die("Ingresa una URL valida");
			}
		}

		private function _loadPage($url) {

			if (file_exists("content/controlador/".$url."Controlador.php")) {
				
				require_once("content/controlador/".$url."Controlador.php");
			
			}else{

				$url= "cita";

				if (file_exists($this->directory.$url.$this->controller)) {
				
					die("<script>location='?url=cita'</script>");
				
				} else {

					die("no se encuentra controlador");
				}

			}
		}

	}

 ?>