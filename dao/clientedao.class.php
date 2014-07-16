<?php
include '../persistencia/conexaobanco.class.php';

class ClienteDAO{
	
	private $conexao=null;
	
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha __construct
	
	
	public function cadastrarCliente($cli){
		try{
			$stat=$this->conexao->prepare("INSERT INTO `clientes`(`idcliente`, `nome`) VALUES ('5','lucas')");
			/*$stat->bindValue(1,'Lucas');
			$stat->bindValue(2,$cli->razaoSocial);
			$stat->bindValue(3,$cli->cnpj);
			$stat->bindValue(4,$cli->telefone1);
			$stat->bindValue(5,$cli->telefone2);
			$stat->bindValue(6,$cli->email);
			$stat->bindValue(7,$cli->site);
			$stat->bindValue(8,$cli->obs);*/
		}catch(PDOException $e){
			echo 'Erro ao cadastrar usuario';
		}//fecha catch
	}//fecha cadastrarCliente
	
}//fecha classe

?>