<?php
	session_start();
	if(isset($_SESSION['privateUser'])){
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/funcionarios.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Sistema do Lucas</title>
        <link rel="stylesheet" href="../estilo/style.css" type="text/css" media="all" />
        <script>
			function deletarFuncionario(idFuncionario,nome) {
				var ask = window.confirm("Tem certeza que deseja deletar o funcionário " + nome + "?");
				if (ask) {
					document.location.href = '../controle/funcionariocontrole.php?op=deletar&idFuncionario='+idFuncionario;
				}
			}
		</script>
    </head>
    
    <body>
    <!-- Header -->
    <div id="header">
    	<div class="shell">
            <!-- Logo + Top Nav -->
            <div id="top">
                <h1><a href="#">SpringTime</a></h1>
                <div id="top-navigation">
                    <a href="../controle/usuariocontrole.php?op=deslogar">Log out</a>
                </div>
            </div>
            <!-- End Logo + Top Nav -->
            
            <!-- Main Nav -->
            <div id="navigation">
                <ul>
                    <li><a href="guihome.php"><span>Home</span></a></li>
                    <li><a href="guicadcliente.php"><span>Clientes</span></a></li>
                    <li><a href="guifuncionarios.php" class="active"><span>Funcionários</span></a></li>
                    <li><a href="guieventos.php"><span>Eventos</span></a></li>
                </ul>
          </div>
            <!-- End Main Nav -->
        </div>
    </div>
    <!-- End Header -->
    
    <!-- Container -->
    <div id="container">
        <div class="shell">
    
            <br />
            <!-- Main -->
            <div id="main">
                <div class="cl">&nbsp;</div>
                
                <!-- Content -->
                <div id="content">
					<!-- Box -->
                  <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                      <h2 class="left">Funcionarios</h2>
                    </div>
                    <!-- End Box Head -->
                    <!-- Table -->
                    <div class="table">
                      <table>
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Salario</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Telefone 1</th>
                            <th>Telefone 2</th>
                            <th>Email</th>
                            <th>Controle</th>
                          </tr>
                        </thead>
                        
                        <tfoot>
                          <tr>
                            <th>Nome</th>
                            <th>Salario</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Telefone 1</th>
                            <th>Telefone 2</th>
                            <th>Email</th>
                            <th>Controle</th>
                          </tr>
                        </tfoot>
                        
                        <tbody>
                        	<?php
								include '../dao/funcionariodao.class.php';
								
								$evDAO = new FuncionarioDAO();
								$dados = array();
								$dados = $evDAO->listarFuncionario();
								
								foreach($dados as $c){
									echo '<tr>';
										echo '<td><a href="guidetalhesfuncionario.php?idFuncionario='.$c->idFuncionario.'">'.$c->nome.'</a></td>';
										echo '<td>'.$c->salario.'</td>';
										echo '<td>'.$c->rg.'</td>';
										echo '<td>'.$c->cpf.'</td>';
										echo '<td>'.$c->telefone1.'</td>';
										echo '<td>'.$c->telefone2.'</td>';
										echo '<td>'.$c->email.'</td>';
										echo '<td><a onclick=\'deletarFuncionario('.$c->idFuncionario.',"'.$c->nome.'")\' class=\'ico del\'>Excluir</a>';
										echo '<a href="'."guieditfuncionario.php?idFuncionario=$c->idFuncionario".'" class="ico edit">Editar</a></td>';
									echo '</tr>';
								}//fecha foreach
								
								?>
                        </tbody>
                      </table>
                    </div>
                    <!-- Table -->
                  </div>
                  <!-- End Box -->

                  <!-- Box -->
                    <div class="box">
                        <!-- Box Head -->
                        <!-- InstanceBeginEditable name="Conteudo" -->
                        <div class="box-head">
                          <h2>Novo Funcionario</h2>
                        </div>
                        <!-- End Box Head -->
                        <form action="../controle/funcionariocontrole.php?op=cadastrar" method="post">
                          <!-- Form -->
                          <div class="form">
                            <label>*Nome: </label>
                            <input type="text" name="txtNome" placeholder="Nome" class="field size1"/>
                            <br />
                            <label>Salario: </label>
                            <input type="text" name="txtSalario" placeholder="Salario" class="field size1"/>
                            <br />
                            <label>RG: </label>
                            <input type="teste" name="txtRg" placeholder="RG" class="field size1"/>
                            <br />
                            <label>CPF: </label>
                            <input type="teste" name="txtCpf" placeholder="CPF" class="field size1"/>
                            <br />
                            <label>Endere&ccedil;o: </label>
                            <input type="text" name="txtEndereco" placeholder="Endere&ccedil;o" class="field size1"/>
                            <br />
                            <label>Telefone 1: </label>
                            <input type="tel" name="telTelefone1" placeholder="Telefone 1" class="field size1"/>
                            <br />
                            <label>Telefone 2: </label>
                            <input type="tel" name="telTelefone2" placeholder="Telefone 2" class="field size1"/>
                            <br />
                            <label>Email: </label>
                            <input type="email" name="email" placeholder="Email" class="field size1"/>
                            <br />
                            <label>Observações: </label>
                            <br />
                            <textarea name="txtObs" class="field size1" rows="10" cols="30"></textarea>
                            <br />
                          </div>
                          <!-- End Form -->
                          <!-- Form Buttons -->
                          <div class="buttons">
                            <input type="submit" class="button" value="Cadastrar" />
                            <input type="reset" class="button" value="Limpar" />
                          </div>
                          <!-- End Form Buttons -->
                        </form>
                      <!-- InstanceEndEditable --></div>
                    <!-- End Box -->
    
                </div>
                <!-- End Content -->
              <div class="cl">&nbsp;</div>			
            </div>
            <!-- Main -->
        </div>
    </div>
    <!-- End Container -->
    
    <!-- Footer -->
    <div id="footer">
        <div class="shell">
            <span class="left">&copy; 2010 - CompanyName</span>
            <span class="right">
                Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
            </span>
        </div>
    </div>
    <!-- End Footer -->
        
    </body>
<!-- InstanceEnd --></html>
<?php
}else{
header('location:../index.php');
}    
?>