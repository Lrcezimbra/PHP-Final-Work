<?php
session_start();

include_once '../modelo/cliente.class.php';
include_once '../dao/clientedao.class.php';
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
			
			if(!Validacao::validarRazaoSocial($_POST['txtRazaoSocial'])){
				$cont++;
				$erros[] = 'Razao Social Invalido';
			}
			
			if(!Validacao::validarCnpj('0987654321123467')){
				$cont++;
				$erros[] = 'CNPJ Invalido';
			}
			
			if(!Validacao::validarEndereco($_POST['txtEndereco'])){
				$cont++;
				$erros[] = 'Endereco Invalido';
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
			
			if(!Validacao::validarSite($_POST['urlSite'])){
				$cont++;
				$erros[] = 'Site Invalido';
			}
			
			if(!Validacao::validarObs($_POST['txtObs'])){
				$cont++;
				$erros[] = 'Obsservacao Invalida';
			}
			
			if($cont==0){
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
				
				$cliDAO = new ClienteDAO();
				$cliDAO->cadastrarCliente($cli);
				
				header('location:../visao/guicadcliente.php');
			}else{
				$_SESSION['erros'] = $erros;
				header('location:../visao/guierro.php');
			}
		break;

		case 'deletar':
			$cliDAO = new ClienteDAO();
			$cliDAO->deletarCliente($_GET['idCliente']);
			header('location:../visao/guicadcliente.php');
		break;
		
		case 'editar':
			$cont = 0;
			$erros = array();
			if(!Validacao::validarNome($_POST['txtNome'])){
				$cont++;
				$erros[] = 'Nome Invalido';
			}
			
			if(!Validacao::validarRazaoSocial($_POST['txtRazaoSocial'])){
				$cont++;
				$erros[] = 'Razao Social Invalido';
			}
			
			if(!Validacao::validarCnpj($_POST['txtCnpj'])){
				$cont++;
				$erros[] = 'CNPJ Invalido';
			}
			
			if(!Validacao::validarEndereco($_POST['txtEndereco'])){
				$cont++;
				$erros[] = 'Endereco Invalido';
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
			
			if(!Validacao::validarSite($_POST['urlSite'])){
				$cont++;
				$erros[] = 'Site Invalido';
			}
			
			if(!Validacao::validarObs($_POST['txtObs'])){
				$cont++;
				$erros[] = 'Obsservacao Invalida';
			}
			
			if($cont==0){
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
	
				$cliDAO = new ClienteDAO();
				$cliDAO->atualizarCliente($_GET['idCliente'],$cli);
				header('location:../visao/guicadcliente.php');
			}else{
				$_SESSION['erros'] = $erros;
				header('location:../visao/guierro.php');
			}
		break;
		
		default:
			echo 'opчуo invalida';		
		break;
	}//fecha switch
}//fecha if
?>