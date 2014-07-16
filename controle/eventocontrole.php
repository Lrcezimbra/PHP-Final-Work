<?php
session_start();

include_once '../modelo/evento.class.php';
include_once '../dao/eventodao.class.php';
include_once '../util/util.class.php';
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
			
			if(!Validacao::validarDescricao($_POST['txtDescricao'])){
				$cont++;
				$erros[] = 'Descricao Invalida';
			}
			
			if(!Validacao::validarLocal($_POST['txtLocal'])){
				$cont++;
				$erros[] = 'Local Invalido';
			}
			
			if(!Validacao::validarData($_POST['selDia'],$_POST['selMes'],$_POST['selAno'])){
				$cont++;
				$erros[] = 'Data Invalida';
			}
			
			if(!Validacao::validarHorario($_POST['txtHorario'])){
				$cont++;
				$erros[] = 'Horario Invalido';
			}
			
			if(!Validacao::validarObs($_POST['txtObs'])){
				$cont++;
				$erros[] = 'Observacao Invalido';
			}
						
			if($cont==0){
				$ev = new Evento();
				
				$ev->nome = $_POST['txtNome'];
				$ev->descricao = $_POST['txtDescricao'];
				$ev->local = $_POST['txtLocal'];
				$ev->data = Util::juntar($_POST['selDia'],$_POST['selMes'],$_POST['selAno']);
				$ev->horario = $_POST['txtHorario'];
				$ev->obs = $_POST['txtObs'];
		
				$evDAO = new EventoDAO();
				$evDAO->cadastrarEvento($ev);
				
				header('location:../visao/guieventos.php');
			}else{
				$_SESSION['erros'] = $erros;
				header('location:../visao/guierro.php');	
			}
		break;

		case 'deletar':
			$evDAO = new EventoDAO();
			$evDAO->deletarEvento($_GET['idEvento']);
			header('location:../visao/guieventos.php');
		break;
		
		case 'editar':
			$cont = 0;
			$erros = array();
			if(!Validacao::validarNome($_POST['txtNome'])){
				$cont++;
				$erros[] = 'Nome Invalido';
			}
			
			if(!Validacao::validarDescricao($_POST['txtDescricao'])){
				$cont++;
				$erros[] = 'Descricao Invalida';
			}
			
			if(!Validacao::validarLocal($_POST['txtLocal'])){
				$cont++;
				$erros[] = 'Local Invalido';
			}
			
			if(!Validacao::validarData($_POST['selDia'],$_POST['selMes'],$_POST['selAno'])){
				$cont++;
				$erros[] = 'Data Invalida';
			}
			
			if(!Validacao::validarHorario($_POST['txtHorario'])){
				$cont++;
				$erros[] = 'Horario Invalido';
			}
			
			if(!Validacao::validarObs($_POST['txtObs'])){
				$cont++;
				$erros[] = 'Observacao Invalido';
			}
						
			if($cont==0){
				$ev = new Evento();
				
				$ev->nome = $_POST['txtNome'];
				$ev->descricao = $_POST['txtDescricao'];
				$ev->local = $_POST['txtLocal'];
				$ev->data = Util::juntar($_POST['selDia'],$_POST['selMes'],$_POST['selAno']);
				$ev->horario = $_POST['txtHorario'];
				$ev->obs = $_POST['txtObs'];
				
				$evDAO = new EventoDAO();
				$evDAO->atualizarEvento($_GET['idEvento'],$ev);
				header('location:../visao/guieventos.php');
			}else{
				$_SESSION['erros'] = $erros;
				header('location:../visao/guierro.php');	
			}
		break;
		
		default:
			echo 'opção invalida';		
		break;
	}//fecha switch
}//fecha if


?>