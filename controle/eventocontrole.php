<?php
include_once '../modelo/evento.class.php';
include_once '../dao/eventodao.class.php';
include_once '../util/util.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cadastrar':
			$ev = new Evento();
			
			$ev->nome = $_POST['txtNome'];
			$ev->descricao = $_POST['txtDescricao'];
			$ev->local = $_POST['txtLocal'];
			$ev->data = Util::juntar($_POST['selDia'],$_POST['selMes'],$_POST['selAno']);
			//$ev->horario = $_POST['telTelefone1'];
			$ev->obs = $_POST['txtObs'];
	
			$evDAO = new EventoDAO();
			$evDAO->cadastrarEvento($ev);
			
			header('location:../visao/guieventos.php');
		break;

		case 'deletar':
			$evDAO = new EventoDAO();
			$evDAO->deletarEvento($_GET['idEvento']);
			header('location:../visao/guieventos.php');
		break;
		
		case 'editar':
			$ev = new Evento();
			
			$ev->nome = $_POST['txtNome'];
			$ev->descricao = $_POST['txtDescricao'];
			$ev->local = $_POST['txtLocal'];
			$ev->data = Util::juntar($_POST['selDia'],$_POST['selMes'],$_POST['selAno']);
			//$ev->horario = $_POST['telTelefone1'];
			$ev->obs = $_POST['txtObs'];
			
			$evDAO = new EventoDAO();
			$evDAO->atualizarEvento($_GET['idEvento'],$ev);
			header('location:../visao/guieventos.php');
		break;
		
		default:
			echo 'opção invalida';		
		break;
	}//fecha switch
}//fecha if


?>