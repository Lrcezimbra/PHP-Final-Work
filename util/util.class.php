<?php
class Util{
	public static function juntar($dia,$mes,$ano){
		$array[] = $ano;
		$array[] = $mes;
		$array[] = $dia;
		
		return implode('-',$array);
	}//fecha juntar
	
	public static function retirarEspacos($valor){
		return trim($valor);
	}//fecha m�todo
	
	public static function escaparAspas($valor){
		return addslashes($valor);
	}//fecha m�todo
}//fecha classe
?>