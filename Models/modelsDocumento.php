<?php

class modelDocumento extends modelModelo{
	//Nombre de tabla
    public $nombre_tabla = 'DOCUMENTO';
	//LLave primaria
    public $pk = 'id_documento';
    
    //Columnas
    public $atributos = array(
        'clave'			=>array(),
		'name'			=>array(),
		'creation_date'			=>array(),
		'url'			=>array(),
		'id_subproceso'			=>array(),
    );
    
	//Variable que almacena errores
    public $errores = array( );
    
	//Variables locales para manejo de columnas
    private $clave;
	private $name;
	private $creation_date;
	private $url;
	private $id_subproceso;
	
    function proceso(){
        parent::modelo();
    }
    
    /**
		Obetener Valores de cada atributo
	**/
	public function get_clave(){
        return $this->clave;
    }
	public function get_name(){
        return $this->name;
    }
	public function get_creation_date(){
        return $this->creation_date;
    }
	public function get_url(){
        return $this->url;
    }
	public function get_id_subproceso(){
        return $this->id_subproceso;
    }
	

	/**
		Asignar valores a cada atributo
	**/
	//Asignar valor a atributo clave
    public function set_clave($valor){

		//Validar con Expresión Regular
		$this->clave = trim($valor);
    }
	//Asignar valor a atributo name
	public function set_name($valor){

		///Expresión regular para validad estructura nombre
        $er = new Er();
        if ( !$er->valida_nombre($valor) ){
            $this->errores[] = "Nombre ".$valor." NO valido ";
        }else{
			$rs = $this->consulta_sql("select * from DOCUMENTO where name = '$valor'");
			$rows = $rs->GetArray();
			
			if(count($rows) > 0){
				$this->errores[] = "Este nombre (".$valor.") ya esta registrado"; 
			}else{
				$this->nombre = trim($valor);
			}
		}
    }
	//Asignar valor a atributo creation_date
    public function set_creation_date($valor){

		//Validar con Expresión Regular
		$this->creation_date = $valor;
    }
	//Asignar valor a atributo url
    public function set_url($valor){

		//Validar con Expresión Regular
		$this->url = trim($valor);
    }
	//Asignar valor a atributo id_subproceso
    public function set_id_subproceso($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->id_subproceso = $valor;
		}else{
			$this->errores[] = "id_proceso no válido";
		}
    }
	
	
	/**
	FUNCIÓN PARA ACTUALIZAR EN BD
	
	@id		Id del atributo a modificar
	@atrib	Arreglo coon estrustura @atrib['nombre de la columna'] => Valor nuevo
	*/
	public function set_bd($id,$atrib){
		if (is_integer($id)) {
			$sql = "SELECT * FROM  " . $this->nombre_tabla . " 
                WHERE ".$this->pk." = " . $id;
			$record = $this->db->Execute($sql);
			
			$sql_update = $this->db->GetUpdateSQL($record, $atrib);
			$this->actualiza($sql_update);
		}else{
			die('OJO id no es entero (int() @variable) ');
		}
		
	}
	


	
}

?>
