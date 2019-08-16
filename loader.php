<?php
class Loader
{
	// Declaración de una propiedad
	protected static $source;

	// Declaración de una función (método)
	public static function connect() {
		static::$source ="JSON/Products.json";
		if (file_exists(static::$source)) {
		    //echo "El fichero existe";
		    return static::$source;
		} else {
		    echo "El fichero no existe";
		}
    }

    public static function getProduct(){
    	//Leemos el JSON
    	$data_protucts=file_get_contents(Loader::connect());
		$json_products=json_decode($data_protucts);
		return $json_products;
    }
}
?>