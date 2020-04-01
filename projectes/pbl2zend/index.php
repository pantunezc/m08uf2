<html>
  <head>
    
  </head>
  <body>
    <h1 >Accés a l'aplicació</h1>
    <div style="font-size: 20px"> 
		<form class="text-secondary"  action="ldap.php" method="POST">
			<font face="Arial">
				Contrasenya de l'administrador de LDAP: 
				<input type="password" name="password"><br><br>
                Identificador usuari:
                <input type="text" name="cn"><br><br>
                Unitat Organitzativa:
                <input type="text" name="ou"><br><br>
				<input class="btn btn-primary" type="submit"/>
			</font>
		</form>
	</div>
  </body>
</html>