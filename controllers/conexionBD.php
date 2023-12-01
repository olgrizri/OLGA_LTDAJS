<?php

	namespace ferreteria;

	class Conexion extends \PDO{

	private $type = "mysql";
	private $host= "localhost";
	private $dbname= "olgalt";
	private $user= "root";
	private $password= "";

	function __construct(){

		try{

		parent::__construct("$this->type:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

		$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);



		}catch(\exception $e){

			echo "Error de base de datos ferreteria.";

		}

	}

	
}


 ?>



 