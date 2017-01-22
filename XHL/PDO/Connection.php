/*
''' -----------------------------------------------------------------------------
''' Author   : Trx-Homie 
''' Project  : PHP PDO
''' Class    : Connection
''' Github   : HomieStart
''' License  : Creative Commons
''' -----------------------------------------------------------------------------
''' <summary>
''' This class only used for Connections with PDO
''' </summary>
''' </version>0.1
''' </version>
''' <remarks>
''' If you need any help, you can Contact me
''' </remarks>
''' <history>
'''    [FQ-HomieStart] Created
''' </history>
''' 
''' -----------------------------------------------------------------------------*/

abstract class Connection{
	protected  $RESULT_GET;
	private $HOST = "127.0.0.1"; // - TODO: You Host
	private $USER = "root"; // - TODO: You User of BD
	private $PASSWORD = ""; // - TODO: You Password of BD
	private $DATABASE;

	public function execute_Query($Query){
		$this->RESULT_GET = $db->prepare($Query) || null;
	}

	private function __destruct(){
		$this->DATABASE.Close();
	}

	public function __construct(){
		try {
			$this->DATABASE = new PDO("mysql:host=".$this->HOST.",".$this->USER.",".$this->PASSWORD);
			$this->DATABASE->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY , true);
		} catch (Exception $e) {
			console.log($e);
		}
	}

	public function Get_Connection(){
		return $this->DATABASE;
	}

	public function Set_Host($HOST){
		$this->HOST = $HOST;
	}

	public function Set_User($USER){
		$this->USER = $USER;
	}

	public function set_Password($PASSWORD){
		$this->PASSWORD = $PASSWORD;
	}

	public function Update(){
		$this->__construct();
	}
}


final class Sentence implements  Sentences {
	public function Execute_Simple_SendQuery($params = array()){
		$query = ""; // TODO: Define you Query
		$con = new Connect($query);
		$con->execute_Query($query, $params);
		return $con->get_Result_Set();
	}
	
	public function Execute_SelectQuery($params){
		$query = ""; // TODO: Define you Query
		Execute_Query($query , $params);
	}
	
	public function Execute_InsertQuery($params){
		$query = ""; // TODO: Define you Query
		return Execute_Query($query , $params);
	}
	
	public function Execute_DeleteQuery($query){
		$query = ""; // TODO: Define you Query
		return Execute_Query($query , $params);
	}
	public function Execute_UpdateQuery($query){
		$query = ""; // TODO: Define you Query
		Execute_Query($query , $params);
	}
	
	private function Execute_Query($query, $params = array()){
		$query = "";
		$dates = array();
		for($i = 0, $z =size ($params); $i < $z; $i++){
			$dates.push($params[0] = htmlentities($query));
		}
		$con = new Connect($query);
		$con->execute_Query($query, $dates);
	}
	
}


interface Sentences{
	public function Execute_SendQuery($Query);
	public function Execute_InsertQuery($Query);
	public function Execute_DeleteQuery($Query);
	public function Execute_UpdateQuery($Query);
}

final class Connect extends Connection{
	/**
	 * 
	 * @var Example of query
	 */
	private $QUERY = "use BD_Factura select nom_prod,cantidad,precio,n_factura
        from tbl_producto p,tbl_detalle_factura,tbl_cabecera_factura cf where n_factura = :n_factura";
	
	public function __construct($Query = null){
		parent::__construct();
		if($QUERY != "" || $QUERY != null){
			$this->QUERY = $QUERY;
		}
	}
	
	public function set_Query($QUERY){
		$this->QUERY = $QUERY;
	}
	
	public function get_Result_Set($array = array()){
		return $this->RESULT_GET;
	}
	
	public function get_Params($array = array()){
		try {
			if($resultado->execute($array)){
				//if($resultado->execute(array(":n_factura" => $_SESSION["n_factura"]))){
					
				// DO ANY
			}	
		} catch (Exception $e) {
			console.log($e);
		}
	}
}
