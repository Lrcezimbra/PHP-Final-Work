<?php
class Util{
	public static function juntar($dia,$mes,$ano){
		$array[] = $ano;
		$array[] = $mes;
		$array[] = $dia;
		
		return implode('-',$array);
	}//fecha juntar
}//fecha classe
?>