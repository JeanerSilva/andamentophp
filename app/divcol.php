<?php 
     echo "<div class='titulo'>TRÂMITE NA DIVCOL</div>";
    echo "<table class='tabela' id='tabela'>";
    
     /*
        $A1 = "Abertura";
        $A2 = "Instrução inicial";
        $A3 = "Elaboração de Edital";
        $A4 = "Chefia da Divcol";
        $A5 = "Enviado à ASJUR";
        $A6 = "Retorno da ASJUR";
        $A7 = "Análise pós ASJUR";
        $A8 = "Declaração Orçamentária";
        $A9 = "Instrução final";
        $A10 = "Envio à DIVCON";
    */

    foreach ($SpreadsheetDivcol as $Key => $Row) {
        if ($Row && $Key > 3) {
            if ($Key == 4) {
               
                 $A1 = $Row[0];
                 $A2 = $Row[1];
                 $A3 = $Row[2];
                 $A4 = $Row[3];
                 $A5 = $Row[4];
                 $A6 = $Row[5];
                 $A7 = $Row[6];
                 $A8 = $Row[7];
                 $A9 = $Row[8];
                 $A10 = $Row[9];
                 goto fim;
            } 

            if ($Row[7] 
                && $Oculta == "true" 
                && (strcasecmp($Row[7], "Concluído") == 0 || strcasecmp($Row[7], "Arquivado") == 0)) 
                goto fim;
                
                echo "<tr class ='processos'>";   
                
                require('app/barra.php');               
                
                echo "<td class='processo4' ><div style='left: 0%; width:100%;  float: right;'>";

                echo "<div id='divteste' style='left: 0%; width:30%; float: left;'>";
                    echo "<div class='processo1' >Processo: <strong>"; print_r($Row[1]); echo "</strong></div>";
                    echo "<div class='processo8'>Modalidade: <strong>"; print_r($Row[4]); echo "</strong></div>";
                    echo "<div class='processo7'>Fase atual: <strong>"; print_r($Row[7]); echo "</strong></div>";
                    echo "<div class='processo6' style='color: rgb(44, 7, 253);' >Origem: <strong>"; print_r($Row[3]); echo "</strong></div>";
                    echo "<div class='processo3'>Objeto: <strong>"; print_r($Row[2]); echo "</strong></div>";
                    echo "<div class='processo5'>Pregão-ata-dispensa: <strong>"; print_r($Row[5]); echo "</strong></div>";
                    echo "<div class='processo2'>Responsável: <strong>"; print_r($Row[0]); echo "</strong></div>";

                echo "</div>";

                echo "<div id='divteste' style='left: 50%; width:70%; float: left;'>";             
                 echo "<strong>Andamentos: </strong><br>"; print_r($Row[6]); 
                echo "</div>";

                echo "</div></td>";

                echo "</tr>";
                
            fim:	
        }
    }
    echo "</table>";
?>

