<?php 
     echo "<div class='titulo'>TRÂMITE NA DIVCOL</div>";
    echo "<table class='tabela' id='tabela'>";
    
     
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
    

    foreach ($SpreadsheetDivcol as $Key => $Row) {
        if ($Row && $Key > 3) {
           
            try {
            $Status = $Row[7];
            } catch (Exception $e) {

            }
            if ($Row[7] && $Oculta == "true" && (strcasecmp($Status, "Concluído") == 0 || strcasecmp($Status, "Arquivado") == 0)) {
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

