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
			$Help = $_GET['help'];
			
			$FileDivcolPath = $DivcolPath . "processos_divcol.xlsm";
			$SpreadsheetDivcol = new SpreadsheetReader($FileDivcolPath);

			$FileDivconPath = $DivcolPath . "processos_divcon.xlsm";
			$SpreadsheetDivcon = new SpreadsheetReader($FileDivconPath);
		?>

			<input type="hidden" id="help" name="help" value="<?= $Help ?>">
			
			<div id="divFlutuante" class="invisivel">
				<a href="#" onclick="document.getElementById('divFlutuante').style.display='none';">[Fechar]</a>
				<br />
				<br /><strong>SISTEMA DE PESQUISA DE ANDAMENTO PROCESSUAL</strong>
				<br />
				<br />Digite o que deseja procurar no campo de pesquisa.
				<br />O campo pesquisa em qualquer dado do processo (número do proceso, requisitante, assunto, objeto, responsável, etc.).
				<br />Se quiser um processo específico, digite o número do processo, como 2066/2017.
				<br />Caso queira procurar todos os processos de uma unidade, digite o nome da unidade (SETO, SERR, CGOF, SESP, ext)
				<br />Para, por exemplo, buscar todos os processos de limpeza, basta digitar no campo de pesquisa e digitar enter.
				<br />O botão DIVCOL+DIVCON pesquisa tanto os processos em fase de licitação/dispensa/inexigibilidade, 
				quanto os processos em fase de formalização ou de alteração do contrato (DIVCON).
				<br /> Os botões DIVCOL e DIVCON procuram em cada uma das divisões em separado.
				<br />
				<br />Ao fazer o filtro, pode-se ocultar os processos já concluídos clicando no botão "Ocultar concluídos".
				<br />Para reexibi-los novamente clique em "Mostrar concluídos".
				<br />
				<br />Para pesquisar um contrato digite CXXX/AAA, por exemplo C524/2016.
			</div>

	<a href="#" onclick="document.getElementById('divFlutuante').style.display='block';">Mostrar DIV</a>

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
			<button id="ocultarButton" class="btn-primary">Ocultar</button>
		</form>

		<?php
			require('app/'.$TabelaTipo.'.php');
		?>

		   
		<script src="js/filtra.js" ></script>
		<script src="js/comandos.js" ></script>
		<script> 
			document.getElementById("filtrar-tabela").focus();
			document.getElementById("filtrar-tabela").select();
			var ocultarButton = document.querySelector("#ocultarButton");
			var oculta = document.getElementById("oculta").value;
			
			if (oculta=="false") {				
				var mostrar = "Ocultar";
				
			} else {				
				var mostrar = "Mostrar";
				ocultarButton.classList.add("btn-red");
			}

			ocultarButton.textContent = mostrar + " concluídos";
			var help = document.querySelector("#help");
			var helpDiv = document.querySelector("#divFlutuante");			
			if (help.value == "help") helpDiv.classList.remove("invisivel");
	</script>
	
	</body>
</html>
