<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>

		<?php
			require('php-excel-reader/excel_reader2.php');
			require('php-excel-reader/SpreadsheetReader.php');
			require('php-excel-reader/paths.php');

	    $Filepath = "";

			$TabelaTipo = $_GET['tabela'];
			if ($TabelaTipo == "divcol") {
				$Tabela = "PROCESSOS DIVCOL";
				$Filepath = $DivcolPath . "processos_divcol.xlsm";
			}
			if ($TabelaTipo == "divcon") {
				$Tabela = "PROCESSOS DIVCON";
				$Filepath = $DivconPath . "processos_divcon.xlsm";
			}

		//	echo "<p>" . @$Filepath . "</p>";
			$Spreadsheet = new SpreadsheetReader($Filepath);
		?>
		<header>
			<div class="container">
				<?php echo "<h2>"; echo $Tabela;  echo "</h2>";?>
			</div>
		</header>
		<main>

			<?php
					if ($TabelaTipo == "divcon")
						echo "<a href='indexphp.php?tabela=divcol'> Acessar Tabela DIVCOL </a> <br>";
					if ($TabelaTipo == "divcol")
						echo "<a href='indexphp.php?tabela=divcon'> Acessar Tabela DIVCON </a> <br>";
			?>

			<label for="filtrar-tabela">Filtrar:</label>
			<input type="text" name="filtro"
			id="filtrar-tabela" placeholder="Informe o termo a ser filtrado (em qualquer campo)">


			<?php
				if ($TabelaTipo == "divcol") {
        	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
        	echo "<th>Processo</th>";
					echo "<th>Objeto</th>";
					echo "<th>Requisitante</th>";
        	echo "<th>Andamento</th>";
        	echo "<th>Fase</th>";
        	echo "<th>Modalidade</th>";
					echo "<th>Responsável</th>";

        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {
          	if ($Row && ($Key > 3)) {
						//	$Andamentos = str_replace(";", "<br>", $Row[6]);
              	echo "<tr class =\"processos\">";
								echo "     <td class=\"processo1\">"; print_r($Row[1]); //processo
								echo "</td><td class=\"processo4\">"; print_r($Row[2]); //objeto
								echo "</td><td class=\"processo5\">"; print_r($Row[3]); //Requisitante
								echo "</td><td class=\"processo7\">"; print_r($Row[6]); //subfase
								echo "</td><td class=\"processo6\">"; print_r($Row[7]);
									echo "<div id=\"myProgress\"><div id=\"myBar\"></div></div>"; //fase

								echo "</td><td class=\"processo2\">"; print_r($Row[4]); //modalidade
								echo "</td><td class=\"processo3\">"; print_r($Row[0]); //responsável



              	echo "</td></tr>";
          	}
        	}
        	echo "</table>";
				}

				if ($TabelaTipo== "divcon") {
        	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
        	echo "<th>Contrato/Ata/Processo</th>";
        	echo "<th>Responsavel</th>";
        	echo "<th>Objeto</th>";
        	echo "<th>Requisitante</th>";
					echo "<th>Objetivo</th>";
					echo "<th>Fase atual</th>";
        	echo "<th>Andamento</th>";
        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {
          	if ($Row && ($Key > 3)) {
							  //$Andamentos = str_replace(";", "<br>", $Row[6]);
              	echo "<tr class =\"processos\">";
								echo      "<td class=\"processo1\">"; print_r($Row[3]);
              	echo "</td><td class=\"processo2\">"; print_r($Row[0]);
              	echo "</td><td class=\"processo3\">"; print_r($Row[2]);
              	echo "</td><td class=\"processo4\">"; print_r($Row[4]);
								echo "</td><td class=\"processo5\">"; print_r($Row[5]);
								echo "</td><td class=\"processo6\">"; print_r($Row[7]);
              	echo "</td><td class=\"processo7\">"; print_r($Row[6]);
              	echo "</td></tr>";
          	}
        	}
        	echo "</table>";
				}

				if ($Filepath == "comap.xlsx") {
        	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
        	echo "<th>RIP - Utilização</th>";
					echo "<th>Local _________________________________ </th>";
        	echo "<th>Área Terreno <br> Área Constr.</th>";
        	echo "<th>Área útil para uso individual</th>";
        	echo "<th>Propriedade</th>";
					echo "<th>Valor locação + condomínio = valor total</th>";
        	echo "<th>Observação</th>";
        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {
          	if ($Row && ($Key > 3)) {
							$AreaTerreno    = str_replace("-", "0", $Row[5]);
							$AreaConstruida = str_replace("-", "0", $Row[6]);
							$ValorLocacao = str_replace("-", "0", $Row[12]);
							$ValorCondominio = str_replace("-", "0", $Row[13]);
							$Contrato = " ";
							if ($Row[14]) $Contrato .= "Contrato " . $Row[14] . "/" . $Row[15];
							if ($Row[16]) $Contrato .= " vigente até " . $Row[16];
						   	echo "<tr class =\"processos\">";
								echo "     <td class=\"processo1\">"; print_r($Row[0] . " - " . $Row[4]);
              	echo "</td><td class=\"processo2\">"; print_r("SE" . $Row[1] . " - " . $Row[3] . ", " . $Row[2] . "/" . $Row[1]);
								echo "</td><td class=\"processo3\">"; print_r($AreaTerreno . "m2 <br> " . $AreaConstruida . "m2");
              	echo "</td><td class=\"processo4\">"; print_r($Row[9]) ;
              	echo "</td><td class=\"processo5\">"; print_r($Row[11]);
								echo "</td><td class=\"processo6\">"; print_r($ValorLocacao . " + " . $ValorCondominio . " = "); echo  (int)$ValorLocacao +  (int)$ValorCondominio;
              	echo "</td><td class=\"processo7\">"; print_r($Contrato . " - " . $Row[26]);
              	echo "</td></tr>";
          	}
        	}
        	echo "</table>";
				}

      ?>
	<script src="js/filtra.js" ></script>
	</body>
</html>
