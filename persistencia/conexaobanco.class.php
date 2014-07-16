<?php
class ConexaoBanco extends PDO{
	private static $instancia;
	
	public function ConexaoBanco($dsn,$usuario,$senha){
		parent::__construct($dsn,$usuario,$senha);
	}//fecha ConexaoBanco
		
	public static function getInstancia(){
		if(!isset(self::$instancia)){
			try{
				self::$instancia = new ConexaoBanco("mysql:dbname=u347213486_final;host=localhost","root","");
			}catch(Exception $e){
				echo 'Erro ao Conectar';
				exit();
			}//fecha catch
		}//fecha if
		return self::$instancia;
	}//fecha getInstancia
}//fecha classe
?>