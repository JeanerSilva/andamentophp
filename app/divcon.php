<?php
    echo "<div class='tituloDivcon'>TRÂMITE NA DIVCON</div>";
    echo "<table class= 'tabela' id='tabela'>";
    foreach ($SpreadsheetDivcon as $Key => $Row) {
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
            $Processo = $Row[3];
            require('app/barra.php');   

            echo "<td class='processo1 divcon' ><div style='left: 0%; width:100%;  float: right;'>";
                echo "<div id='divteste' style='margin-left: 5%; width:30%; float: left;'>";               
                echo "<div class='processo1'>Processo / ata / Contrato: <strong class='processo2'>$Processo</strong></div>";
                echo "<div class='processo8'>Objetivo: <strong>$Row[5]</strong></div>";                
                echo "<div class='processo6'>Origem: <strong>$Row[4]</strong></div>";
                echo "<div class='processo3'>Objeto: <strong>$Row[2]</strong></div>";
                echo "<div class='processo5'>Empresa: <strong>$Row[1]</strong></div>";
                echo "<div class='processo1'>Responsável: <strong>$Row[0]</strong></div>";
                echo "<div>Fase atual: <strong  class='processo7'>$Row[7]</strong></div>";
            echo "</div>";

            echo "<div class='processo4' id='divteste' style='width:65%; float: left;'>";             
             echo "<strong>Andamentos: </strong><br>$Row[6]</div>";

            echo "</div></td>";



            fim:

        }        
    }
   echo "</table>";
?>