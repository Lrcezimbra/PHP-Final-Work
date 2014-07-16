<?php
include_once '../modelo/usuario.class.php';
include_once '../persistencia/conexaobanco.class.php';

class UsuarioDAO{
	
	private $conexao=null;
	
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha __construct
	
	public function verificarUsuario($u){
		try{
			$stat = $this->conexao->query("select * from usuario where login='$u->login' and senha='$u->senha'");
			$usuario = $stat->fetchObject('Usuario');
			
			return $usuario;
		  
		}catch(PDOException $e){
			echo 'Erro ao verificar usuario';
		}//fecha catch
	}//fecha verificarUsuario
	
}//fecha classe
?>