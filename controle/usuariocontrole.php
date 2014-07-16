<?php
session_start();

include_once '../util/validacao.class.php';
include_once '../util/controlelogin.class.php';
include_once '../util/util.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		
		case 'logar':
			if(isset($_POST['txtLogin']) &&
			   isset($_POST['pwSenha'])){
			   
			   $cont=0;
			   if(!Validacao::validarLogin($_POST['txtlogin'])){
			 	 $cont++;
			   }
				
			   if(!Validacao::validarSenha($_POST['txtsenha'])){
			   	 $cont++;
			   }
				
				if($cont==0){
					$login = Util::retirarEspacos($_POST['txtLogin']);
					$login = Util::escaparAspas($login);

					$senha = Util::retirarEspacos($_POST['pwSenha']);
					$senha = Util::escaparAspas($senha);	

					//Montando objeto
					$usuario = new Usuario();
					$usuario->login = $login;
					$usuario->senha = $senha;
					//Logar
					ControleLogin::logar($usuario);
					
				}else{
					$erros = array();
					$erros[] = 'Login/senha invalidos';
					$_SESSION['erros'] = $erros;
					header('location:../visao/guierro.php');
				}

			}else{
				echo 'nao existe txtlogin e/ou txtsenha';
			}
		break;
		
		case 'deslogar':
			ControleLogin::deslogar();
		break;
		
		default:
			echo 'opção invalida';		
		break;
	}//fecha switch
}//fecha if
?>