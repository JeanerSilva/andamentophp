<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<meta >
	<body>

		<?php
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
					echo "\" >DIVCOL + DIVCON</button>";
					echo "<button class='btn-small' onclick=\"";
					echo "window.location = 'indexphp.php?filtro=&tabela=divcol&oculta=false'";
					echo "\" >Tabela DIVCOL</button>";					
					echo "<button class='btn-small' onclick=\"";
					echo "window.location = 'indexphp.php?filtro=&tabela=divcon&oculta=false'";
					echo "\" >Tabela DIVCON</button>";
				
					$Valor = $TabelaTipo;
					if ($Valor == 'processo')  $Valor = 'DIVCOL + DIVCON';
					echo "<h2>"; echo "PROCESSOS: " . strtoupper($Valor);  echo "</h2>";
				?>
			</div>
		</header>

		<form action="indexphp.php" method="get" id="menu">
			<input type="text" name="filtro" value="<?= $Filtro ?>"
			id="filtrar-tabela" placeholder="Informe o termo a ser filtrado (em qualquer campo)">
			<input type="hidden" id="tabela" name="tabela" value="<?= $TabelaTipo ?>">
			<input type="hidden" id="oculta" name="oculta" value="<?= $Oculta ?>">
			<button id="filtrar" class="btn-primary" >Filtrar</button>
			<button id="limpar" class="btn-primary">Limpar</button>

		</form>

		<?php
			require('app/'.$TabelaTipo.'.php');
		?>
		   
		<script src="js/filtra.js" ></script>
		<script src="js/comandos.js" ></script>
		<script> 
		document.getElementById("filtrar-tabela").focus();

		</script>
	</body>
</html>
