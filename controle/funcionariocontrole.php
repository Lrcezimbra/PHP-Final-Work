<?php
include_once '../modelo/funcionario.class.php';
include_once '../dao/funcionariodao.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cadastrar':
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