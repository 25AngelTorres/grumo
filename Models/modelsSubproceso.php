<?php

class modelSubproceso extends modelModelo{
	//Nombre de tabla
    public $nombre_tabla = 'SUBPROCESO';
	//LLave primaria
    public $pk = 'id_subproceso';
    
    //Columnas
    public $atributos = array(
        'name'			=>array(),
		'id_proceso'			=>array(),
    );
    
	//Variable que almacena errores
    public $errores = array( );
    
	//Variables locales para manejo de columnas
    private $name;
	private $id_proceso;
	
    function subproceso(){
        parent::modelo();
    }
    
    /**
		Obetener Valores de cada atributo
	**/
	public function get_name(){
        return $this->name;
    }public function get_id_proceso(){
        return $this->id_proceso;
    }
	

	/**
		Asignar valores a cada atributo
	**/
	//Asignar valor a atributo nombre
    public function set_name($valor){

		///Expresión regular para validad estructura nombre
        $er = new Er();
        if ( !$er->valida_nombre($valor) ){
            $this->errores[] = "Nombre ".$valor." NO valido ";
        }else{
			$rs = $this->consulta_sql("select * from SUBPROCESO where name = '$valor'");
			$rows = $rs->GetArray();
			
			if(count($rows) > 0){
				$this->errores[] = "Este nombre (".$valor.") ya esta registrado"; 
			}else{
				$this->nombre = trim($valor);
			}
		}
    }
	//Asignar valor a atributo id_proceso
    public function set_id_proceso($valor){
		if(is_integer($valor)){
			$this->id_proceso = $valor;
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
