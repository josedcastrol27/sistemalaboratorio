<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="javascript:void(0);" onclick="javascript:window.open('shortcuts.html','myNewWinsr','width=600,height=110,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes');" class="round button dark ic-info image-left">Mostrar Atajos</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Conectado como <strong><?php echo $POSNIC['username'] ?></strong></a>
					<ul>
				
						<li><a href="change_password.php">Cambiar Contrase&#241a</a></li>
						
						<li><a href="logout.php">Cerrar Sesion</a></li>
					</ul> 
				</li>
			<li><a href="update_details.php" class="round button dark menu-settings image-left">Actualizar Datos de Tienda</a></li>
				<li></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
                                    <a href="logout.php" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Cerrar Sesion</a>
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->