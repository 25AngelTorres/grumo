<?php
/*
Contine las clases 
*/
	
	
	class controllerProceso extends modelProceso {
		
		public $muestra_errores = false;
		
		public function array_bd(){
			$rs = $this->consulta_sql("SELECT * FROM proceso");
			$rows = $rs->GetArray();
			
			echo("<pre>");
			print_r($rows);
			echo("</pre>");
			die();
			
		}
		
	}
?>