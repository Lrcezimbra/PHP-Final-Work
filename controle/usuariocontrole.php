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
			   $erros = array();
			   
			   if(!Validacao::validarLogin($_POST['txtLogin'])){
			 	 $cont++;
				 $erros[] = 'Login invalido';
			   }
				
			   if(!Validacao::validarSenha($_POST['pwSenha'])){
			   	 $cont++;
				 $erros[] = 'senha invalida';
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