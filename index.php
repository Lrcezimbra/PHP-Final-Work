<!DOCTYPE html>
<html>
    <head>
        <title>Sistema do Lucas</title>
    </head>
    
    <body>
    	<fieldset><legend>Login</legend>
        	<form action="controle/usuariocontrole.php?op=logar" method="post">
            	<label>Login: </label><input type="text" name="txtLogin" placeholder="Login"/><br />
                <label>Senha: </label><input type="password" name="pwSenha" placeholder="Senha"/><br />
                
                <input type="submit" value="Logar" />
			</form>
		</fieldset>
    </body>
</html>