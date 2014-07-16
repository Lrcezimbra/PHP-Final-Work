<?php
session_start();

include_once '../modelo/funcionario.class.php';
include_once '../dao/funcionariodao.class.php';
include_once '../util/validacao.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cadastrar':
			$cont = 0;
			$erros = array();
			if(!Validacao::validarNome($_POST['txtNome'])){
				$cont++;
				$erros[] = 'Nome Invalido';
			}
			
			if(!Validacao::validarSalario($_POST['txtSalario'])){
				$cont++;
				$erros[] = 'Salario Invalido';
			}
			
			if(!Validacao::validarRg($_POST['txtRg'])){
				$cont++;
				$erros[] = 'RG Invalido';
			}
			
			if(!Validacao::validarCpf($_POST['txtCpf'])){
				$cont++;
				$erros[] = 'CPF Invalido';
			}
			
			if(!Validacao::validarEndereco($_POST['txtEndereco'])){
				$cont++;
				$erros[] = 'Endere&ccedil;o Invalido';
			}
			
			if(!Validacao::validarTelefone($_POST['telTelefone1'])){
				$cont++;
				$erros[] = 'Telefone 1 Invalido';
			}
			
			if(!Validacao::validarTelefone($_POST['telTelefone2'])){
				$cont++;
				$erros[] = 'Telefone 2 Invalido';
			}
			
			if(!Validacao::validarEmail($_POST['email'])){
				$cont++;
				$erros[] = 'Email Invalido';
			}
			
			if(!Validacao::validarObs($_POST['txtObs'])){
				$cont++;
				$erros[] = 'Obsservacao Invalida';
			}
			
			if($cont==0){
				$func = new Funcionario();
				
				$func->nome = $_POST['txtNome'];
				$func->salario = $_POST['txtSalario'];
				$func->rg = $_POST['txtRg'];
				$func->cpf = $_POST['txtCpf'];
				$func->endereco = $_POST['txtEndereco'];
				$func->telefone1 = $_POST['telTelefone1'];
				$func->telefone2 = $_POST['telTelefone2'];
				$func->email = $_POST['email'];
				$func->obs = $_POST['txtObs'];
				
				echo $func;
				
				$funcDAO = new FuncionarioDAO();
				$funcDAO->cadastrarFuncionario($func);
				
				header('location:../visao/guifuncionarios.php');
			}else{
				$_SESSION['erros'] = $erros;
				header('location:../visao/guierro.php');
			}
		break;

		case 'deletar':
			$funcDAO = new FuncionarioDAO();
			$funcDAO->deletarFuncionario($_GET['idFuncionario']);
			header('location:../visao/guifuncionarios.php');
		break;
		
		case 'editar':
			$func = new Funcionario();
			
			$func->nome = $_POST['txtNome'];
			$func->salario = $_POST['txtSalario'];
			$func->rg = $_POST['txtRg'];
			$func->cpf = $_POST['txtCpf'];
			$func->endereco = $_POST['txtEndereco'];
			$func->telefone1 = $_POST['telTelefone1'];
			$func->telefone2 = $_POST['telTelefone2'];
			$func->email = $_POST['email'];
			$func->obs = $_POST['txtObs'];
			
			$funcDAO = new FuncionarioDAO();
			$funcDAO->atualizarFuncionario($_GET['idFuncionario'],$func);
			header('location:../visao/guifuncionarios.php');
		break;
		
		default:
			echo 'opção invalida';		
		break;
	}//fecha switch
}//fecha if
?>