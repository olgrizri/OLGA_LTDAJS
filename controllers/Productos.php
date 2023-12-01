<?php 

	namespace ferreteria;

	require_once('conexionBD.php');



	class Productos{
		
		private $nombre;
		private $marca;
		private $tipoProducto;
		private $origenProducto;
		private $cantidad;
		private $costo;
		private $valorVenta;
		private $fechaFabricacion;
		private $proveedor;
		private $garantia;
		private $cone;


		public function __construct(){

			$this->cone = new Conexion();

		}

		public function registrarProducto($nombre,$marca,$tipoProducto,$origenProducto,$cantidad,$costo,$valorVenta,$fechaFabricacion,$proveedor,$garantia){

		
			$sql = "INSERT INTO Productos (Nombre,Marca,TipoProducto,OrigenProducto,Cantidad,ValorCosto,ValorVenta,FechaFabricacion,Proveedor,GarantiaProveedor) VALUES('$nombre', '$marca', '$tipoProducto', '$origenProducto', '$cantidad', '$costo', '$valorVenta', '$fechaFabricacion', '$proveedor', '$garantia')";


			$query = $this->cone->prepare($sql);

			$result = $query->execute();


			return $result;

		}



		public function consultarTodoProductos()
		{
			$sql = "SELECT *  FROM Productos";

			$query = $this->cone->prepare($sql);

			$query->execute();	

			$result=$query->fetchAll(\PDO::FETCH_ASSOC);

			return $result;

		}

		public function consultarUnProducto($codigo)
		{
			$sql = "SELECT *  FROM Productos where CodigoProducto = '$codigo'";

			$query = $this->cone->prepare($sql);

			$query->execute();	

			$result=$query->fetchAll(\PDO::FETCH_ASSOC);

			return $result;

		}

		public function consultarProducto($codigoProducto){



				$sql = "SELECT CodigoProducto  FROM Productos Where CodigoProducto='$codigoProducto'";


				$query = $this->cone->prepare($sql);

				$query->execute();	

				$result=$query->fetchAll(\PDO::FETCH_ASSOC);

				return $result;

		}

		public function actualizarProducto($nombre,$marca,$tipoProducto,$origenProducto,$cantidad,$costo,$valorVenta,$fechaFabricacion,$proveedor,$garantia,$codigoProducto){


		
			$sql = "UPDATE Productos SET Nombre='$nombre', Marca='$marca', TipoProducto='$tipoProducto', OrigenProducto='$origenProducto', Cantidad=$cantidad, ValorCosto=$costo, ValorVenta=$valorVenta, FechaFabricacion='$fechaFabricacion', Proveedor='$proveedor', GarantiaProveedor='$garantia' WHERE CodigoProducto=$codigoProducto";


        	$cone = $this->cone;

        	$query = $cone->prepare($sql);

        	$result = $query->execute();

            
        	return $result;

		}

		public function eliminarProducto($codigoProducto){

			$sql = "DELETE FROM Productos WHERE CodigoProducto = $codigoProducto";

        	$cone = $this->cone;

        	$query = $cone->prepare($sql);

        	$result = $query->execute();

            
        	return $result;

		}


	}

 ?>	