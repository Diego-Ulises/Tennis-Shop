<?php
	// Conexión a base de datos MySQL con PHP.
class HandlerDataBase{
	// Datos de la base de datos
	private static $usuario = "root";
	private static $password = "";
	private static $servidor = "localhost";
	private static $basededatos = "databasetap";

	public static $conexion;
	public static $db;
	
	// Declaración de una función (método)
	public static function connect() {
		// creación de la conexión a la base de datos con mysql_connect()
		static::$conexion = mysqli_connect(static::$servidor, static::$usuario, static::$password) or die ("No se ha podido conectar al servidor de Base de datos");
		
		// Selección del a base de datos a utilizar
		static::$db = mysqli_select_db(static::$conexion, static::$basededatos) or die ( "No se ha podido conectar a la base de datos" );
	}

	public static function getProduct(){
		// establecer y realizar consulta. guardamos en variable.
		$consulta = "SELECT * FROM adidasproducts";
		$resultado = mysqli_query(static::$conexion, $consulta ) or die ( "No se a podido consultar a la base de datos");
		
		// Motrar el resultado de los registro de la base de datos en una tabla
		/*echo "<table borde='2'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nombre_Producto</th>";
		echo "<th>Slug</th>";
		echo "<th>Precio</th>";
		echo "<th>Precio_Oferta</th>";
		echo "<th>Categoria</th>";
		echo "<th>Img</th>";
		echo "<th>Fecha</th>";
		echo "</tr>";*/
		
		// Bucle while que recorre cada registro y muestra cada campo en la tabla.
		$rows = array();
	    while ($row = mysqli_fetch_array($resultado)) {
	    	$rows[] = $row;
		   	/*echo "<tr>";
			echo "<td>" . $row['ID']. "</td><td>". $row['Nombre_Producto']  . "</td><td>" . $row['Slug'] . "</td><td>" . $row['Precio']   ."</td><td>" . $row['Precio_Oferta']  . "</td><td>" . $row['Categoria']   . "</td><td>" . $row['Img']   . "</td><td>" . $row['Fecha']   . "</td>";
			echo "</tr>";	*/
		}
		//echo "</table>";
	   	return $rows;
	}
	public function eliminar_tildes($cadena){
 
    	$cad= strtr(utf8_decode($cadena), utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'), 'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy'); 
		return $cad;
	}
	public static function InsertNewProduct($Nombre_Producto, $Precio, $Precio_Oferta, $Categoria, $Img, $Fecha){
		$OBJ = new HandlerDataBase;
		$Nombre_Producto= $OBJ->eliminar_tildes($Nombre_Producto);
		//echo $Nombre_Producto;
		$sentenciaInsertInto = "INSERT INTO adidasproducts (Nombre_Producto, Precio, Precio_Oferta, Categoria, Img, Fecha) VALUES ('".$Nombre_Producto."', '".$Precio."', '".$Precio_Oferta."', '".$Categoria."', '".$Img."', '".$Fecha."');";
		$resultadoInsert = mysqli_query(static::$conexion, $sentenciaInsertInto) or die ( "No se a podido insertar  a la base de datos");

		$sentenciaSelectMax = "SELECT MAX(ID) AS ID FROM adidasproducts;";
		$IdMax1 = mysqli_query(static::$conexion, $sentenciaSelectMax) or die ( "No se a podido seleccionar el ultimo ID a la base de datos");

//var_dump($IdMax1);
		$row = mysqli_fetch_row($IdMax1);
    	$max_id = $row[0];
//var_dump($max_id);
		$sentenciaUpdateSlug = "UPDATE adidasproducts SET Slug=REPLACE(LOWER('".$Nombre_Producto."'),' ','-') WHERE ID=".$max_id.";";
		$resultado = mysqli_query(static::$conexion, $sentenciaUpdateSlug) or die ( "No se a podido ACTUALIZAR a la base de datos");
	}
	public static function DeleteProduct($ID){
		//echo ("Funcion delete en proceso");
		//echo $ID;

		$sentenciaDelete="DELETE FROM adidasproducts WHERE ID = '".$ID."';";
		mysqli_query(static::$conexion, $sentenciaDelete) or die ( "No se a podido ELIMINAR a la base de datos");
	}

	public static function UpdateProduct($ID, $Nombre_Producto, $Precio, $Precio_Oferta, $Categoria, $Img, $Fecha){
		$OBJ = new HandlerDataBase;
		$Nombre_Producto= $OBJ->eliminar_tildes($Nombre_Producto);

		$senteciaUpdate ="UPDATE adidasproducts SET Nombre_Producto='".$Nombre_Producto."', Precio='".$Precio."', Precio_Oferta='".$Precio_Oferta."', Categoria='".$Categoria."', Img='".$Img."', Fecha='".$Fecha."' WHERE ID = '".$ID."';";
		mysqli_query(static::$conexion, $senteciaUpdate) or die ( "No se a podido ACTUALIZAR a la base de datos Sentencia Update");

		$sentenciaUpdateSlug = "UPDATE adidasproducts SET Slug=REPLACE(LOWER('".$Nombre_Producto."'),' ','-') WHERE ID=".$ID.";";
		mysqli_query(static::$conexion, $sentenciaUpdateSlug) or die ( "No se a podido ACTUALIZAR a la base de datos SLUG");
	}

	public static function closeConnection(){	
		// Cerrar conexión de base de datos
		mysqli_close(static::$conexion);	
	}
}
if(isset($_POST['tipo'])){
	//echo ($_POST['tipo']);
	if($_POST['tipo']=='Insertar'){
		//echo 'insert';
		HandlerDataBase::connect();
		HandlerDataBase::InsertNewProduct($_POST['nom_prod'],$_POST['precio'],$_POST['precio_oferta'],$_POST['categoria'],$_POST['img'],$_POST['fecha']);
		HandlerDataBase::closeConnection();
		$data['respuesta'] = "Correcto";
		echo json_encode($data);
	}else if($_POST['tipo']=='Eliminar'){
		//echo 'eliminar';
		HandlerDataBase::connect();
		HandlerDataBase::DeleteProduct($_POST['id_product']);
		HandlerDataBase::closeConnection();
		$data['respuesta'] = "Correcto";
		echo json_encode($data);
	}else if($_POST['tipo']=='Actualizar'){
		//echo 'actualizar';
		HandlerDataBase::connect();
		HandlerDataBase::updateProduct($_POST['id_product'],$_POST['nom_prod'],$_POST['precio'],$_POST['precio_oferta'],$_POST['categoria'],$_POST['img'],$_POST['fecha']);
		HandlerDataBase::closeConnection();
		$data['respuesta'] = "Correcto";
		echo json_encode($data);
	}
}

?>