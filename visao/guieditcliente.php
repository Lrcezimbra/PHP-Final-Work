<?php
	session_start();
	if(isset($_SESSION['privateUser'])){
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/cliente.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Sistema do Lucas</title>
        <link rel="stylesheet" href="../estilo/style.css" type="text/css" media="all" />
        <script>
			function deletarCliente(idCliente,nome) {
				var ask = window.confirm("Tem certeza que deseja deletar o cliente " + nome + "?");
				if (ask) {
					document.location.href = '../controle/clientecontrole.php?op=deletar&idCliente='+idCliente;
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
                    <li><a href="guicadcliente.php" class="active"><span>Clientes</span></a></li>
                    <li><a href="guifuncionarios.php"><span>Funcionários</span></a></li>
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
                            <h2 class="left">Clientes</h2>
                        </div>
                        <!-- End Box Head -->	
    
                        <!-- Table -->
                        <div class="table">
                            <table>
                            	<thead>
                                	<tr>
                                        <th>Nome</th>
                                        <th>Razão Social</th>
                                        <th>Telefone</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Site</th>
                                        <th>Controle</th>
									</tr>
                                </thead>
                                <tfoot>
									<tr>
                                        <th>Nome</th>
                                        <th>Razão Social</th>
                                        <th>Telefone</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Site</th>
                                        <th>Controle</th>
									</tr>
                                </tfoot>
                                <tbody>
									<?php
									include '../dao/clientedao.class.php';
									
									$cliDAO = new ClienteDAO();
									$dados = array();
									$dados = $cliDAO->listarCliente();
									
									foreach($dados as $c){
										echo '<tr>';
											echo '<td><a href="guidetalhes.php?idCliente='.$c->idCliente.'">'.$c->nome.'</a></td>';
											echo '<td>'.$c->razaoSocial.'</td>';
											echo '<td>'.$c->telefone1.'</td>';
											echo '<td>'.$c->telefone2.'</td>';
											echo '<td>'.$c->email.'</td>';
											echo '<td>'.$c->site.'</td>';
											echo '<td><a onclick=\'deletarCliente('.$c->idCliente.',"'.$c->nome.'")\' class=\'ico del\'>Excluir</a>';
											echo '<a href="'."guieditcliente.php?idCliente=$c->idCliente".'" class="ico edit">Editar</a></td>';
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
                            <h2>Editar Cliente</h2>
                        </div>
                        <!-- End Box Head -->
						<?php
						echo '<form action="../controle/clientecontrole.php?op=editar&idCliente='.$_GET['idCliente'].'" method="post">
                           	  <!-- Form -->
                              <div class="form">';
							  
								include_once '../dao/clientedao.class.php';
								
								$cliDAO = new ClienteDAO();
								$dados = array();
								$dados = $cliDAO->selecionarCliente($_GET['idCliente']);
								
								foreach($dados as $d){
									echo '<label>Nome: </label><input type="text" name="txtNome" placeholder="Nome" class="field size1" value="'.$d->nome.'"/><br />
									<label>Raz&atilde;o Social: </label><input type="text" name="txtRazaoSocial" placeholder="Raz&atilde;o Social" class="field size1" value="'.$d->razaoSocial.'"/><br />
									<label>CNPJ: </label><input type="teste" name="txtCnpj" placeholder="CNPJ" class="field size1" value="'.$d->cnpj.'"/><br />
									<label>Endere&ccedil;o: </label><input type="text" name="txtEndereco" placeholder="Endere&ccedil;o" class="field size1" value="'.$d->endereco.'"/><br />
									<label>Telefone 1: </label><input type="tel" name="telTelefone1" placeholder="Telefone 1" class="field size1" value="'.$d->telefone1.'"/><br />
									<label>Telefone 2: </label><input type="tel" name="telTelefone2" placeholder="Telefone 2" class="field size1" value="'.$d->telefone2.'"/><br />
									<label>Email: </label><input type="email" name="email" placeholder="Email" class="field size1" value="'.$d->email.'"/><br />
									<label>Site: </label><input type="url" name="urlSite" placeholder="Site" class="field size1" value="'.$d->site.'"/><br />
									<label>Observações: </label><br />
									<textarea name="txtObs" class="field size1" rows="10" cols="30">'.$d->obs.'</textarea>';
								}
								?>
                                <br />                  
                            </div>
                            <!-- End Form -->
                            
                            <!-- Form Buttons -->
                            <div class="buttons">
                                <input type="submit" class="button" value="Atualizar" />
                                <input type="reset" class="button" value="Limpar Mudanças" />
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