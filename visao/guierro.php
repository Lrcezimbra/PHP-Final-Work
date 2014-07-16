<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/template4.dwt" codeOutsideHTMLIsLocked="false" -->
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
                    Bem Vindo <a href="#"><strong>Administrator</strong></a>
                    <span>|</span>
                    <a href="#">Help</a>
                    <span>|</span>
                    <a href="#">Profile Settings</a>
                    <span>|</span>
                    <a href="#">Log out</a>
                </div>
            </div>
            <!-- End Logo + Top Nav -->
            
            <!-- Main Nav -->
            <div id="navigation">
                <ul>
                    <li><a href="guihome.html"><span>Home</span></a></li>
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
                      <h2 class="left">Erro</h2>
                    </div>
                    <!-- End Box Head -->
                    <!-- Table -->
                    <div class="table">
                      <!-- InstanceBeginEditable name="erro" -->
						<?php
                        	
                        ?>
                      <!-- InstanceEndEditable -->
                    </div>
                    <!-- Table -->
                  </div>
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