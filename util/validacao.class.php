<?php
class Validacao{
	
	public static function validarNome($valor){
		$exp = '/^.{2,100}$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarNome
	
	public static function validarRazaoSocial($valor){
		$exp = '/^(|[A-Za-zÁáÉéÍíÓóÚúÂâÊêÎîÔôÛûÃãÕõÀàÈèÌìÒòÙùÄäËëÏïÖöÜüÇç .]{5,100})$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarRazaoSocial
	
	public static function validarCnpj($valor){	
		$exp = '/^(|[0-9.-\/]{14,18})$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarCnpj
	
	public static function validarEndereco($valor){
		$exp = '/^(|.{5,200})$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarEndereco
	
	public static function validarTelefone($valor){
		$exp = '/^(|[0-9()\-.+]{5,20})$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarTelefone
	
	public static function validarEmail($valor){
		if($valor=='' || filter_var($valor, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarEmail
	
	public static function validarSite($valor){
		if($valor=='' || filter_var($valor, FILTER_VALIDATE_URL)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarSite
	
	public static function validarObs($valor){
		$exp = '/^.{0,2000}$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarEmail
	
	public static function validarSalario($valor){
		$exp = '/^(|[0-9]{0,6}(,|.){0,1}[0-9]{0,2})$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarSalario
	
	public static function validarRg($valor){

		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;			
		}//fecha else
	}//fecha validarRg
}//fecha classe
?>