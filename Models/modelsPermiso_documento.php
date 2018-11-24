<?php

class modelPermiso_documento extends modelModelo{
	//Nombre de tabla
    public $nombre_tabla = 'PERMISO_DOCUMENTO';
	//LLave primaria
    public $pk = 'id_permiso_documento';
    
    //Columnas
    public $atributos = array(
        'id_documento'	=>array(),
		'id_usuario'	=>array(),
		'view'			=>array(),
		'download'		=>array(),
		'upload'		=>array(),
    );
    
	//Variable que almacena errores
    public $errores = array( );
    
	//Variables locales para manejo de columnas
    private $id_documento;
	private $id_usuario;
	private $view;
	private $download;
	private $upload;
	
    function proceso(){
        parent::modelo();
    }
    
    /**
		Obetener Valores de cada atributo
	**/
	public function get_id_documento(){
        return $this->id_documento;
    }
	public function get_id_usuario(){
        return $this->id_usuario;
    }
	public function get_view(){
        return $this->view;
    }
	public function get_upload(){
        return $this->upload;
    }
	public function get_download(){
        return $this->download;
    }
	

	/**
		Asignar valores a cada atributo
	**/
	//Asignar valor a atributo id_documento
    public function set_id_documento($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->id_documento= $valor;
		}else{
			$this->errores[] = "id_documento no válido";
		}
    }
	//Asignar valor a atributo id_usuario
    public function set_id_usuario($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->id_usuario= $valor;
		}else{
			$this->errores[] = "id_usuario no válido";
		}
    }
	//Asignar valor a atributo view
    public function set_view($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->view = $valor;
		}else{
			$this->errores[] = "view no válido";
		}
    }
	//Asignar valor a atributo upload
    public function set_upload($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->upload = $valor;
		}else{
			$this->errores[] = "upload no válido";
		}
    }
	//Asignar valor a atributo download
    public function set_download($valor){

		//Validar con Expresión Regular
		if(is_integer($valor)){
			$this->download = $valor;
		}else{
			$this->errores[] = "download no válido";
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
