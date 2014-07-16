<?php
class Usuario{
	private $idUsuario;
	private $login;
	private $senha;
	
	public function __get($atributo){
		return $this->$atributo;
	}	
	
	public function __set($atributo,$valor){
		$this->$atributo = $valor;
	}
	
	public function __toString(){
		return '<br />ID Usuario: '.$this->idUsuario.
			   '<br />Login: '.$this->login.
		  	   '<br />Senha: '.$this->senha;
	}//fecha toSTring
	
}//fecha classe
?>