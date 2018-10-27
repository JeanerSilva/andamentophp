<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					echo "<th>Responsável</th>";
					echo "<th>Modalidade</th>";

        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {
          	if ($Row && ($Key > 3)) {
						//	$Andamentos = str_replace(";", "<br>", $Row[6]);
						$Percentagem = "0%";
						$Compara = "Instrução inicial";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "10%";
						$Compara = "Elaboração de edital";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "20%";
						$Compara = "Devolvido ao requisitante";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "30%";
						$Compara = "Chefia da DIVCOL";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "40%";
						$Compara = "Enviado à ASJUR";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "50%";
						$Compara = "Análise pós ASJUR";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "60%";
						$Compara = "Envio CGOF";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "70%";
						$Compara = "Pregão";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "80%";
						$Compara = "Instrução final";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "90%";
						$Compara = "Concluído";
							if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "100%";

								echo "<tr class =\"processos\">";
								echo "     <td class=\"processo1\">"; print_r($Row[1]); //processo
								echo "</td><td class=\"processo2\">"; print_r($Row[2]); //objeto
								echo "</td><td class=\"processo3\">"; print_r($Row[3]); //Requisitante
								echo "</td><td class=\"processo4\"><strong> MODALIDADE: </strong>";
									print_r($Row[4]);
									echo "<strong>. FASE ATUAL: </strong>";
									print_r($Row[7]);
											echo "<div class=\"bar-pale-red\">";
									echo "<div class=\"bar-green bar-center\" style=\"width:";
									print_r($Percentagem);
									echo "\"><strong>";
									print_r($Percentagem);
									echo"</strong></div>";
											echo "</div>";
									echo "<br><strong>Andamentos: </strong><br>";
									print_r($Row[6]);

								echo "</td><td class=\"processo5\">"; print_r($Row[0]); //responsável
									echo "</td><td class=\"processo6\">"; print_r($Row[5]); //modalidade
              	echo "</td></tr>";
          	}
        	}
        	echo "</table>";
				}

				if ($TabelaTipo== "divcon") {
        	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
        	echo "<th>Contrato/Ata/Processo</th>";
        	echo "<th>Objeto</th>";
        	echo "<th>Requisitante</th>";
        	echo "<th>Andamento</th>";
					echo "<th>Empresa</th>";
					echo "<th>Responsavel</th>";
        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {
          	if ($Row && ($Key > 3)) {
							  //$Andamentos = str_replace(";", "<br>", $Row[6]);

								$Percentagem = "0%";
								$Compara = "Instrução inicial";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "10%";
								$Compara = "Chefia da DIVCON";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "20%";
								$Compara = "Diligências no requisitante";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "30%";
								$Compara = "Enviado à ASJUR";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "40%";
								$Compara = "Enviado ao DAL";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "50%";
								$Compara = "Retorno analista";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "60%";
								$Compara = "Declaração Orçamentária";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "70%";
								$Compara = "Enviado ao Administrativo";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "80%";
								$Compara = "Procedimento pós assinatura";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "90%";
								$Compara = "Concluído";
									if (strcasecmp($Row[7], $Compara) == 0) $Percentagem = "100%";

              	echo "<tr class =\"processos\">";
								echo      "<td class=\"processo1\">"; print_r($Row[3]);
              	echo "</td><td class=\"processo3\">"; print_r($Row[2]);
              	echo "</td><td class=\"processo4\">"; print_r($Row[4]);
								echo "</td><td class=\"processo6\"><strong> OBJETIVO: </strong>";
									print_r($Row[5]);
									echo "<strong>. FASE ATUAL: </strong>";
									print_r($Row[7]);
											echo "<div class=\"bar-pale-red\">";
									echo "<div class=\"bar-green bar-center\" style=\"width:";
									print_r($Percentagem);
									echo "\"><strong>";
									print_r($Percentagem);
									echo"</strong></div>";
											echo "</div>";
									echo "<br><strong>Andamentos: </strong><br>";
									print_r($Row[6]);
								echo "</td><td class=\"processo5\">"; print_r($Row[1]);
								echo "</td><td class=\"processo2\">"; print_r($Row[0]);
								echo "</td></tr>";
          	}
        	}
        	echo "</table>";
				}

	   ?>
	<script src="js/filtra.js" ></script>
	</body>
</html>
