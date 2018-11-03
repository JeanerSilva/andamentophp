<?php 
    echo "<div class='titulo'>TRÂMITE NA DIVCOL</div>";
    echo "<table class='tabela' id='tabela'>";

    foreach ($SpreadsheetDivcol as $Key => $Row) {
        if ($Row && $Key > 3) {
            if ($Key == 4) {               
                 $A1 = $Row[0];$A2 = $Row[1];$A3 = $Row[2];$A4 = $Row[3];$A5 = $Row[4];
                 $A6 = $Row[5];$A7 = $Row[6];$A8 = $Row[7];$A9 = $Row[8];$A10 = $Row[9];
                 goto fim;
            } 

            if ($Row[7] 
                && $Oculta == "true" 
                && (strcasecmp($Row[7], "Concluído") == 0 || strcasecmp($Row[7], "Arquivado") == 0)) 
                goto fim;
                
                echo "<tr class ='processos'>";   
                $Processo = $Row[1];
                require('app/barra.php');               
                
                echo "<td class='processo1' ><div style='left: 0%; width:100%;  float: right;'>";
                    
                echo "<div id='divteste' style='margin-left: 5%; width:30%; float: left;'>";                     
                    echo "<div class='processo1' >Processo: <strong class='processo2'>$Processo</strong></div>";
                    echo "<div class='processo8'>Modalidade: <strong>$Row[4]</strong></div>";
                    echo "<div class='processo7'>Fase atual: <strong>$Row[7]</strong></div>";
                    echo "<div class='processo6'>Origem: <strong style='color: #007bff; font-size:15px;'>$Row[3]</strong></div>";
                    echo "<div class='processo3'>Objeto: <strong'>$Row[2]</strong></div>";
                    echo "<div class='processo5'>Pregão-ata-dispensa: <strong>$Row[5]</strong></div>";
                    echo "<div class='processo1'>Responsável: <strong>$Row[0]</strong></div>";
                echo "</div>";

                echo "<div class='processo4' id='divteste' style='width:65%; float: left;'>";             
                 echo "<strong>Andamentos: </strong><br>$Row[6]</div>";

                echo "</div></td>";

                echo "</tr>";
                
            fim:	
        }
    }
    echo "</table>";
?>