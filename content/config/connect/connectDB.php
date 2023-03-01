<?php 


	namespace ReporteCita\Content\config\connect;
	use ReporteCita\Content\config\settings\sysConfig as sysConfig;
	use \PDO;

	class connectDB extends sysConfig {

		private $localHost;
		private $user;
		private $password;
		private $dataBase;
		private $con;

		public function __construct(){

			$this->localHost = parent::_Server_();
			$this->user = parent::_User_();
			$this->password = parent::_Pass_();
			$this->dataBase = parent::_Db_();

		}

		protected function activeDB() {

			try {

				$this->con = new \PDO("mysql: host=" . $this->localHost . "; dbname=" . $this->dataBase, $this->user, $this->password);
				$this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				
			} catch (PDOException $error) {
				
				die('ERROR DE CONEXIÓN: No se ha podido conectar con la base de datos. '. $ms->getMessage());
			}

			return $this->con;
		}

	}




 ?>