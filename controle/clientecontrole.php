<?php
include_once '../modelo/cliente.class.php';
include_once '../dao/clientedao.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cadastrar':
			$cli = new Cliente();
			
			$cli->nome = $_POST['txtNome'];
			$cli->razaoSocial = $_POST['txtRazaoSocial'];
			$cli->cnpj = $_POST['txtCnpj'];
			$cli->endereco = $_POST['txtEndereco'];
			$cli->telefone1 = $_POST['telTelefone1'];
			$cli->telefone2 = $_POST['telTelefone2'];
			$cli->email = $_POST['email'];
			$cli->site = $_POST['urlSite'];
			$cli->obs = $_POST['txtObs'];
			
			echo $cli;
			
			$cliDAO = new ClienteDAO();
			$cliDAO->cadastrarCliente($cli);
			
			header('location:../visao/guicadcliente.php');
		break;

		case 'deletar':
			$cliDAO = new ClienteDAO();
			$cliDAO->deletarCliente($_GET['idCliente']);
			header('location:../visao/guicadcliente.php');
		break;
		
		case 'editar':
			$cli = new Cliente();
			
			$cli->nome = $_POST['txtNome'];
			$cli->razaoSocial = $_POST['txtRazaoSocial'];
			$cli->cnpj = $_POST['txtCnpj'];
			$cli->endereco = $_POST['txtEndereco'];
			$cli->telefone1 = $_POST['telTelefone1'];
			$cli->telefone2 = $_POST['telTelefone2'];
			$cli->email = $_POST['email'];
			$cli->site = $_POST['urlSite'];
			$cli->obs = $_POST['txtObs'];
			
			$idCliente = $_GET['idCliente'];
			
			echo '<br />Id CLiente: '.$idCliente;
			echo $cli;
			
			$cliDAO = new ClienteDAO();
			$cliDAO->atualizarCliente($idCliente,$cli);
			header('location:../visao/guicadcliente.php');
		break;
		
		default:
			echo 'opção invalida';		
		break;
	}//fecha switch
}//fecha if
?>