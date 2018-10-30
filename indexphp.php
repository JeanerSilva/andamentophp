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
			<div class="container" id="barra">
				<?php echo "<h2>"; echo "PROCESSOS " . strtoupper($TabelaTipo);  echo "</h2>";
					if ($TabelaTipo == "divcon") {
						echo "<button class=\"btn-small\" onclick=\"";
						echo "window.location = 'indexphp.php?filtro=&tabela=divcol&oculta=false'";
						echo "\" id=\"divcon\">Tabela DIVCOL</button>";
					}
						if ($TabelaTipo == "divcol") {
						echo "<button class=\"btn-small\" onclick=\"";
						echo "window.location = 'indexphp.php?filtro=&tabela=divcon&oculta=false'";
						echo "\" id=\"divcon\">Tabela DIVCON</button>";
					}

					
				?>

			</div>
		</header>
		<main>


			<form action="indexphp.php" method="get" id="menu">
				<input type="text" name="filtro" value="<?= $Filtro ?>"
			 id="filtrar-tabela" placeholder="Informe o termo a ser filtrado (em qualquer campo)">
			 <button id="filtrar" class="btn-primary " >Filtrar</button>
			 <button id="limpar" class="btn-primary">Limpar</button>
			  <input type="hidden" id="tabela" name="tabela" value="<?= $TabelaTipo ?>">
				<input type="hidden" id="oculta" name="oculta" value="true">
				<?php
					if ($Oculta == "false") {
						echo "<input class=\"input1 btn-primary\" type=\"submit\" value=\"Ocultar concluídos\">";
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
					echo "<th>Nº </th>";
					echo "<th>Responsável</th>";
			echo "</tr>";
			
			$InstrucaoInicial = 0;
			$ElaboracaoDeEdital = 0;
			$DevolvidoAoRequisitante = 0;
			$ChefiaDaDivcol = 0;
			$EnviadoAASJUR = 0;
			$AnalisePosASJUR = 0;
			$EnvioACGOF = 0;
			$Pregao = 0;
			$InstrucaoFinal = 0;
			$Padrao = 10;	
        	foreach ($Spreadsheet as $Key => $Row) {


				
				$InstrucaoInicialP = $InstrucaoInicial * $Padrao;
				$ElaboracaoDeEditalP = $ElaboracaoDeEdital * $Padrao;
				$DevolvidoAoRequisitanteP = $DevolvidoAoRequisitante * $Padrao;
				$ChefiaDaDivcolP = $ChefiaDaDivcol * $Padrao;
				$EnviadoAASJURP = $EnviadoAASJUR * $Padrao;
				$AnalisePosASJURP = $AnalisePosASJUR * $Padrao;
				$EnvioACGOFP = $EnvioACGOF * $Padrao;
				$PregaoP = $Pregao * $Padrao;
				$InstrucaoFinalP = $InstrucaoFinal * $Padrao;

				echo "<div id=\"dados\" class=\"invisivel\">";
				echo "<p class=\"bar-blue-small\">Instrução inicial: $InstrucaoInicial";
					echo "<div class=\"bar-blue-small\" style=\"width: $InstrucaoInicialP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Elaboração de edital: $ElaboracaoDeEdital";
					echo "<div class=\"bar-blue-small\" style=\"width: $ElaboracaoDeEditalP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Devolvido ao requisitante: $DevolvidoAoRequisitante";
					echo "<div class=\"bar-blue-small\" style=\"width: $DevolvidoAoRequisitanteP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Chefia da DIVCOL: $ChefiaDaDivcol";
					echo "<div class=\"bar-blue-small\" style=\"width: $ChefiaDaDivcolP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Enviado à ASJUR: $EnviadoAASJUR";
					echo "<div class=\"bar-blue-small\" style=\"width: $EnviadoAASJURP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Análise pós ASJUR: $AnalisePosASJUR";
					echo "<div class=\"bar-blue-small\" style=\"width: $AnalisePosASJURP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Enviado à CGOF: $EnvioACGOF";
					echo "<div class=\"bar-blue-small\" style=\"width: $EnvioACGOFP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Execução de Pregão: $Pregao";
					echo "<div class=\"bar-blue-small\" style=\"width: $PregaoP"; 
					echo "px;\"></div></p>";
				echo "<p class=\"bar-blue-small\">Instrução final: $InstrucaoFinal";
					echo "<div class=\"bar-blue-small\" style=\"width: $InstrucaoFinalP"; 
					echo "px;\"></div></p>";
					

						$Concluido = strcasecmp($Row[7], "Envio à DIVCON");
						$Arquivado = strcasecmp($Row[7], "arquivado");
						if ($Oculta == "false" || $Arquivado != 0 && $Oculta == "true")	{
						if ($Oculta == "false" || $Concluido != 0 && $Oculta == "true")	{
						if ($Row && $Key > 3 && strlen($Row[7]) != 0) {
						//	$Andamentos = str_replace(";", "<br>", $Row[6]);
							$Percentagem = "0%";
							if (strcasecmp($Row[7], "Instrução inicial") == 0) {
								$InstrucaoInicial = $InstrucaoInicial + 1; 				
								$Percentagem = "10%";
							}
							if (strcasecmp($Row[7], "Elaboração de edital") == 0) {
								$Percentagem = "20%";
								$ElaboracaoDeEditalP = $ElaboracaoDeEdital +1;
							}
							if (strcasecmp($Row[7], "Devolvido ao requisitante") == 0) {
								$Percentagem = "30%";
								$DevolvidoAoRequisitante = $DevolvidoAoRequisitante + 1;
							}
							if (strcasecmp($Row[7], "Chefia da DIVCOL") == 0) {
								$Percentagem = "40%";
								$ChefiaDaDivcol = $ChefiaDaDivcol +1;
							}
							if (strcasecmp($Row[7], "Enviado à ASJUR") == 0) {
								$Percentagem = "50%";
								$EnviadoAASJUR = $EnviadoAASJUR +1;
							}
							if (strcasecmp($Row[7], "Análise pós ASJUR") == 0) {
								$Percentagem = "60%";
								$AnalisePosASJUR = $AnalisePosASJUR+1;
							}
							if (strcasecmp($Row[7], "Envio CGOF") == 0) {
								$Percentagem = "70%";
								$EnvioACGOF = $EnvioACGOF + 1;
							}
							if (strcasecmp($Row[7], "Pregão") == 0) {
								$Percentagem = "80%";
								$Pregao = $Pregao +1;
							}
							if (strcasecmp($Row[7], "Instrução final") == 0) {
								$Percentagem = "90%";
								$InstrucaoFinal = $InstrucaoFinal + 1;
							}
							if (strcasecmp($Row[7], "Concluído") == 0 || strcasecmp($Row[7], "Envio à DIVCON") == 0) $Percentagem = "100%";

								echo "<tr class =\"processos\">";
								echo "     <td class=\"processo1\">"; print_r($Row[1]); //processo
								echo "</td><td class=\"processo2\">"; print_r($Row[2]); //objeto
								echo "</td><td class=\"processo3\">"; print_r($Row[3]); //Requisitante
								echo "</td><td class=\"processo4\">";
									echo "MODALIDADE: <strong>"; print_r($Row[4]);
									echo "</strong>. FASE ATUAL: <strong>"; print_r($Row[7]);echo "</strong>";
									if (strcasecmp($Row[7], "Envio à DIVCON") == 0) {
										echo "<button class=\"btn-small\" onclick=\"";
										echo "window.location = 'indexphp.php?filtro="
    									. $Row[1] . "&tabela=divcon&oculta=false'";
										echo "\" id=\"divcon\">Abrir na DIVCON</button>";
								  	}
									echo "<div class=\"bar-pale-red\">";
									echo "<div class=\"bar-green bar-center\" style=\"width:";
									print_r($Percentagem);
									echo "\"><strong>";
									print_r($Percentagem);
									echo"</strong></div>";
											echo "</div>";
									echo "<br><strong>Histórico: </strong><br>";
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
	<script> 
			function callDivcon (filtro) {
				window.location = "indexphp.php?filtro="
    			+ filtro + "&tabela=divcon&oculta=false";
			}
	</script>
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
