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
			require('php-excel-reader/paths.php');
			$TabelaTipo = $_GET['tabela'];
			$Oculta = $_GET['oculta'];
			$Filtro = $_GET['filtro'];
			$Filepath = $DivcolPath . "processos_" . $TabelaTipo . ".xlsm";
			$Spreadsheet = new SpreadsheetReader($Filepath);
		?>

	<header>
			<div class="container">
				<?php echo "<h2>"; echo "PROCESSOS " . strtoupper($TabelaTipo);  echo "</h2>";
				?>
			</div>
		</header>
		<main>

			<?php
					if ($TabelaTipo == "divcon")
						echo "<a class=\"classe1\" href='indexphp.php?filtro=&tabela=divcol&oculta=false'> Acessar Tabela DIVCOL </a>";
					if ($TabelaTipo == "divcol")
						echo "<a class=\"classe1\" href='indexphp.php?filtro=&tabela=divcon&oculta=false'> Acessar Tabela DIVCON </a>";
			?>
			<form action="indexphp.php" method="get">
				<input type="text" name="filtro" value="<?= $Filtro ?>"
			 id="filtrar-tabela" placeholder="Informe o termo a ser filtrado (em qualquer campo)">
			 <button id="filtrar" class="botao bto-principal" >Filtrar</button>
			 <button id="limpar" class="botao bto-principal">Mostrar todos</button>
			  <input type="hidden" id="tabela" name="tabela" value="<?= $TabelaTipo ?>">
				<input type="hidden" id="oculta" name="oculta" value="true">
				<?php
					if ($Oculta == "false") {
						echo "<input class=\"input1\" type=\"submit\" value=\"Ocultar processos concluídos na ";
						echo strtoupper($TabelaTipo);
						echo "\">";
					}
				 ?>
			</form>

		<?php
			if ($TabelaTipo == "divcol") {
        	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
        	echo "<th>Processo</th>";
					echo "<th>Objeto</th>";
					echo "<th>Requisitante</th>";
        	echo "<th>Andamento</th>";
					echo "<th>Nº Pregão / Dispensa / Inex</th>";
					echo "<th>Responsável</th>";
        	echo "</tr>";
        	foreach ($Spreadsheet as $Key => $Row) {

						$Concluido = strcasecmp($Row[7], "concluído");
						$Arquivado = strcasecmp($Row[7], "arquivado");
						if ($Oculta == "false" || $Arquivado != 0 && $Oculta == "true")	{
						if ($Oculta == "false" || $Concluido != 0 && $Oculta == "true")	{
						if ($Row && $Key > 3 && strlen($Row[7]) != 0) {
						//	$Andamentos = str_replace(";", "<br>", $Row[6]);
							$Percentagem = "0%";
							if (strcasecmp($Row[7], "Instrução inicial") == 0) $Percentagem = "10%";
							if (strcasecmp($Row[7], "Elaboração de edital") == 0) $Percentagem = "20%";
							if (strcasecmp($Row[7], "Devolvido ao requisitante") == 0) $Percentagem = "30%";
							if (strcasecmp($Row[7], "Chefia da DIVCOL") == 0) $Percentagem = "40%";
							if (strcasecmp($Row[7], "Enviado à ASJUR") == 0) $Percentagem = "50%";
							if (strcasecmp($Row[7], "Análise pós ASJUR") == 0) $Percentagem = "60%";
							if (strcasecmp($Row[7], "Envio CGOF") == 0) $Percentagem = "70%";
							if (strcasecmp($Row[7], "Pregão") == 0) $Percentagem = "80%";
							if (strcasecmp($Row[7], "Instrução final") == 0) $Percentagem = "90%";
							if (strcasecmp($Row[7], "Concluído") == 0 || strcasecmp($Row[7], "Envio à DIVCON") == 0) $Percentagem = "100%";

								echo "<tr class =\"processos\">";
								echo "     <td class=\"processo1\">"; print_r($Row[1]); //processo
								echo "</td><td class=\"processo2\">"; print_r($Row[2]); //objeto
								echo "</td><td class=\"processo3\">"; print_r($Row[3]); //Requisitante
								echo "</td><td class=\"processo4\">";
									echo "<strong> MODALIDADE: </strong>"; print_r($Row[4]);
									echo "<strong>. FASE ATUAL: </strong>"; print_r($Row[7]);
									if ((strcasecmp($Row[7], "Concluído") == 0) || (strcasecmp($Row[7], "Envio à DIVCON") == 0)) {
										echo "<a href='indexphp.php?filtro="; print_r($Row[1]);
										echo "&tabela=divcon&oculta=false'> Abrir processo na DIVCON </a>";
								  }
									echo "<div class=\"bar-pale-red\">";
									echo "<div class=\"bar-green bar-center\" style=\"width:";
									print_r($Percentagem);
									echo "\"><strong>";
									print_r($Percentagem);
									echo"</strong></div>";
											echo "</div>";
									echo "<br><strong>Andamentos: </strong><br>";
									print_r($Row[6]);
								echo "</td><td class=\"processo6\">"; print_r($Row[5]); //numero
								echo "</td><td class=\"processo5\">"; print_r($Row[0]); //responsável
              	echo "</td></tr>";
          	}
					}
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
						$Concluido = strcasecmp($Row[7], "concluído");
						$Arquivado = strcasecmp($Row[7], "arquivado");
						if ($Oculta == "false" || $Arquivado != 0 && $Oculta == "true")	{
						if ($Oculta == "false" || $Concluido != 0 && $Oculta == "true")	{
						if ($Row && $Key > 3 && strlen($Row[7]) != 0) {
							  //$Andamentos = str_replace(";", "<br>", $Row[6]);
								$Percentagem = "0%";
								if (strcasecmp($Row[7], "Instrução inicial") == 0) $Percentagem = "10%";
								if (strcasecmp($Row[7], "Chefia da DIVCON") == 0) $Percentagem = "20%";
								if (strcasecmp($Row[7], "Diligências no requisitante") == 0) $Percentagem = "30%";
								if (strcasecmp($Row[7], "Enviado à ASJUR") == 0) $Percentagem = "40%";
								if (strcasecmp($Row[7], "Enviado ao DAL") == 0) $Percentagem = "50%";
								if (strcasecmp($Row[7], "Retorno analista") == 0) $Percentagem = "60%";
								if (strcasecmp($Row[7], "Declaração Orçamentária") == 0) $Percentagem = "70%";
								if (strcasecmp($Row[7], "Enviado ao Administrativo") == 0) $Percentagem = "80%";
								if (strcasecmp($Row[7], "Procedimento pós assinatura") == 0) $Percentagem = "90%";
								if (strcasecmp($Row[7], "Concluído") == 0) $Percentagem = "100%";

              	echo "<tr class =\"processos\">";
								echo      "<td class=\"processo1\">"; print_r($Row[3]);
              	echo "</td><td class=\"processo3\">"; print_r($Row[2]);
              	echo "</td><td class=\"processo6\">"; print_r($Row[4]);
								echo "</td><td class=\"processo4\"><strong> OBJETIVO: </strong>";
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
        	}
				  }
        	echo "</table>";
				}

	   ?>
	<script src="js/filtra.js" ></script>
	<script src="js/comandos.js" ></script>
	</body>
</html>

<!--
Ocultar processos inativos:
<input type="checkbox" id="myCheck"  onclick="myFunction()">
<input id="text1" name="text1" value="text1"
style="display:none">Processos concluídos ocultados</strong>
<script>
function myFunction() {
		var checkBox = document.getElementById("myCheck");
		var text = document.getElementById("text");
		if (checkBox.checked == true){
				text.style.display = "inline";
		} else {
			 text.style.display = "none";
		}
		var teste = 1;
}
</script>
-->
