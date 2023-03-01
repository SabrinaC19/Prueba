<?php 

namespace ReporteCita\Content\config\settings;

	define("_ROUTE_", "http://localhost/reporte_Cita/");
	define("_CON_", "Controlador.php");
	define("_DIR_", "content/controlador/");
	define("_DB_", "reporte_cita");
	define("_USER_", "root");
	define("_PASS_", "");
	define("_SERVER_", "localhost");

	class sysConfig {

		public function existController(){

			if (!file_exists("content/controlador/frontController.php")) {
				die('Error: no se encontro el frontController');
			}
		}

		protected function _Contro_(){

			return _CON_;
		}

		protected function _Dir_(){

			return _DIR_;
		}

		protected function _Route_(){

			return _ROUTE_;
		}

		protected function _Db_(){

			return _DB_;
		}

		protected function _User_(){

			return _USER_;
		}

		protected function _Pass_(){

			return _PASS_;
		}

		protected function _Server_(){

			return _SERVER_;
		}
	}

 ?>