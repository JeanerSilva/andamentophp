<?php
    echo "<div class='tituloDivcon'>TRÂMITE NA DIVCON</div>";
    echo "<table class= 'tabela' id='tabela'>";
    foreach ($SpreadsheetDivcon as $Key => $Row) {
        if ($Row && $Key > 2) {

            if ($Key == 3) {               
                $T1 = $Row[0];$T2 = $Row[1];$T3 = $Row[2];$T4 = $Row[3];$T5 = $Row[4];
                $T6 = $Row[5];$T7 = $Row[6];$T8 = $Row[7];$T9 = $Row[8];$T10 = $Row[9];
                goto fim;
           }

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
            $Processo = $Row[3];

            $Lateral = 5;
            $Percentual = ($Row[9] / 100) * ((100 - ($Lateral * 2)));
            $B = ((100 - ($Lateral * 2)) / 10);
            $W = $B - 0.5;
            for ($x=0; $x < 10; $x++) {
                $P[$x] = $Lateral + ($x * $B);  
            }
            $Esquerda = 30;
            $Direita = 100 - ($Lateral *2);
            $Andamento = 100 - $Esquerda;

            require('app/barra.php');               
                
            echo "<td class='processo9 divcol' style='margin-left: 5%; width: $Direita%' >
            <div style='width:100%;  float: right;'>";

            echo "<div id='divteste' style='width:$Esquerda%; float: left;'>";              
                echo "<div class='processo1'>$T4: <strong class='processo2'>$Processo</strong></div>";
                echo "<div class='processo8'>$T6: <strong>$Row[5]</strong></div>";                
                echo "<div class='processo6'>$T5: <strong>$Row[4]</strong></div>";
                echo "<div class='processo3'>$T3: <strong>$Row[2]</strong></div>";
                echo "<div class='processo5'>$T2: <strong>$Row[1]</strong></div>";
                echo "<div class='processo1'>$T1: <strong>$Row[0]</strong></div>";
                echo "<div>$T8: <strong  class='processo7'>$Row[7]</strong></div>";
            echo "</div>";

            echo "<div class='processo4' id='divteste' style='width:$Andamento%; float: right;'>";             
             echo "<strong>$T7: </strong><br>$Row[6]</div>";

            echo "</div></td>";



            fim:

        }        
    }
   echo "</table>";
?>