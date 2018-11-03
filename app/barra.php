<?php
    
    echo "<td><div class='bar-pale-red' style='position: relative;' >"; 
        
        echo "<div class='bar-green bar-center' style='position: absolute; width:";
        print_r($Row[9]-0.5); echo "%'><strong>";  
        //print_r($Row[9]);
        echo"</strong></div>";
        
            echo "<div class='bar-fase bar-center' style='margin-left: 00%; '>$A1</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 10%; '>$A2</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 20%; '>$A3</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 30%; '>$A4</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 40%; '>$A5</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 50%; '>$A6</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 60%; '>$A7</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 70%; '>$A8</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 80%; '>$A9</div>";
            echo "<div class='bar-fase bar-center' style='margin-left: 90%; '>$A10</div>";

    echo "<br></div></td>"; 

?>