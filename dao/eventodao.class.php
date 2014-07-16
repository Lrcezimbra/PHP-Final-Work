<?php
include_once '../persistencia/conexaobanco.class.php';
include_once '../modelo/evento.class.php';

class EventoDAO{
	
	private $conexao=null;
	
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha __construct
	
	public function cadastrarEvento($ev){
		try{
			$stat=$this->conexao->prepare("insert into evento(idEvento,nome,descricao,local,data,horario,obs)values(null,?,?,?,?,?,?)");
			$stat->bindValue(1,$ev->nome);
			$stat->bindValue(2,$ev->descricao);
			$stat->bindValue(3,$ev->local);
			$stat->bindValue(4,$ev->data);
			$stat->bindValue(5,$ev->horario);
			$stat->bindValue(6,$ev->obs);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'Erro ao cadastrar evento';
		}//fecha catch
	}//fecha cadastrarEvento
	
	public function listarEvento(){
		try{
			$stat = $this->conexao->query("select * from evento ORDER BY data ASC");
			$evento = $stat->fetchAll(PDO::FETCH_CLASS,'Evento');
			
			$this->conexao = null;
			return $evento;
		
		}catch(PDOException $e){
			echo 'erro ao buscar dados';
		}//fecha catcgh
	}//fecha listarEvento
	
	public function deletarEvento($idEvento){
		try{
			$stat = $this->conexao->prepare("delete from evento where idEvento=?");
			$stat->bindValue(1,$idEvento);
			$stat->execute();
			$this->conexao = null;
			
		}catch(PDOException $e){
			echo 'erro ao deletar';
		}//fecha catch
	}//fecha deletarEvento
	
	public function selecionarEvento($idEvento){
		try{
			$stat = $this->conexao->prepare("SELECT * FROM evento WHERE idEvento=?");
			$stat->bindValue(1,$idEvento);
			$stat->execute();
			$evento = $stat->fetchAll(PDO::FETCH_CLASS,'Evento');
			
			$this->conexao = null;
			return $evento;
			
		}catch(PDOException $e){
			echo 'erro ao selecionar';
		}//fecha catch
	}//fecha selecionarEvento
	
	public function atualizarEvento($idEvento,$ev){
		try{
			$stat = $this->conexao->prepare("update evento set nome=?,descricao=?,local=?,data=?,horario=?,obs=? where idEvento=?");
			$stat->bindValue(1,$ev->nome);
			$stat->bindValue(2,$ev->descricao);
			$stat->bindValue(3,$ev->local);
			$stat->bindValue(4,$ev->data);
			$stat->bindValue(5,$ev->horario);
			$stat->bindValue(6,$ev->obs);
			$stat->bindValue(7,$idEvento);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'erro ao atualizar';	
		}//fecha catch
	}//fecha atualizarEvento
}//fecha classe

?>