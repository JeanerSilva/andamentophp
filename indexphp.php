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
			$Filtro = $_GET['filtro'];
			$Filepath = $DivcolPath . "processos_" . $TabelaTipo . ".xlsm";
			$Spreadsheet = new SpreadsheetReader($Filepath);
		?>

		<header>
			<div class="container" id="barra">
				<?php echo "<h2>"; echo "PROCESSOS " . strtoupper($TabelaTipo);  echo "</h2>";
					if ($TabelaTipo == "divcon") {
						echo "<button class=\"btn-small\" onclick=\"";
						echo "window.location = 'indexphp.php?filtro=&tabela=divcol'";
						echo "\" id=\"divcon\">Tabela DIVCOL</button>";
					}
						if ($TabelaTipo == "divcol") {
						echo "<button class=\"btn-small\" onclick=\"";
						echo "window.location = 'indexphp.php?filtro=&tabela=divcon'";
						echo "\" id=\"divcon\">Tabela DIVCON</button>";
					}				
				?>
			</div>
		</header>

		<form action="indexphp.php" method="get" id="menu">
			<input type="text" name="filtro" value="<?= $Filtro ?>"
			id="filtrar-tabela" placeholder="Informe o termo a ser filtrado (em qualquer campo)">
			<button id="filtrar" class="btn-primary " >Filtrar</button>
			<button id="limpar" class="btn-primary">Limpar</button>
			<input type="hidden" id="tabela" name="tabela" value="<?= $TabelaTipo ?>">
		</form>

		<?php
			require('app/'.$TabelaTipo.'.php');	
		?>
		   
		<script src="js/filtra.js" ></script>
		<script src="js/comandos.js" ></script>
		<script> 
			function callDivcon (filtro) {
				window.location = "indexphp.php?filtro=" + filtro + "&tabela=divcon";
			}
		</script>
	</body>
</html>
