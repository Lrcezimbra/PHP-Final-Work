<?php
include_once '../persistencia/conexaobanco.class.php';
include_once '../modelo/funcionario.class.php';

class FuncionarioDAO{
	
	private $conexao=null;
	
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha __construct
	
	public function cadastrarFuncionario($func){
		try{
			$stat=$this->conexao->prepare("insert into funcionario(idFuncionario,nome,rg,cpf,endereco,telefone1,telefone2,email,obs)values(null,?,?,?,?,?,?,?,?)");
			$stat->bindValue(1,$func->nome);
			$stat->bindValue(2,$func->rg);
			$stat->bindValue(3,$func->cpf);
			$stat->bindValue(4,$func->endereco);
			$stat->bindValue(5,$func->telefone1);
			$stat->bindValue(6,$func->telefone2);
			$stat->bindValue(7,$func->email);
			$stat->bindValue(8,$func->obs);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'Erro ao cadastrar usuario';
		}//fecha catch
	}//fecha cadastrarFuncionario
	
	public function listarFuncionario(){
		try{
			$stat = $this->conexao->query("select * from funcionario");
			$funcionario = $stat->fetchAll(PDO::FETCH_CLASS,'Funcionario');
			
			$this->conexao = null;
			return $funcionario;
		
		}catch(PDOException $e){
			echo 'erro ao buscar dados';
		}//fecha catcg
	}//fecha lista
	
	public function deletarFuncionario($idFuncionario){
		try{
			$stat = $this->conexao->prepare("delete from funcionario where idFuncionario=?");
			$stat->bindValue(1,$idFuncionario);
			$stat->execute();
			$this->conexao = null;
			
		}catch(PDOException $e){
			echo 'erro ao deletar';
		}//fecha catch
	}//fecha deletarFuncionario
	
	public function selecionarFuncionario($idFuncionario){
		try{
			$stat = $this->conexao->prepare("SELECT * FROM Funcionario WHERE idFuncionario=?");
			$stat->bindValue(1,$idFuncionario);
			$stat->execute();
			$funcionario = $stat->fetchAll(PDO::FETCH_CLASS,'Funcionario');
			
			$this->conexao = null;
			return $funcionario;
			
		}catch(PDOException $e){
			echo 'erro ao selecionar';
		}//fecha catch
	}//fecha selecionarFuncionario
	
	public function atualizarFuncionario($idFuncionario,$func){
		try{
			$stat = $this->conexao->prepare("update funcionario set nome=?,rg=?,cpf=?,endereco=?,telefone1=?,telefone2=?,email=?,obs=? where idCliente=?");
			$stat->bindValue(1,$func->nome);
			$stat->bindValue(2,$func->rg);
			$stat->bindValue(3,$func->cpf);
			$stat->bindValue(4,$func->endereco);
			$stat->bindValue(5,$func->telefone1);
			$stat->bindValue(6,$func->telefone2);
			$stat->bindValue(7,$func->email);
			$stat->bindValue(8,$func->obs);
			$stat->bindValue(9,$idFuncionario);
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'erro ao atualizar';	
		}
}
}//fecha classe

?>