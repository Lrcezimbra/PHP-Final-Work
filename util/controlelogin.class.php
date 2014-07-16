<?php
include_once '../dao/usuariodao.class.php';

class ControleLogin{
	public static function logar($u){
		$uDAO = new UsuarioDAO();
		$usuario = $uDAO->verificarUsuario($u);
		
		if($usuario && !is_null($usuario)){
			$_SESSION['privateUser']=serialize($usuario);
			header('location:../visao/guihome.php'); 
		}else{
			$_SESSION['erros']='login/senha invalidos';
			header('location:../visao/guierro.php');
		}//fecha else
	}//fecha método
	
	public static function deslogar(){
		unset($_SESSION['privateUser']);
		$_SESSION['erros'] = 'voce foi deslogado';
		header('location:../visao/guihome.php');
	}
	
	public static function verificarAcesso(){
		if(!isset($_SESSION['privateUser'])){
			$_SESSION['erros'] = 'voce nao esta logado';
			header('location:../visao/guihome.php');
		}//fecha if
	}//fecha método
}//fecha classe 
?>