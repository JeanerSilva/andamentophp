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

            echo "<td class='processo1'>Processo / ata / Contrato: ";       print_r($Row[3]); echo "</td>";
            echo "<td class='processo4'><strong>Andamentos: </strong>";     print_r($Row[6]); echo "</td>";
            echo "<td class='processo2'><strong>Objetivo: </strong>";       print_r($Row[5]); echo "</td>";
            echo "<td class='processo6'><strong>Fase atual: </strong>";     print_r($Row[7]); echo "</td>";
            echo "<td class='processo6'><strong>Origem: </strong>";         print_r($Row[4]); echo "</td>";
            echo "<td class='processo3'><strong>Objeto: </strong>";         print_r($Row[2]); echo "</td>";
            echo "<td class='processo5'><strong>Empresa: </strong>";        print_r($Row[1]); echo "</td>";
            echo "<td class='processo2'><strong>Responsável: </strong>";    print_r($Row[0]); echo "</td>";
            echo "</tr>";
        }        
    }
   echo "</table>";
?>