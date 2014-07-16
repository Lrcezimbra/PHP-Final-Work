<?php
	session_start();
	if(isset($_SESSION['privateUser'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Sistema do Lucas</title>
        <link rel="stylesheet" href="../estilo/style.css" type="text/css" media="all" />
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
                        <li><a href="guihome.html" class="active"><span>Home</span></a></li>
                        <li><a href="guicadcliente.php"><span>Clientes</span></a></li>
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
        <!-- Box -->
            <div class="box">
                <!-- Box Head -->
                <div class="box-head">
                    <h2 class="left">Clientes</h2>
                </div>
                <!-- End Box Head -->	
    
                <div id="bemvindo">
	                <h1>Olá, Nome. <br />Seja Bem Vindo ao Sistema do Lucas</h1>
                	<?php
					if(isset($_SESSION['u'])){
						include '../modelo/usuario.class.php';	
				 		$usu = new Usuario();
						$usu = unserialize($_SESSION['u']); 	
		 
		 				echo 'O Usuario '.$usu->login.' foi cadastrado com sucesso!';
			
						unset($_SESSION['u']);
			
				    }else if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}else{
	 	 				echo 'variavel de sessão não encontrada!';
				    }
					?>	
                </div>
            </div>
            <!-- End Box -->
        </div>
        <!-- End Container -->       
    </body>
</html>
<?php
}else{
header('location:../index.php');
}    
?>