<?php
	session_start();
	if(isset($_SESSION['privateUser'])){
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/evento.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Sistema do Lucas</title>
        <link rel="stylesheet" href="../estilo/style.css" type="text/css" media="all" />
        <script>
			function deletarEvento(idEvento,nome) {
				var ask = window.confirm("Tem certeza que deseja deletar o evento " + nome + "?");
				if (ask) {
					document.location.href = '../controle/eventocontrole.php?op=deletar&idEvento='+idEvento;
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
                    <li><a href="guifuncionarios.php"><span>Funcionários</span></a></li>
                    <li><a href="guieventos.php" class="active"><span>Eventos</span></a></li>
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
                      <h2 class="left">Eventos</h2>
                    </div>
                    <!-- End Box Head -->
                    <!-- Table -->
                    <div class="table">
                      <table>
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Descri&ccedil;&atilde;o</th>
                            <th>Local</th>
                            <th>Data</th>
                            <th>Hor&aacute;rio</th>
                            <th>Observa&ccedil;&atilde;o</th>
                            <th>Controle</th>
                          </tr>
                        </thead>
                        
                        <tfoot>
                          <tr>
                            <th>Nome</th>
                            <th>Descri&ccedil;&atilde;o</th>
                            <th>Local</th>
                            <th>Data</th>
                            <th>Hor&aacute;rio</th>
                            <th>Observa&ccedil;&atilde;o</th>
                            <th>Controle</th>
                          </tr>
                        </tfoot>
                        
                        <tbody>
                        	<?php
								include '../dao/eventodao.class.php';
								
								$evDAO = new EventoDAO();
								$dados = array();
								$dados = $evDAO->listarEvento();
								
								foreach($dados as $c){
									echo '<tr>';
										echo '<td><a href="guidetalhesevento.php?idEvento='.$c->idEvento.'">'.$c->nome.'</a></td>';
										echo '<td>'.$c->descricao.'</td>';
										echo '<td>'.$c->local.'</td>';
										echo '<td>'.$c->data.'</td>';
										echo '<td>'.$c->horario.'</td>';
										echo '<td>'.$c->obs.'</td>';
										echo '<td><a onclick=\'deletarEvento('.$c->idEvento.',"'.$c->nome.'")\' class=\'ico del\'>Excluir</a>';
										echo '<a href="'."guieditevento.php?idEvento=$c->idEvento".'" class="ico edit">Editar</a></td>';
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
							<h2>Detalhes do Evento</h2>
                        </div>
                        <!-- End Box Head -->
                        <div class="form">
                            <p class="detalhes">
								<?php
                                include_once '../dao/eventodao.class.php';
                                    
                                    $cliDAO = new EventoDAO();
                                    $dados = array();
                                    $dados = $cliDAO->selecionarEvento($_GET['idEvento']);
                                    
                                    foreach($dados as $d){
                                        echo $d;
                                    }//fecha foreach
    
                                ?>
							</p>
						</div>
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