<?php
include_once '../modelo/usuario.class.php';

class User{
	
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