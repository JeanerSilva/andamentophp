<?php
    echo "<div class='titulo'>TRÂMITE NA DIVCON</div>";
    echo "<table class= 'tabela' id='tabela'>";

    $A1 = "Abertura";
    $A2 = "Instrução inicial";
    $A3 = "Elaboração de minutas";
    $A4 = "Chefia da Divcon";
    $A5 = "Enviado à ASJUR";
    $A6 = "Retorno da ASJUR";
    $A7 = "Análise pós ASJUR";
    $A8 = "Declaração Orçamentária";
    $A9 = "Enviado ao Administrativo";
    $A10 = "Concluído";
    
    foreach ($SpreadsheetDivcon as $Key => $Row) {
        if ($Row && $Key > 3) {
           
            if ($Oculta == "true" && (strcasecmp($Row[7], "Concluído") == 0 || strcasecmp($Row[7], "Arquivado") == 0)) {
                goto fim;
            }
            echo "<tr class ='processos'>";

            echo "<td><div class='bar-pale-red' style='position: relative;' >"; 
            echo "<div class='bar-green bar-center' style='position: absolute; width:";print_r($Row[9]+3); 
            echo "%'><strong>";  print_r($Row[9]); echo"%</strong></div>";
            
            echo "<div class='bar-fase bar-center' style='margin-left: 00%; width:10%; position: absolute;'>$A1</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 10%; width:10%; position: absolute;'>$A2</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 20%; width:10%; position: absolute;'>$A3</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 30%; width:10%; position: absolute;'>$A4</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 40%; width:10%; position: absolute;'>$A5</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 50%; width:10%; position: absolute;'>$A6</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 60%; width:10%; position: absolute;'>$A7</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 70%; width:10%; position: absolute;'>$A8</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 80%; width:10%; position: absolute;'>$A9</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 90%; width:10%; position: absolute;'>$A10</div>";

            echo "<br></div></td>";

           
            /////////
            echo "<td class='processo4' ><div style='left: 0%; width:100%;  float: right;'>";

            echo "<div id='divteste' style='left: 0%; width:30%; float: left;'>";
                echo "<div class='processo1'>Processo / ata / Contrato: <strong>"; print_r($Row[3]); echo "</strong></div>";
                echo "<div class='processo8'>Objetivo: <strong>"; print_r($Row[5]); echo "</strong></div>";
                echo "<div class='processo7'>Fase atual: <strong>"; print_r($Row[7]); echo "</strong></div>";
                echo "<div class='processo6' style='color: rgb(44, 7, 253);'>Origem: <strong>"; print_r($Row[4]); echo "</strong></div>";
                echo "<div class='processo3'>Objeto: <strong>"; print_r($Row[2]); echo "</strong></div>";
                echo "<div class='processo5'>Empresa: <strong>"; print_r($Row[1]); echo "</strong></div>";
                echo "<div class='processo2'>Responsável: <strong>"; print_r($Row[0]); echo "</strong></div>";

            echo "</div>";

            echo "<div id='divteste' style='left: 50%; width:70%; float: left;'>";             
             echo "<strong>Andamentos: </strong><br>"; print_r($Row[6]); 
            echo "</div>";

            echo "</div></td>";



            fim:

        }        
    }
   echo "</table>";
?>