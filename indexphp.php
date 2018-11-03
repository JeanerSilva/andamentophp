<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<meta >
	<body>

		<?php
		error_reporting(0);
			require('php-excel-reader/excel_reader2.php');
			require('php-excel-reader/SpreadsheetReader.php');
			require('app/paths.php');
			$TabelaTipo = $_GET['tabela'];
			$Oculta = $_GET['oculta'];
			$Filtro = $_GET['filtro'];
			
			$FileDivcolPath = $DivcolPath . "processos_divcol.xlsm";
			$SpreadsheetDivcol = new SpreadsheetReader($FileDivcolPath);

			$FileDivconPath = $DivcolPath . "processos_divcon.xlsm";
			$SpreadsheetDivcon = new SpreadsheetReader($FileDivconPath);
		?>

		<header>
			<div class="container" id="barra">
				<?php 
					echo "<button class='btn-small' onclick=\"";
					echo "window.location = 'indexphp.php?filtro=&tabela=processo&oculta=false'";
					echo "\" >DIVCOL+DIVCON</button>";
					echo "<button class='btn-small' onclick=\"";
					echo "window.location = 'indexphp.php?filtro=&tabela=divcol&oculta=false'";
					echo "\" >DIVCOL</button>";					
					echo "<button class='btn-small' onclick=\"";
					echo "window.location = 'indexphp.php?filtro=&tabela=divcon&oculta=false'";
					echo "\" >DIVCON</button>";

				
					$Valor = $TabelaTipo;
					if ($Valor == 'processo')  $Valor = 'DIVCOL+DIVCON';
					echo "<h2>"; echo "PROCESSOS: " . strtoupper($Valor);  echo "</h2>";
				?>
			</div>
		</header>

		<form action="indexphp.php" method="get" id="menu">
			<input type="text" name="filtro" value="<?= $Filtro ?>"
			id="filtrar-tabela" placeholder="Pesquisa em qualquer campo">
			<input type="hidden" id="tabela" name="tabela" value="<?= $TabelaTipo ?>">
			<input type="hidden" id="oculta" name="oculta" value="<?= $Oculta ?>">
			<button id="filtrar" class="btn-primary" >Filtrar</button>
			<button id="limpar" class="btn-primary">Limpar</button>
			
			
			<label class="switch">
				<input type="checkbox" checked id="ocultar"  onclick="myFunction()">
				<span class="slider round"></span>
			</label>
			<h3 style="color: white; display:inline-block;"> Mostrar/Ocultar concluídos</h3>

		</form>

		<?php
			require('app/'.$TabelaTipo.'.php');
		?>
		   
		<script src="js/filtra.js" ></script>
		<script src="js/comandos.js" ></script>
		<script> 
		document.getElementById("filtrar-tabela").focus();
		var oculta = document.getElementById("oculta").value;
		var checkBox = document.getElementById("ocultar");
		checkBox.checked = oculta;

		function myFunction() {
			var checkBox = document.getElementById("ocultar");
			var tabela = document.getElementById("tabela").value;
   			var oculta = document.getElementById("oculta").value;
			var filtro = document.getElementById("filtrar-tabela").value;

			if (oculta=="false") {				
				oculta="true";
			} else {				
				oculta="false";
			}

			if (checkBox.checked == true){
				var tabela = document.getElementById("tabela").value;
				window.location = "indexphp.php?filtro="
   					 + filtro + "&tabela=" + tabela + "&oculta=" + oculta;
			} else {
				window.location = "indexphp.php?filtro="
    			+ filtro + "&tabela=" + tabela + "&oculta=" + oculta;
				
			}
		}
		</script>


		
	</body>
</html>
