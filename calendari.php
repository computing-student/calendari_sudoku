<!DOCTYPE html>
<html>
<!-- Aquí defineixo el tipus de codificació, així com el títol-->
<head>
    <meta charset="utf-8">
    <title>Calendari</title>
</head>

<!-- Aquí van els continguts de la web -->
<body>
	<!-- Informo del nom de l'aplicació, així com del nom del mes -->
    <h1>Calendari del mes</h1><br>
    <?php
    	$nomDelMes = date('F', strtotime("this month")); 
    	echo "<h2>$nomDelMes</h2><br>";
    ?>

    <!-- Taula on va el calendari -->
    <table style="width:20%; border: 1px solid black;">
        <tr>
            <th>DL</th>
            <th>DM</th>
            <th>X</th>
            <th>DJ</th>
            <th>DV</th>
            <th>DT</th>
            <th>DG</th>
        </tr>

        <?php
        	// Variable per començar a contar els dies del mes.
        	$count = 1;
            $count2 = 1;
        	// Constants que enmagatzemen el nombre de dies del mes,
        	// així com el primer dia del mes.
        	define("diesDelMes", date('t', strtotime("this month")));
        	define("FIRSTDAY", date('w', strtotime("first day of this month"))-1);

        	// Doble bucle que emplena el calendari.
        	// La $i són les files, i la $j les columnes.
        	for ($i = 0; $i < 5; $i++) {
        		echo '<tr>';
    			for ($j = 0; $j < 7; $j++) {
    				echo "<th>";
    				// Decideixo si empleno o no, i en cas afirmatiu, empleno
    				// i actualitzo la variable $count.
    				if (FIRSTDAY == $j && $i == 0) {
    					echo "$count</th>";
    					//echo '<th><input style="width:20%"/></th>';
    					$count += 1;
    				} else if ($i > 0 && $count <= diesDelMes){
    					echo "$count</th>";
    					//echo '<th><input style="width:20%"/></th>';
    					$count += 1;
    				} else if ($i == 0 && $count > 1 && $count < diesDelMes) {
    					echo "$count</th>";
    					//echo '<th><input style="width:20%"/></th>';
    					$count += 1;
    				} 
    				echo "</th>";
    			};
    			echo '</tr>';


                echo '<tr>';
                for ($j = 0; $j < 7; $j++) {
                    echo "<th>";
                    // Decideixo si empleno o no, i en cas afirmatiu, empleno
                    // i actualitzo la variable $count2.
                    if (FIRSTDAY == $j && $i == 0) {
                        echo '<input style="width:5%;"/>';
                        $count2 += 1;
                    } else if ($i > 0 && $count2 <= diesDelMes){
                        echo '<input style="width:20%;"/>';
                        $count2 += 1;
                    } else if ($i == 0 && $count2 > 1 && $count2 < diesDelMes) {
                        echo '<input style="width:20%;"/>';
                        $count2 += 1;
                    } 
                    echo "</th>";
                };
                echo '</tr>';
			}
        ?>
    </table>
</body>
</html>