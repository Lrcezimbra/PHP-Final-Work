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
                          <h2>Novo Evento</h2>
                        </div>
                        <!-- End Box Head -->
                        <form action="../controle/eventocontrole.php?op=cadastrar" method="post">
                          <!-- Form -->
                          <div class="form">
                            <label>*Nome: </label>
                            <input type="text" name="txtNome" placeholder="Nome" class="field size1"/>
                            <br />
                            <label>Descri&ccedil;&atilde;: </label>
                            <input type="text" name="txtDescricao" placeholder="Descri&ccedil;&atilde;o" class="field size1"/>
                            <br />
                            <label>Local: </label>
                            <input type="teste" name="txtLocal" placeholder="Local" class="field size1"/>
                            <br />
                            <label>*Data: </label>
                            <select name="selDia" class="sel"> 
                                <option value="0">Dia</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            
                            <select name="selMes" class="sel">
                                <option value="0">Mês</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select name="selAno" class="sel">
                                <option value="0">Ano</option>
                                <option value="2013">2013</option>
                                <option value="2013">2014</option>
                                <option value="2013">2015</option>
                                <option value="2013">2016</option>
                                <option value="2013">2017</option>
                                <option value="2013">2018</option>
                                <option value="2013">2019</option>
                                <option value="2013">2020</option>
                            </select>
                            <br />
                            <label>Hor&aacute;rio: </label>
                            <input type="text" name="txtHorario" placeholder="Hor&aacute;" class="field size1"/>
                            <br />
                            <label>Observa&ccedil;&atilde;o: </label>
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