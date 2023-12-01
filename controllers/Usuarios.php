<?php 

	namespace ferreteria;

	require_once('conexionBD.php');



	class Usuarios{
		
		private $nombre;
		private $telefono;
		private $correo;
		private $rol;
		private $identificacion;
		private $cone; 


		public function __construct(){

			$this->cone = new Conexion();

		}

		public function registrarUsuario($nombre,$telefono,$correo,$rol,$identificacion){

			$id = NULL;

			$sql = "INSERT INTO usuarios (Nombre, Identificacion,Telefono, Correo, Rol ) VALUES('$nombre','$identificacion','$telefono', '$correo', '$rol')";

			$query = $this->cone->prepare($sql);

			$result = $query->execute();


			return $result;

		}



		public function login($correo,$pass){



				$sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND  Identificacion = '$pass' ";

				$query = $this->cone->prepare($sql);

				$query->execute();	

				$result=$query->fetchAll(\PDO::FETCH_ASSOC);

				if ($result) {

					session_start(); 

					$_SESSION['usuario'] =  "ok";
					$result = 1;

				}else{
					$result = 2;
				}

				return $result;

		}

		public function consultarTodoUsuarios()
		{
			$sql = "SELECT *  FROM Usuarios";

			$query = $this->cone->prepare($sql);

			$query->execute();	

			$result=$query->fetchAll(\PDO::FETCH_ASSOC);

			return $result;

		}

		public function consultarUnUsuario($codigo)
		{
			$sql = "SELECT *  FROM Usuarios where Codigo = '$codigo'";

			$query = $this->cone->prepare($sql);

			$query->execute();	

			$result=$query->fetchAll(\PDO::FETCH_ASSOC);

			return $result;

		}

		public function consultarUsuario($identificacion){



				$sql = "SELECT Codigo  FROM Usuarios Where Identificacion='$identificacion'";

				$query = $this->cone->prepare($sql);

				$query->execute();	

				$result=$query->fetchAll(\PDO::FETCH_ASSOC);

				return $result;

		}



		public function actualizarUsuario($nombre,$telefono,$correo,$rol,$identificacion){


		
			$sql = "UPDATE usuarios SET Nombre='$nombre', Telefono='$telefono', Correo='$correo', Rol='$rol' WHERE Identificacion='$identificacion'";
			;


        	$cone = $this->cone;

        	$query = $cone->prepare($sql);

        	$result = $query->execute();

            
        	return $result;

		}

		public function eliminarUsuario($codigoUsuario){

			$sql = "DELETE FROM usuarios WHERE Codigo = '$codigoUsuario'";


        	$cone = $this->cone;

        	$query = $cone->prepare($sql);

        	$result = $query->execute();

            
        	return $result;

		}


	}

 ?>	