<?php
include_once '../persistencia/conexaobanco.class.php';
include_once '../modelo/cliente.class.php';

class ClienteDAO{
	
	private $conexao=null;
	
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha __construct
	
	public function cadastrarCliente($cli){
		try{
			$stat=$this->conexao->prepare("insert into clientes(idCliente,nome,razaoSocial,cnpj,endereco,telefone1,telefone2,email,site,obs)values(null,?,?,?,?,?,?,?,?,?)");
			$stat->bindValue(1,$cli->nome);
			$stat->bindValue(2,$cli->razaoSocial);
			$stat->bindValue(3,$cli->cnpj);
			$stat->bindValue(4,$cli->endereco);
			$stat->bindValue(5,$cli->telefone1);
			$stat->bindValue(6,$cli->telefone2);
			$stat->bindValue(7,$cli->email);
			$stat->bindValue(8,$cli->site);
			$stat->bindValue(9,$cli->obs);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'Erro ao cadastrar usuario';
		}//fecha catch
	}//fecha cadastrarCliente
	
	public function listarCliente(){
		try{
			$stat = $this->conexao->query("select * from clientes");
			$cliente = $stat->fetchAll(PDO::FETCH_CLASS,'Cliente');
			
			$this->conexao = null;
			return $cliente;
		
		}catch(PDOException $e){
			echo 'erro ao buscar dados';
		}//fecha catcg
	}//fecha lista
	
	public function deletarCliente($idCliente){
		try{
			$stat = $this->conexao->prepare("delete from clientes where idCliente=?");
			$stat->bindValue(1,$idCliente);
			$stat->execute();
			$this->conexao = null;
			
		}catch(PDOException $e){
			echo 'erro ao deletar';
		}//fecha catch
	}//fecha deletarCliente
	
	public function selecionarCliente($idCliente){
		try{
			$stat = $this->conexao->prepare("SELECT * FROM clientes WHERE idCliente=?");
			$stat->bindValue(1,$idCliente);
			$stat->execute();
			$cliente = $stat->fetchAll(PDO::FETCH_CLASS,'Cliente');
			
			$this->conexao = null;
			return $cliente;
			
		}catch(PDOException $e){
			echo 'erro ao selecionar';
		}//fecha catch
	}//fecha selecionarCliente
	
	public function atualizarCliente($idCliente,$cli){
		try{
			$stat = $this->conexao->prepare("update clientes set nome=?,razaoSocial=?,cnpj=?,endereco=?,telefone1=?,telefone2=?,email=?,site=?,obs=? where idCliente=?");
			$stat->bindValue(1,$cli->nome);
			$stat->bindValue(2,$cli->razaoSocial);
			$stat->bindValue(3,$cli->cnpj);
			$stat->bindValue(4,$cli->endereco);
			$stat->bindValue(5,$cli->telefone1);
			$stat->bindValue(6,$cli->telefone2);
			$stat->bindValue(7,$cli->email);
			$stat->bindValue(8,$cli->site);
			$stat->bindValue(9,$cli->obs);
			$stat->bindValue(10,$idCliente);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'erro ao atualizar';	
		}//fecha catch
	}//fecha atualizarCliente
}//fecha classe
?>